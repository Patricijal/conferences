<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatRequest;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
        return \view('cats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatRequest $request, Cat $cat)
    {
//        dd([
//            'hasFile' => $request->hasFile('image_path'),
//            'file' => $request->file('image_path'),
//            'all' => $request->all()
//        ]);

        $validated = $request->validated();
        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $this->storeImage($request->file('image_path'));
        }
        $catItem = $cat->create($validated);

        $request->session()->flash('status', 'Cat added!');

        return redirect()->route('cats.show', ['cat' => $catItem->id]);
    }
    /**
     * Store image in public/cat-images with unique name
     */
    private function storeImage($image): string
    {
        $directory = public_path('cat-images');

        // Ensure directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Get original file extension
        $extension = $image->getClientOriginalExtension();

        // Generate base filename from original name (without extension)
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $baseFilename = Str::slug($originalName);

        // Initial filename
        $filename = $baseFilename . '.' . $extension;
        $counter = 1;

        // Check if file exists and generate unique name
        while (File::exists($directory . '/' . $filename)) {
            $filename = $baseFilename . '-' . $counter . '.' . $extension;
            $counter++;
        }

        // Move the file to public/cat-images
        $image->move($directory, $filename);

        // Return only the filename for database
        return $filename;
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
    public function edit(int $id)
    {
        $cat = Cat::findOrFail($id);
        return view('cats.edit', ['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCatRequest $request, int $id)
    {
        $cat = (new Cat())->findOrFail($id);
        $validated = $request->validated();
        $cat->fill($validated);
        $cat->save();

        $request->session()->flash('status', 'Cat information updated!');

        return redirect()->route('cats.show', ['cat' => $cat->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cat = (new Cat())->findOrFail($id);
        $cat->delete();

        session()->flash('status', 'Cat removed!');
        return redirect()->route('cats.index');
    }
}
