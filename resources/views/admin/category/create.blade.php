@extends('layouts.master')
@section('title','Category')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Add Category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error )
                    <div>{{$error}}</div>
                @endforeach
            </div>

            @endif
            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for=""> Category Name:</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description:</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <h6>SEO TAGS</h6>
                <div class="mb-3">
                    <label for="">Meta Title:</label>
                    <input type="text" name="meta-title" class="form-control">
                </div>
                <!-- <div class="mb-3">
                    <label for="">Meta Keywords:</label>
                    <input type="text" name="meta-keyword" class="form-control">
                </div> -->
                <div class="mb-3">
                    <label for="">Meta Description:</label>
                    <textarea  id="" cols="30" rows="5" name="meta-description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords:</label>
                   <textarea  name="meta-keyword" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <h6>Status Mode:</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status" id="">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" id="">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Category</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
