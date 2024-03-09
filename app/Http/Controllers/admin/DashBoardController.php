<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $category = category::count();
        $post = post::count();
        $users = User::where('Role_as','0')->count();
        $admin = User::where('Role_as','1')->count();
        return view('admin.dashboard',compact('category','post','users','admin'));

   }
}
