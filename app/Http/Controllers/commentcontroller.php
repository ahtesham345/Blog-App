<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDO;

class commentcontroller extends Controller
{
        public function store(Request $request){
            if(Auth::check()){
            $validator = validator::make($request->all(),[
                'comment_body'=>'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('messege','Comment area is mandatory');
            }


            // $post = post::where('slug' , $request->post_slug)->where('status','0')->first();
            $postSlug = $request->input('post_slug');
            $post = post::where('slug', $postSlug )->where('status','0')->first();

            if($post){
                comment::create([
                    'post_id'=> $post->id,
                    'user_id'=>Auth::user()->id,
                    'comment_body'=>$request->comment_body
                ]);
                return redirect()->back()->with('messege','Comment Added Successfully');
            }
            else
            {
                return redirect()->back()->with('messege','No Such post Is Found');
            }
            }
            else{
                return redirect('login')->with('messege','You are not logged in');
            }
        }

        public function destroy(Request $request){
            if(Auth::check()){
                $comment = comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();

                if($comment){
                    $comment->delete();
                    return response()->json([
                        'status'=> 200,
                        'messege'=> 'Comment Deleted Successfully'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=> 500,
                        'messege'=> 'Something Went Wrong'
                    ]);
                }
            }
            else{
                return response()->json([
                    'status'=> 401,
                    'messege'=> 'Login To Delete This Comment'
                ]);
            }
        }
}
