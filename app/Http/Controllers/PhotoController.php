<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.photos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // custom method
    public function contact()
    {
        return view('pages.contact');
    }

    // Passing data to views
    public function contact_show($id)
    {
        $name = 'Hasan Mahmud';
        $title = 'This data come form Component :';
        $users = User::all();
        // return view('pages.contact_show')->with('id', $id);
        // return view('pages.contact_show', compact('id', 'name'));
        return View::make('pages.contact_show', compact('id', 'name', 'title', 'users'));  // Views may also be returned using the View facade
    }
}
