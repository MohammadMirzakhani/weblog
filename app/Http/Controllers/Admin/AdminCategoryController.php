<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $messages = [
        //     'title.required' => 'لطفا عنوان مطلب را وارد کنید',
        //     'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
        // ];
        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'slug' => 'unique:categories',
        // ], $messages);
        $category=new Category();
        $category->title=$request->title;
        if($request->slug)
            {$category->slug=make_slug($request->slug,'-');}
        else
            {$category->slug=make_slug($request->title,'-');}
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->save();
        $msg="دسته بندی مورد نظر با موفقیت ایجاد شد";
        return to_route('Categories.index')->with('store',$msg);
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
    public function edit(Category $Category)
    {
        return view('admin.category.edit',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,Category $Category)
    {
        $Category->title=$request->title;
        if($request->slug)
            {$Category->slug=make_slug($request->slug,'-');}
        else
            {$Category->slug=make_slug($request->title,'-');}
        $Category->meta_description=$request->meta_description;
        $Category->meta_keywords=$request->meta_keywords;
        $Category->save();
        $msg="دسته بندی مورد نظر با موفقیت ایجاد شد";
        return to_route('Categories.index')->with('update',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        $msg="دسته بندی مورد نظر با موفقیت حذف شد";
        return to_route('Categories.index')->with('delete',$msg);
    }
}
