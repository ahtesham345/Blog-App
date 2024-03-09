@extends('layouts.app')
@section('title',"$post->meta_title")
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")
@section('content')
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="category-heading">
                    <h4 class="mb-0">{!!$post->name!!}</h4>
                </div>
                <div>
                    <h6>{{$post->category->name.'/'.$post->name}}</h6>
                </div>
                <div class="card card-shadow mt-4">
                    <div class="card-body ">
                    {!!$post->description!!}
                    </div>
                </div>
                  <!-- Comment form -->
                  <h3 class="mt-4">Leave a Comment</h3>
    <div class="card mt-4">
    @if(session('messege'))
            <div class="alert alert-warning" id="successMessage">
                {{ session('messege') }}
            </div>
            @endif
        <div class="card-body">
            <form method="post" action="{{url('comments')}}">
                <input type="hidden" value="{{$post->slug}}" name="post_slug" id="">
                @csrf
                <div class="mb-3">
                    <textarea name="comment_body" class="form-control" rows="3" placeholder="Write your comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <h2>Comments</h2>
    @forelse ($post->comments as $post_comments )
    <div class="container mt-5 comment_container">
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{!! $post_comments->comment_body!!}</p>
            <small class="text-muted">@if ($post_comments->user)
                {!!$post_comments->user->name!!}
            @endif</small>
            <small class="text-muted d-block mt-2">Posted on  {!!$post_comments->created_at->format('d-m-y')!!}</small>
            @if (Auth::check() && Auth::id()==$post_comments->user_id)

            <div class="d-flex mt-2">
                <!-- <button class="btn btn-outline-secondary btn-sm me-2">Edit</button> -->
                <button value="{{$post_comments->id}}" class=" deletecomment btn btn-outline-danger btn-sm">Delete</button>
            </div>
            @endif
        </div>
    </div>
            </div>
    @empty
    <div class="card crad-body shadow-sm mt-3">
    <h4>No comments Yet.</h4>
    </div>
    @endforelse
</div>
            <div class="col-md-4">
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>

                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>

                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>

                </div>
               <div class="card">
                <div class="card-header">
                    <h5>Latest Post</h5>
                </div>
                <div class="card-body border">
                    @foreach ($latest_post as $latest_post_item )
                        <a href="{{url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                            <h6>{{$latest_post_item->name}}</h6>
                        </a>
                    @endforeach
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function (){
        $(document).on('click','.deletecomment',function(){
            if(confirm('Are You Sure You Want To Delete This Comment')){
                var thisclicked = $(this);
                var comment_id = thisclicked.val();

                $.ajax({
                    type:'post',
                    url:'/delete-comment',
                    data:{
                        'comment_id':comment_id
                    },
                    success: function (res){
                        if(res.status == 200){
                            thisclicked.closest('.comment_container').remove();
                            alert(res.messege);
                        }
                        else{
                            alert(res.messege);
                        }
                    }
                });
            }
        });
    });
</script>
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
