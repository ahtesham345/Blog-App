<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\admin\categoryformRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class categorycontroller extends Controller
{

    public function index() {
        $category= category::all();
        return view('admin.category.index',compact('category'));
    }
    public function create() {
        return view('admin.category.create');
    }
    public function store(categoryformRequest $request) {
       $data = $request->validated();
       $category = new category;
       $category->name = $data['name'];
       $category->slug = Str::slug($data['slug']);
       $category->description = $data['description'];
       if($request->hasfile('image')){
        $file = $request->file('image');
        $filename=time().('.').$file->getClientOriginalExtension();
        $file->move('uploads/category/', $filename);
        $category->image = $filename;
       }
       $category->meta_title = $data['meta-title'];
       $category->meta_description = $data['meta-description'];
       $category->meta_keyword = $data['meta-keyword'];
       $category->navbar_status = $request->navbar_status == true ? '1':'0';
       $category->status =  $request->status == true ? '1':'0';
       $category->created_by = Auth::user()->id;
       $category->save();
       return redirect('admin/category')->with('messege' , 'Added successfully');
    }


    public function edit($category_id) {
        $category = category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(categoryformRequest $request,$category_id){
        $data = $request->validated();
        $category = category::find($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if($request->hasfile('image')){
         $destination = 'uploads/category/'.$category->image;
         if(File::exists($destination)){
            File::delete($destination);
         }
         $file = $request->file('image');
         $filename=time().('.').$file->getClientOriginalExtension();
         $file->move('uploads/category/', $filename);
         $category->image = $filename;
        }
        $category->meta_title = $data['meta-title'];
        $category->meta_description = $data['meta-description'];
        $category->meta_keyword = $data['meta-keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status =  $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/category')->with('messege' , 'Updated successfully');
    }
    // public function destroy($category_id){
    //     $category = category::find($category_id);
    //     if($category){
    //         $destination = 'upload/employee/'.$category->image;
    //         if(File::exists($destination))
    //         {
    //             File::delete($destination);
    //         }
    //         $category->delete();
    //         return redirect('admin/category')->with('messege' , 'Deleted  successfully');

    //     }
    //     else{
    //         return redirect('admin/category')->with('messege' , 'Id Not Found');
    //     }
    // }
    public function destroy(Request $request)
{
    $category = Category::find($request->category_delete_id);

    if ($category) {
        $destination = 'uploads/category/'.$category->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $deletedCategoryId = $category->id;
        $category->posts()->delete();
        $category->delete();

        // Find all categories with IDs greater than the deleted category's ID
        $remainingCategories = Category::where('id', '>', $deletedCategoryId)->get();

        // Increment the ID of each remaining category by 1
        foreach ($remainingCategories as $remainingCategory) {
            $remainingCategory->id = $remainingCategory->id - 1;
            $remainingCategory->save();
        }

        return redirect('admin/category')->with('messege', 'Category Deleted with its posts successfully');
    } else {
        return redirect('admin/category')->with('messege', 'Id Not Found');
    }
}

}
