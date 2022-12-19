<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.category',[
            'categories'=>Category::all()
        ]);
    }
    public function save(Request $request){
    Category::saveCategory($request);
    return back();
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',[
            'category'=>$category
        ]);
    }

    public function update(Request $request){
        Category::saveCategory($request);
        return redirect(route('category'));
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return back();
    }

    public function status($id){
        $category = Category::find($id);
        if($category->status ==1){
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->save();
        return back();
    }
}
