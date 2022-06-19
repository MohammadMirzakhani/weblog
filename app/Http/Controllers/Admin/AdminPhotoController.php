<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photo::with('photoable')->paginate(5);
        return view('admin.photos.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $file=$request->file('photos');
            $name=time().$file->getClientOriginalName();
            $file->move('Images/Posts',$name);
            $photo=new Photo();
            $photo->name=$file->getClientOriginalName();
            $photo->path=$name;
            $photo->photoable_type="App\Models\User";
            $photo->photoable_id=auth()->id();
            $photo->save();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $Photo)
    {
        $url=$Photo->path;
        $asset=("/Images/Posts/".$url."");
        File::delete(public_path($asset));
        $Photo->delete();
        $msg="عکس مورد نظر با موفقیت حذف گردید";
        return to_route('Photos.index')->with('delete',$msg);
    }

    public function photodelete(Request $request)
    {
        if ($request->photo)
        {
            foreach($request->photo as $photo)
            {
                $photom=Photo::find($photo);
                $url=$photom->path;
                $asset=("/Images/Posts/".$url."");
                File::delete(public_path($asset));
                $photom->delete();
            }
            $msg="عکس های مورد نظر حذف شدند";
            return redirect()->back()->with('delete',$msg);
        }
        else
        {
            return redirect()->back();
        }


    }
}
