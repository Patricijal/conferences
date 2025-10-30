<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * @var array
     */
    protected array $articles = [
        1 => [
            'title' => 'First article',
            'content' => 'Lorem ipsum dolor sit amet.'
        ],
        2 => [
            'title' => 'Second article',
            'content' => 'Aut ducimus enim in veniam.'
        ]
    ];

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        //$article = new Article();
        //return view('articles.index', ['articles' => $article->all()]);
        return \view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:5|max:20',
            'content' => 'required|min:10'
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        //abort_if(!isset($this->articles[$id]), 404);
        return view('articles.show', ['article' => Article::findOrFail($id)]);
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

//PS C:\xampp\htdocs\conferences> php artisan tinker
//Psy Shell v0.12.10 (PHP 8.2.12 — cli) by Justin Hileman
//> $article = new Article();
//
//   Error  Class "Article" not found.
//
//> $article = new App\Models\Article();
//= App\Models\Article {#6022}
//
//    > $article->title="Test"
//        = "Test"
//
//        > $article->content="Test content"
//            = "Test content"
//
//            > $article->save();
//    = true
