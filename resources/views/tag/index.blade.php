@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('tags.create')}}" class="btn btn-success">New Tag</a>
</div>  

<div class="card card-default">
    <div class="card-header">
        Tags
    </div>
    <div class="card-body">
        @if($tags->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Post Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $index => $tag)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->posts->count()}}</td>
                            <td>
                                <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="handleDelete({{ $tag->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-danger text-bold">Are you sure want to delete it ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete It</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else 
            <h3 class="text-center">No data at the moment</h3>
        @endif
        
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            let form = document.getElementById('deleteForm')
            form.action = '/tags/' + id
            $('#deleteModal').modal('show')
            console.log(form);
        }
    </script>
@endsection