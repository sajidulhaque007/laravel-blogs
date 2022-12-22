<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{

    public function index(){
        $reply = Reply::all();
        // return $reply;
        return view('frontEnd.blog.blog-details',[
            'replies' => $reply
        ]);
    }

    public function newReply(Request $request){
        Reply::saveReply($request);
        return back();
    }


}
