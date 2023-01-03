<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    private static $blog;
    public static function addBlog($request){
        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required|unique:blogs',
            'slug' => 'required|unique:blogs',
            'description' => 'required',
            'date' => 'required',
            'blog_type' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);
        if($request->blog_id){
            self::$blog = Blog::find($request->blog_id);
        } else{
            self::$blog = new Blog();
        }
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = $request->author_id;
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeSlug($request);
        self::$blog->description = $request->description;
        self::$blog->date = $request->date;
        self::$blog->blog_type = $request->blog_type;
        self::$blog->status = $request->status;
        if($request->image){
            if(file_exists(self::$blog->image)){
                unlink(self::$blog->image);
            }
            self::$blog->image = self::saveImage($request);
        }
        self::$blog->save();
    }
    static function saveImage($request){
        $image     = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/blog/';
        $imageUrl  = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
    static function makeSlug($request){
        if($request->slug){
            $str = $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        $str = $request->title;
        return preg_replace('/\s+/u','-',trim($str));
    }
    
}
