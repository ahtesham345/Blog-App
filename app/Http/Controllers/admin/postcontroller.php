<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\admin\postformrequest;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class postcontroller extends Controller
{
    public function index() {
        $post = post::all();
        return view('admin.post.index',compact('post'));
    }
    public function create() {
        $category = category::where('status','0')->get();
        return view('admin.post.create',compact('category'));
    }
    public function store(postformrequest $request ) {
        $data = $request->validated();
        $post = new post ;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug =  Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_frame = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->save();
        return redirect('admin/posts')->with('messege','Post Added Successfully');
    }
    public function edit($post_id) {
        $categories = category::where('status','0')->get();
        $post = post::find($post_id);
        return view('admin.post.edit',compact('post','categories'));

    }
    public function update(postformRequest $request,$post_id){
        $data = $request->validated();
        $post = post::find($post_id) ;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug =Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_frame = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->update();
        return redirect('admin/posts')->with('messege','Updated Added Successfully');

    }
        public function destroy($post_id){
        $post = post::find($post_id);
        if($post){
            $post->delete();
            return redirect('admin/posts')->with('messege' , 'Deleted  successfully');

        }
        else{
            return redirect('admin/posts')->with('messege' , 'Id Not Found');
        }
    }
}
