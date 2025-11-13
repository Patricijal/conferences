<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    /**
     * @var array
     */
//    protected array $cats = [
//        1 => [
//            'name' => 'Gato',
//            'breed' => 'Siamese',
//            'age' => '1 year old',
//            'gender' => 'Male',
//            'description' => 'Lorem ipsum dolor sit amet.',
//            'image' => 'cat1.jpg'
//        ],
//        2 => [
//            'name' => 'Penelope',
//            'breed' => 'Persian',
//            'age' => '3 year old',
//            'gender' => 'Female',
//            'description' => 'Lorem ipsum dolor sit amet.',
//            'image' => 'cat2.jpg'
//        ]
//    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Cat $cat)
    {
//        return view('cats.index', ['cats' => $this->cats])

//        $cat = new Cat();
        return view('cats.index', ['cats' => $cat->all()]);
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
    public function show(int $id)
    {
//        abort_if(!isset($this->cats[$id]), 404);
//        return view('cats.show', ['cat' => $this->cats[$id]]);
        return view('cats.show', ['cat' => Cat::findOrFail($id)]);
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
}
