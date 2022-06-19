<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $NumberPosts=Post::count();
        $NumberCategories=Category::count();
        $NumberUsers=User::count();
        $NumberPhotos=Photo::count();
        $lastUsers=User::orderBy('id','desc')->limit(3)->get();
        $lastPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('admin.DashBoard.index',compact('NumberPosts','NumberCategories','NumberUsers','NumberPhotos','lastUsers','lastPosts'));
    }
}
