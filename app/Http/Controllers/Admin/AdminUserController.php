<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UserEditRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('roles')->paginate(2);

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        $users=User::all();
        return view('admin.users.create',compact('roles','users'));
    }

    public $n="Profile";

    public function store(Request $request)
    {
      // return $request->o ;
      $user=new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
      $user->status=$request->status;
      $user->save();
      $user->roles()->attach($request->o);
      if($request->file('PhotoProfile'))
      {
          $file=$request->file('PhotoProfile');
          $name=$this->n.time().$file->getClientOriginalName();
          $file->move('Images/Profile',$name);
          $photo=new Photo();
          $photo->name=$file->getClientOriginalName();
          $photo->path=$name;
          $photo->is_profile=1;
          $user->photos()->save($photo);
      }
      $msg="کاربر مورد نظر با موفقیت ایجاد شد";
      return to_route('Users.index')->with('store',$msg);
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
    public function edit(User $User)
    {

        $roles=Role::all();
        //$Photo=$User->photo;
        return view('admin.users.edit',compact('roles','User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $User)
    {
      $User->name=$request->name;
      $User->email=$request->email;
      $User->password=bcrypt($request->password);
      $User->status=$request->status;
      $User->save();

          $User->roles()->sync($request->o);

      if($request->file('PhotoProfile'))
      {
          if(count($User->photos)!=0)
          {
              foreach($User->photos as $photo)
              {
                  if($photo->is_profile==1)
                  {
                    $url=$photo->path;
                    $asset=("/Images/Profile/".$url."");
                    File::delete(public_path($asset));
                    $file=$request->file('PhotoProfile');
                    $name=$this->n.time().$file->getClientOriginalName();
                    $file->move('Images/Profile',$name);
                    $User->photos()->where('is_profile',1)->delete();
                    $Photo=new Photo();
                    $Photo->name=$file->getClientOriginalName();
                    $Photo->path=$name;
                    $Photo->is_profile=1;
                    $User->photos()->save($Photo);
                  }
              }
          }
          else
          {
            $file=$request->file('PhotoProfile');
            $name=$this->n.time().$file->getClientOriginalName();
            $file->move('Images/Profile',$name);
            $Photo=new Photo();
            $Photo->name=$file->getClientOriginalName();
            $Photo->path=$name;
            $Photo->is_profile=1;
            $User->photos()->save($Photo);
          }
      }
      $msg="ویرایش کاربر مورد نظر با موفقیت انجام شد ";
      return to_route('Users.index')->with('update',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        if($User->photos)
        {
            foreach($User->photos as $photo)
            {
                $url=$photo->path;
                $asset=("/Images/Profile/".$url."");
                File::delete(public_path($asset));
                $User->photos()->where('is_profile',1)->delete();
            }
        }
        $User->delete();
        $msg="کاربر مورد نظر با موفقیت حذف گردید";
        return to_route('Users.index')->with('delete',$msg);
    }
}

