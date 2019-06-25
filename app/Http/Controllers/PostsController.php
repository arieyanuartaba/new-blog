<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\posts\createPostRequest;

use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\posts\updatePostRequest;


class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createPostRequest $request)
    {
        // dd($request->image->store('posts'));
        $image = $request->image->store('posts');

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->description,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);

        session()->flash('success', 'Post successfully create');

        return redirect(route('posts.index'));

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
    public function edit(Post $post)
    {
        return view('post.create')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, Post $post)
    {
        
        $data = $request->only(['title', 'description', 'content', 'published_at', 'category']);
        //check if has image
        if($request->hasFile('image')){

             //store new image
            $image = $request->image->store('posts');
             //delete old image
            $post->deleteImage();       

            $data['image'] = $image;

        }

        $cat = $request->category;
        $data['category_id'] = $cat;
        //update data
        $post->update($data);

        //flash message
        Session()->flash('success', 'Post update successfully');

        //redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        
        if($post->trashed()) {
            $post->forceDelete();

            $post->deleteImage();

            session()->flash('success', 'Post deleted permanently');
        }
        else {
            $post->delete();

            session()->flash('success', 'Post successfully move to trash');
        }
        
        return redirect(route('posts.index'));

    }

    public function trashed(){

        $trashed = Post::onlyTrashed()->get();

        // dd($trashed);

        return view('post.index')->with('posts', $trashed);
    }

    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restore successfully');

        return redirect(route('posts.index'));
    }
}
