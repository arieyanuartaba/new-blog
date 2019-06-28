@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">My Profile</div>

        <div class="card-body">
            @include('layouts.partial.error')
            <form action="{{route('users.update-profile')}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update my profile</button>
            </form>
        </div>
    </div>
@endsection