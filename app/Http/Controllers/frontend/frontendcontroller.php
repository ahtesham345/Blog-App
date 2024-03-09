<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    public function index(){
        $all_categories = category::where('status','0')->get();
        $latest_post = post::where('status','0')->orderBy('created_at','DESC')->get()->take(15);
        return view('frontend.index',compact('all_categories','latest_post'));
    }
    public function viewcategorypost($category_slug){
        $categories = category::where('slug',$category_slug)->where('status','0')->first();
        if($categories){
            // $post = post::where('category_id',$category_slug)->where('status','0')->get();
            $post = post::where('category_id', $categories->id)->where('status', '0')->paginate(3);

            return view('frontend.post.index',compact('post','categories'));
        }
        else{
            return redirect('/');
        }
    }

    public function viewpost(string $category_slug, string $post_slug){
        $categories = category::where('slug',$category_slug)->where('status','0')->first();
        if($categories){
            // $post = post::where('category_id',$category_slug)->where('status','0')->get();
            $post = post::where('category_id', $categories->id)->where('slug',$post_slug)->where('status', '0')->first();
            $latest_post = post::where('category_id', $categories->id)->where('status', '0')->orderBy('created_at','DESC')->get()->take(5);

            return view('frontend.post.view',compact('post','latest_post'));
        }
        else{
            return redirect('/');
        }
    }
}
