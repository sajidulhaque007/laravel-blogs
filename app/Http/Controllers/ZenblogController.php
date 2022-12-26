<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BlogUser;
use Session;

class ZenBlogController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')
                ->join('categories','blogs.category_id','categories.id')
                ->select('blogs.*','categories.category_name')
                ->where('blogs.status',1)
//                ->where('blog_type','trending')
//                ->orderBy('blogs.id','asc')
//                ->skip(1)
//                ->take(1)
                ->get();
                // return $blogs;
        return view('frontEnd.home.home',[
            'blogs'=>$blogs
        ]);
    }
    public function blogDetails($slug)
    {
        $blog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.name')
            ->where('slug',$slug)
            ->first();
            
            $catId =$blog->category_id;

            $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.name')
            ->where('blogs.category_id',$catId)
            ->get();

            $comments = DB::table('comments')
                ->join('blog_users','comments.user_id','blog_users.id')
                ->select('comments.*','blog_users.name')
                ->where('comments.blog_id',$blog->id)
            //    ->where('comments.status',1)
                ->get();
                
            $replies = DB::table('replies')
                        ->join('comments','replies.comment_id','comments.id')
                        ->join('blog_users','replies.commenter_id','blog_users.id')
                        ->select('replies.*','blog_users.name')
                        ->where('replies.blog_id',$blog->id)
                        ->orderBy('replies.created_at','asc')
                        ->get();

                        // return $replies;
        return view('frontEnd.blog.blog-details',[
            'blog'=>$blog,
            'categoryWiseBlogs'=>$categoryWiseBlogs,
            'comments'=>$comments,
            'replies'=>$replies,

        ]);
    }
    public function allBlogCategory(){
        return view('frontEnd.categories.categories');
    }

    public function categoryDetails($id){
        $category_blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.name')
            ->where('category_id',$id)
            ->get();
        return view('frontEnd.categories.blog-categories',[
            'category_blogs'=>$category_blogs
        ]);
    }

    public function register(){
        return view('frontEnd.user.register');
    }

    public function saveUser(Request $request){
        BlogUser::saveUser($request);
        return redirect(route('user.login'));
    }

    public function userLogin(){
        return view('frontEnd.user.login');
    }

   

    public function loginCheck(Request $request){
        $userInfo = BlogUser::where('email',$request->user_name)
                            ->orWhere('phone',$request->user_name)
                            ->first();
        if($userInfo){
            $existingPassword = $userInfo->password;
            if(password_verify($request->password,$existingPassword)){
                    Session::put('userId',$userInfo->id);
                    Session::put('userName',$userInfo->name);
                    return redirect('/');
            }
            else{
                return back()->with('message','Please Use Valid Password');
            }
        }
        else{
            return back()->with('message','Please Use Valid Email or Phone');
        }
    }

    public function logout(){
        Session::forget('userId');
        Session::forget('userName');
        return back();
    }


    public function about()
    {
        return view('frontEnd.about.about');
    }

    public function contact()
    {
        return view('frontEnd.contact.contact');
    }

}
