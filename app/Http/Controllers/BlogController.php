<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function show(Post $post){
        // dd($post);
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category){

        return view('blog.category')
                ->with('tags', Tag::all())
                ->with('categories', Category::all())
                ->with('posts', $category->posts()->searched()->simplePaginate(2))
                ->with('category', $category);
    }

    public function tag(Tag $tag){

        return view('blog.tag')
                ->with('tags', Tag::all())
                ->with('categories', Category::all())
                ->with('posts', $tag->posts()->searched()->simplePaginate(2))
                ->with('tag', $tag);
    }
}
