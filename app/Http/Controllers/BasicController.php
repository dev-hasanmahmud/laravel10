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

    public function sess(Request $request)
    {
        // store name in session
        $request->session()->put('name', 'sandip');

        // add new key in session user array
        $request->session()->push('user.name', 'sandip');

        // pull a name field from the session and then delete it
        $name = $request->session()->pull('name', 'default');
        dd($name);
        // add a flash message in current session
        $request->session()->flash('success', 'Task was successful!');

        // flush session data
        $request->session()->flush();

        // re-generate new session id
        $request->session()->regenerate();
    }
}
