<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    private static $blog;
    public static function addBlog($request){
        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = $request->author_id;
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeSlug($request);
        self::$blog->description = $request->description;
        self::$blog->image = self::saveImage($request);
        self::$blog->date = $request->date;
        self::$blog->blog_type = $request->blog_type;
        self::$blog->status = $request->status;
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
    static function blogUpdate($request){
        self::$blog               = Blog::find($request->blog_id);
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = $request->author_id;
        self::$blog->title = $request->title;
        self::$blog->description = $request->description;
        self::$blog->date = $request->date;
        self::$blog->slug = self::makeSlug($request);
        self::$blog->blog_type = $request->blog_type;
        self::$blog->status = $request->status;
        if($request->hasfile('image')){
            if(self::$blog->image != null){
                unlink(self::$blog->image);
            }
            self::$blog->image = self::saveImage($request);
        }

        self::$blog->save();
    }
}
