<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    private static $reply;
    public static function saveReply($request){
        self::$reply = new Reply();
        self::$reply->commenter_id = $request->commenter_id;
        self::$reply->comment_id   = $request->comment_id;
        self::$reply->blog_id   = $request->blog_id;
        self::$reply->reply        = $request->reply;
        self::$reply->save();

    }
}
