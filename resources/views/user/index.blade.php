@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
        @if($users->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email) }}" alt="{{$user->name}}"
                                 style="widht: 40px; height:40px; border-radius:50%">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                               @if(!$user->isAdmin())
                                  <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                      @csrf
                                      <button class="btn btn-sm btn-success">Make Admin</button>
                                  </form>
                               @endif
                            </td>
                            <td>
                                
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