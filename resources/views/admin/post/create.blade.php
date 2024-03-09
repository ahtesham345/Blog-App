@extends('layouts.master')
@section('title','Add-Post')
@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
        <div class="card-header">
            <h4>Add Post
                <a href="{{url('admin/posts')}}" class="btn btn-primary float-end text-light">View</a>
            </h4>
        </div>
            <div class="card-body">
                @if ($errors->any()){
                    <div class="text text-danger">
                        @foreach ($errors->all() as $error )
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                }

                @endif
            <form action="{{url('admin/add-post')}}" method="POST" >
                @csrf
                <div class="mb-3">
                    <label for=""> Category</label>
                    <select name="category_id" class="form-control" id="">
                        @foreach ($category as $cateitem )
                        <option value=" {{$cateitem->id}}">
                            {{$cateitem->name}}
                            </option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name:</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug:</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description:</label>
                    <textarea name="description" id="mysummernote" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>
                <h6>SEO TAGS</h6>
                <div class="mb-3">
                    <label for="">Meta Title:</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description:</label>
                    <textarea  id="" cols="30" rows="5" name="meta_description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords:</label>
                   <textarea  name="meta_keyword" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <h6>Status Mode:</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" id="">
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-primary" type="submit">Save post</button>
                    </div>
                </div>
            </form>
            </div>
    </div>
</div>
@endsection
