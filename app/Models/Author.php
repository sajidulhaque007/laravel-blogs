<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    private static $author;
    public static function saveAuthor($request){
        self::$author = new Author();
        self::$author->name = $request->name;
        self::$author->save();
    }
    public static function updateAuthor($request){
        self::$author = Author::find($request->id);
        self::$author->name = $request->name;
        self::$author->save();
    }
}
