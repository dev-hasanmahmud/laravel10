<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function show($id)
    {
        return view('profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
