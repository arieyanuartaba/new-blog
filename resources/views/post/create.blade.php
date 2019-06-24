@extends('layouts.app')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <ul class="list-group">
                <li class="list-group-item">{{$error}}</li>
            </ul>
        @endforeach
    </div>
@endif

<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit a post' : 'Create a post' }}
    </div>

    <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ isset($post) ? $post->title : '' }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="4" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                <label for="published_at">Published at</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
            </div>

            @if(isset($post))
            <div class="form-group">
                <img src="{{asset('/storage/'.$post->image) }}" alt="" style="width:100%; height:auto;">
            </div>
            @endif

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
       flatpickr('#published_at', {
           enableTime: true
       })
    </script>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection