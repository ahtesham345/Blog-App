@extends('layouts.master')
@section('title','posts')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Post
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end text-light">Add post</a>
            </h4>
        </div>
            <div class="card-body">
            @if(session('messege'))
        <div class="alert alert-success" id="successMessage">
            {{ session('messege') }}
        </div>
        @endif
        <div class="table-responsive">
            <table id="myDataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Post Name</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($post as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->status == 1 ? 'Hidden':'Shown'}}</td>
                    <td>
                        <a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-success text-light">Edit</a>

                    </td>
                    <td><a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger text-light">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
</table>
</div>
</div>
@endsection
<script>
    // Hide the success message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = 'opacity 1s ease'; // Set transition properties
            successMessage.style.opacity = '0'; // Hide the element smoothly
        }
    }, 5000);
</script>
