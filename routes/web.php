<?php

use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', static function () {
    return 'Welcome to the Home page';
});

Route::get('/contact', static function () {
    return 'Contact';
});

$posts = [
    1 => [
        'title' => 'Title 1',
        'content' => 'Content 1',
        'isNew' => true,
        'authors' => [
            1 => [
                'name' => 'John',
                'surname' => 'Doe'
            ],
            2 => [
                'name' => 'Jane',
                'surname' => 'Doe'
            ]
        ]
    ],
    2 => [
        'title' => 'Title 2',
        'content' => 'Content 2',
        'isNew' => false,
        'authors' => [
            1 => [
                'name' => 'Jack',
                'surname' => 'Dey'
            ],
            2 => [
                'name' => 'Jim',
                'surname' => 'Joe'
            ]
        ]
    ],
];

// php artisan serve
// php artisan make:view layouts.app
// 5
Route::prefix('posts')->name('posts.')->group(function () use ($posts) {
    Route::get('/', function () use ($posts) {
        return view('posts.index', ['posts' => $posts]);
    })->name('index');

    Route::get('newest/{isNew?}', function (bool $isNew = false) use ($posts) { // isNew? - ? neprivalomas parametras
        $formattedPosts = [];
        foreach ($posts as $post) {
            if ($isNew) {
                if ($post['isNew']) {
                    $formattedPosts[] = $post;
                }
            } else {
                $formattedPosts[] = $post;
            }
        }
        return view('posts.index', ['posts' => $formattedPosts]);
    })->name('newest');

    Route::get('{id}', function (int $id) use ($posts) {
        abort_if(!isset($posts[$id]), 404);
        return view('posts.show', ['post' => $posts[$id]]);
    })->name('show');

    Route::get('{postId}/author/{authorId}', function (int $postId, int $authorId) use ($posts) {
        abort_if(!isset($posts[$postId]['authors'][$authorId]), 404);
        return view('posts.author', ['post' => $posts[$postId], 'author' => $posts[$postId]['authors'][$authorId]]);
    })->name('author');
});
