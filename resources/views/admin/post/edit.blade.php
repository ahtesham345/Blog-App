@extends('layouts.master')
@section('title','Edit-Post')
@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
        <div class="card-header">
            <h4>Edit Post
                <a href="{{url('admin/add-post')}}" class="btn btn-danger float-end text-light">Back</a>
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
            <form action="{{url('admin/edit-post/'.$post->id)}}" method="POST" >
                @csrf
                @method('PUT');
                <div class="mb-3">
                    <label for=""> Category</label>
                    <select name="category_id" class="form-control" id="">
                        <option value="">--Select category--</option>
                    @foreach ($categories as $cateitem )
                        <option value=" {{$cateitem->id}}" {{$post->category_id == $cateitem->id ? 'selected':''}}>
                            {{$cateitem->name}}
                            </option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name:</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug:</label>
                    <input type="text" name="slug" value="{{$post->slug}}"  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description:</label>
                    <textarea name="description" id="mysummernote" cols="30" rows="10" class="form-control">{!!$post->description!!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" value="{{$post->yt_frame}}" class="form-control">
                </div>
                <h6>SEO TAGS</h6>
                <div class="mb-3">
                    <label for="">Meta Title:</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$post->meta_title}}">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description:</label>
                    <textarea  id="" cols="30" rows="5" name="meta_description" class="form-control">{!!$post->meta_description!!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords:</label>
                   <textarea  name="meta_keyword" id="" cols="30" rows="5" class="form-control">{!!$post->meta_keyword!!}</textarea>
                </div>
                <h6>Status Mode:</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" id="" {{$post->status == '1' ? 'checked':''}}>
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-primary" type="submit">update post</button>
                    </div>
                </div>
            </form>
            </div>
    </div>
</div>
@endsection
