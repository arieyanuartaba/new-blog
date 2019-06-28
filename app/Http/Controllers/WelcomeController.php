<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class WelcomeController extends Controller
{
    public function index(){
        // dd(request()->query('search'));
        $posts = Post::searched()->simplePaginate(2);
        $tags = Tag::all();
        $categories = Category::all();        
        return view('welcome', compact('tags', 'categories', 'posts'));
    }
}
