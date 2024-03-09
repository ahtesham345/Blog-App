@extends('layouts.app')
@section('title',"Its Ahtesham Bloging website")
@section('meta_description',"Its Ahtesham Bloging website")
@section('meta_keyword',"Its Ahtesham Bloging website")
@section('content')

<div class="bg-danger py-5 ">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach ($all_categories as $all_categories_image )
                    <div class="item">
                        <a href="{{url('tutorial/'.$all_categories_image->slug)}}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{asset('uploads/category/'.$all_categories_image->image)}}" alt="img" class="image_set">
                                <div class="card-body text-center text-dark">
                                    <h6>{{$all_categories_image->name}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-1">
    <div class="container">
        <div class="border bg-light text-center">
            <h2>Advertise here</h2>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shami Blog</h1>
                <div class="underline"></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptatibus delectus consequatur. Officia dicta deleniti reiciendis quas corporis. Quo commodi aliquid perferendis, impedit voluptates voluptatem labore voluptate soluta enim iste!</p>
            </div>
        </div>
    </div>
</div>


<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All categories</h1>
                <div class="underline"></div>
            </div>
            @foreach ( $all_categories as $all_categories_item )
            <div class="col-md-3">
                <div class="card card-body">
                    <a href="{{url('tutorial/'.$all_categories_item->slug)}}" class="text-decoration-none text-dark text-center">
                        <h4>{{$all_categories_item->name}}</h4>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Latest Post</h1>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach ($latest_post as $latest_post_item )
                <div class="col-md-12">
                    <div class="card card-body">
                        <a href="{{url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none text-dark">
                            <h4>{{$latest_post_item->name}}</h4>
                        </a>
                        <h6>Posted on:{{$latest_post_item->created_at->format('d-m-y')}}</h6>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4 border text-center">
             <h2>Advertise here</h2>
            </div>
        </div>
    </div>
</div>
@endsection
