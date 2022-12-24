<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){
        return view('admin.blog.blog',[
            'categories'=>Category::all(),
            'authors' =>Author::all()
        ]);
    }
    public function save(Request $request){
        Blog::addBlog($request);
        return back();
    }
    public function manage(){
        return view('admin.blog.manage',[
            'blogs' => DB::table('blogs')
                ->join('categories','blogs.category_id','=','categories.id')
                ->join('authors','blogs.author_id','=','authors.id')
                ->select('blogs.*','categories.category_name','authors.name')
                ->get()
        ]);
    }
    public function edit($id){
        $blog =Blog::find($id);
        return view('admin.blog.edit',[
            'blog'=>$blog,
            'categories'=>Category::all(),
            'authors'=>Author::all()
        ]);
    }
    public function update(Request $request){
        Blog::addBlog($request);
        return redirect(route('blog.manage'));
    }
    public function delete($id){
        $blog = Blog::find($id);
        $blog->delete();
        return back();
    }
    public function status($id){
        $blog = Blog::find($id);
        if($blog->status ==1){
            $blog->status = 0;
        }else{
            $blog->status = 1;
        }
        $blog->save();
        return back();
    }
}
