<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts=Post::with('user','category','photo')->paginate(5);
        return view('front.main.index',compact('posts'));
    }
}
