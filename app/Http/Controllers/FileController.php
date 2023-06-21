<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function create(){
        $files = File::all();
        return view('pages.file', compact('files'));
    }

    public function store(Request $request){
        $request->validate([
            'file' => 'required|image',
        ]);

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $name = 'file_'.time().'.'.$ext;
        // $file->move('images', $name);
        // $path = '/images/'.$name;
        $request->file('file')->storeAs('public/images',$name);
        $path = '/storage/images/'.$name;
        
        $data = new File();
        $data->name = $name;
        $data->path = $path;
        $data->save();
        return redirect()->back();
    }
}
