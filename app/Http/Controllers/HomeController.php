<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new cat.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('cats.create'); // Make sure this view exists
    }

    /**
     * Show the form for editing the specified cat.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $cat = Cat::findOrFail($id);

        // Optional: Add authorization to ensure user owns the cat
        // $this->authorize('update', $cat);

        return view('cats.edit', compact('cat')); // Make sure this view exists
    }
}
