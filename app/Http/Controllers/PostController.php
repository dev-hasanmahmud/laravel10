<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('pages.create');
    }

    public function store(StorePostRequest $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'descriptions' => ['required', 'string', new Uppercase],
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        // $validated = $validator->safe()->only(['title', 'descriptions']);
        // $validated = $validator->safe()->except(['title', 'descriptions']);
        $validated = $request->safe()->all();

        Post::create($validated);
        return redirect()->back()->withInput();
    }
}
