@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('categories.create')}}" class="btn btn-success">New Category</a>
</div>  

<div class="card card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
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
                @foreach($categories as $index => $category)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->posts->count()}}</td>
                        <td>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="handleDelete({{ $category->id }})">Delete</button>
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
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
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            let form = document.getElementById('deleteForm')
            form.action = '/categories/' + id
            $('#deleteModal').modal('show')
            console.log(form);
        }
    </script>
@endsection