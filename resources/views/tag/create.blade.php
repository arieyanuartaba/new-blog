@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
    </div>
    <div class="card-body">
        @include('layouts.partial.error')
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="post">
        @csrf
        @if(isset($tag))
            @method('PUT')
        @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ isset($tag) ? $tag->name : ''}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">{{ isset($tag) ? 'Update Tag' : 'Add Tag'}}</button>
            </div>
        </form>
    </div>
</div>
@endsection