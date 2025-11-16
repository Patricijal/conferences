<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CatsController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('home');
});

//Route::get('/', static function () {
//    return 'Welcome to the Home page';
//});

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

$users = [
    2 => [
        'id' => 2,
        'name' => 'Petras',
        'surname' => 'Petraitis',
        'birthday' => '2013-10-12',
        'cart' => [
            '0001' => [
                'keyword' => 'leather_jacket',
                'color' => 'black',
            ],
            '0053' => [
                'keyword' => 'jeans',
                'color' => 'blue',
            ],
            '0063' => [
                'keyword' => 'hat',
                'color' => 'purple',
            ],
        ]
    ],
    35 => [
        'id' => 35,
        'name' => 'Jonas',
        'surname' => 'Jonaitis',
        'birthday' => '2005-04-15',
        'cart' => [
            '0001' => [
                'keyword' => 'leather_jacket',
                'color' => 'black',
            ],
            '0053' => [
                'keyword' => 'jeans',
                'color' => 'blue',
            ],
            '0063' => [
                'keyword' => 'hat',
                'color' => 'purple',
            ],
        ]
    ],
];

//Route::get('/', function () {
//    return 'Welcome to the Home page';
//})->name('dashboard');

route::prefix('/user')->name('user.')->group(function () use ($users) {
    Route::get('{id}', function ($id) use ($users) {
        if (Carbon::parse($users[$id]['birthday'])->age > 13) {
            return redirect()->route('dashboard');
        }
        abort(403);
    });

    Route::get('{id}/cart', function ($id) use ($users) {
        return response('success', 200)
            ->cookie('USER_CART', json_encode($users[$id]['cart']), 3600);
    })->name('cart');

    Route::get('list/filter', function (Request $request) {
        return response()->json($request->query());
        // http://127.0.0.1:8000/user/list/filter?limit=10&page=2
        // {"limit":"10","page":"2"}
    });
});

Route::resource('articles', ArticlesController::class);
//Route::get('articles/create', [ArticlesController::class, 'create'])->name('articles.create');
//Route::post('articles/store', [ArticlesController::class, 'store'])->name('articles.store');

// react / Vue.js (frontend)
// laravel (backend)
// frontend <-> backend - API / Inertia / livewire ajax Js i div ikisa turinio blokus

Route::resource('cats', CatsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
