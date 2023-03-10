<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category;
    public static function saveCategory($request){
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        if($request->category_id){
            self::$category =Category::find($request->category_id);
            self::$category->status = $request->status;
    } else {
        self::$category = new Category();
    }
    self::$category->category_name = $request->category_name;
    self::$category->save();
    }
    
}
