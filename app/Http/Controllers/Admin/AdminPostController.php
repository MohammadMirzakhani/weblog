<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostCreateRequest;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('photo','user','category')->paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $posts=Post::all();
        return view('admin.posts.create',compact('categories','posts'));
    }

    protected $n="FirstPhoto";

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'لطفا عنوان مطلب را وارد کنید',
            'title.min' => 'عنوان مطلب شما باید بیش از ۱۰ کاراکتر باشد',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
            'description.required' => 'لطفا توضیحات مطلب را وارد کنید',
            'FirstPhoto.required' => 'لطفا تصویر اصلی مطلب را مشخص کنید',
            'category.required' => 'لطفا دسته بندی این مطلب را انتخاب کنید',
            'status.required' => 'وضعیت مطلب نامشخص است'
        ];
        $validatedData = $request->validate([
            'title' => 'required|min:10',
            'slug' => 'unique:posts',
            'description' => 'required',
            'FirstPhoto' => 'required',
            'category' => 'required',
            'status' => 'required',

        ], $messages);
        $post=new Post;
        $post->title=$request->title;
        if($request->slug)
            {$post->slug=make_slug($request->slug,'-');}
        else
            {$post->slug=make_slug($request->title,'-');}
        $post->status=$request->status;
        $post->description=$request->description;
        $post->meta_description=$request->meta_description;
        $post->meta_keywords=$request->meta_keywords;
        $post->user_id=auth()->id();
        $post->category_id=$request->category;
        if($request->file('FirstPhoto'))
        {
            $file=$request->file('FirstPhoto');
            $name=$this->n.time().$file->getClientOriginalName();
            $file->move('Images/Posts',$name);
            $photo=new Photo();
            $photo->name=$file->getClientOriginalName();
            $photo->path=$name;
            $photo->photoable_type="App\Models\User";
            $photo->photoable_id=auth()->id();
            $photo->save();
            $post->photo_id=$photo->id;
        }
        $post->save();
        $msg="پست مورد نظر با موفقیت ایجاد شد";
        return to_route('Posts.index')->with('store',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        $categories=Category::all();
        return view('admin.posts.edit',compact('Post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $Post)
    {
        $messages = [
            'title.required' => 'لطفا عنوان مطلب را وارد کنید',
            'title.min' => 'عنوان مطلب شما باید بیش از ۱۰ کاراکتر باشد',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
            'description.required' => 'لطفا توضیحات مطلب را وارد کنید',
            'FirstPhoto.required' => 'لطفا تصویر اصلی مطلب را مشخص کنید',
            'category.required' => 'لطفا دسته بندی این مطلب را انتخاب کنید',
            'status.required' => 'وضعیت مطلب نامشخص است'
        ];
        $validatedData = $request->validate([
            'title' => 'required|min:10',
            'slug' =>Rule::unique('posts')->ignore($Post->id),
            'description' => 'required',
            'FirstPhoto' => 'required',
            'category' => 'required',
            'status' => 'required',

        ], $messages);
        $Post->title=$request->title;
        if($request->slug)
            {$Post->slug=make_slug($request->slug,'-');}
        else
            {$Post->slug=make_slug($request->title,'-');}
        $Post->status=$request->status;
        $Post->description=$request->description;
        $Post->meta_description=$request->meta_description;
        $Post->meta_keywords=$request->meta_keywords;
        $Post->user_id=auth()->id();
        $Post->category_id=$request->category;
        if($request->file('FirstPhoto'))
        {
            if($Post->photo)
            {
                $url=$Post->photo->path;
                $asset=("/Images/Posts/".$url."");
                File::delete(public_path($asset));
                //$Post->photo()->delete();
            }
            $file=$request->file('FirstPhoto');
            $name=$this->n.time().$file->getClientOriginalName();
            $file->move('Images/Posts',$name);
            $photo=new Photo();
            $photo->name=$file->getClientOriginalName();
            $photo->path=$name;
            $photo->photoable_type="App\Models\User";
            $photo->photoable_id=auth()->id();
            $photo->save();
            $Post->photo_id=$photo->id;
        }
        $Post->save();
        $msg="پست مورد نظر با موفقیت ویرایش شد";
        return to_route('Posts.index')->with('update',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        if($Post->photo)
        {
            $url=$Post->photo->path;
            $asset=("/Images/Posts/".$url."");
            File::delete(public_path($asset));
            $Post->photo()->delete();
        }
        $Post->delete();
        $msg="پست مورد نظر با موفقیت حذف گردید";
        return to_route('Posts.index')->with('delete',$msg);
    }
}
