<?php


use App\Http\Controllers\PostController;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->group(function () {

    

    Route::get('/{slug}-{id}', function (string $slug, string $id, Request $request) {
        return [
            "slug" => $slug,
            "id" => $id
        ];
    })->where([
                "id" => '[0-9]+',
                "slug" => '[a-z0-9]\-'
            ])->name('show');

    Route::get('/', function (Request $request) {

        return [
            "link" => \route('blog.show', ['slug' => 'article', 'id' => 13]),
        ];
    })->name('index');

});

Route::get('/create', [PostController::class, 'create']);
Route::get('/show', [PostController::class, 'index']);
Route::get('/show/{id}', [PostController::class, 'show']);
Route::get('/update/{id}', [PostController::class, 'update']);
Route::get('/delete/{id}', [PostController::class, 'delete']);
