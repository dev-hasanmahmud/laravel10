<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('pages.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'descriptions' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->back();
    }
}
