<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    private static $author;
    public static function saveAuthor($request){
        $request->validate([
            'name' => 'required|unique:authors',
        ]);
        if($request->author_id){
            self::$author = Author::find($request->author_id);
        } else{
            self::$author = new Author();
        }
        self::$author->name = $request->name;
        self::$author->save();
    
    }
    
}
