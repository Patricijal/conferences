<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatRequest;
use App\Models\Cat;
use App\Services\Cats;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Cat $cat)
    {
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

    /**
     * Remove old image file if it exists
     */
    private function removeOldImage($filename): void
    {
        if ($filename) {
            $filePath = public_path('cat-images/' . $filename);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
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
    public function update(StoreCatRequest $request, Cats $cats, int $id): RedirectResponse
    {
        $cat = (new Cat())->findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            // Remove old image if it exists
            $this->removeOldImage($cat->image_path);
            // Store new image
            $validated['image_path'] = $cats->storeImage($request->file('image_path'));
        } else {
            // Keep the existing image if no new image is uploaded
            unset($validated['image_path']);
        }

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
        $this->removeOldImage($cat->image_path);
        $cat->delete();

        session()->flash('status', 'Cat removed!');
        return redirect()->route('cats.index');
    }
}
