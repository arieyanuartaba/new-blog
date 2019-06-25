@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">New Post</a>
</div> 

<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        @if($posts->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/'.$post->image) }}" alt="{{$post->title}}" style="width: 100px; height:auto;">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                @if($post->trashed())
                                    <form action="{{route('trashed-post.restore', $post->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-info">Restore</button>
                                    </form>
                                @else
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-info">Edit</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        {{ $post->trashed() ? 'Delete' : 'Trash'}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">No data at the moment</h3>
        @endif
        
    </div>
</div>
@endsection