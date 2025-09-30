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

//// 1
//Route::get('/posts', function () use ($posts) {
//    $response = '';
//    foreach ($posts as $post) {
//        $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
//    }
//    return $response;
//}) ->name('posts.index');
//
//// 2
//Route::get('/posts/{postId}', function ($id) use ($posts) {
//    return "<h3>{$posts[$id]['title']}</h3><p>{$posts[$id]['content']}</p>";
//});
//
//// 3
//Route::get('/posts/author/{postId}/{authorId}', function (int $postId, int $authorId) use ($posts) {
//    if(isset($posts[$postId]['authors'][$authorId])) { // isset - ar kintamasis egzistuoja
//        $author = $posts[$postId]['authors'][$authorId];
//        return "<h3>{$posts[$postId]['title']}</h3><p>Author: {$author['name']} {$author['surname']}</p>";
//    }
//    return 'Record not found';
//}) ->name('posts.author');
//// dd() - debug (dump and die)
//// dump()
//
//// 4
//Route::get('/posts/newest/{isNew}', function (bool $isNew = false) use ($posts) {
//    $response = '';
//    foreach ($posts as $post) {
//        if ($isNew) {
//            if ($post['isNew']) {
//                $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
//            }
//        } else {
//            $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
//        }
//    }
//    return $response;
//}) ->name('posts.newest');

// 5
Route::prefix('posts')->name('posts.')->group(function () use ($posts) {
    Route::get('/', function () use ($posts) {
        $response = '';
        foreach ($posts as $post) {
            $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
        }
        return $response;
    })->name('index');

    Route::get('newest/{isNew?}', function (bool $isNew = false) use ($posts) { // isNew? - ? neprivalomas parametras
        $response = '';
        foreach ($posts as $post) {
            if ($isNew) {
                if ($post['isNew']) {
                    $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
                }
            } else {
                $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
            }
        }
        return $response;
    })->name('newest');

    Route::get('{id}', function (int $id) use ($posts) {
        if (isset($posts[$id])) {
            return "<h3>{$posts[$id]['title']}</h3><p>{$posts[$id]['content']}</p>";
        }
        return 'Post not found';
    })->name('show');

    Route::get('author/{postId}/{authorId}', function (int $postId, int $authorId) use ($posts) {
        if (isset($posts[$postId]['authors'][$authorId])) { // isset - ar kintamasis egzistuoja
            $author = $posts[$postId]['authors'][$authorId];
            return "<h3>{$posts[$postId]['title']}</h3><p>Author: {$author['name']} {$author['surname']}</p>";
        }
        return 'Record not found';
    })->name('author');
});
