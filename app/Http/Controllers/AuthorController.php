<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(){
        return view('admin.author.author',[
            'authors'=>Author::all()
        ]);
    }

    public function save(Request $request){
        Author::saveAuthor($request);
        return back();
        }

        public function edit($id){
            $author = Author::find($id);
            return view('admin.author.edit',[
                'author'=>$author
            ]);
        }

        public function update(Request $request){
            Author::updateAuthor($request);
            return redirect(route('author'));
        }
    public function delete($id){
        $author = Author::find($id);
        $author->delete();
        return back();
    }
}
