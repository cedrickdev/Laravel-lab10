<?php


use App\Http\Controllers\PostController;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PostController::class)->prefix('post')->name('post.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'show')->where(["id" => '[0-9]+', "slug" => '[a-z0-9\-]+'])->name('show');
    Route::post('/create', 'create')->name('create');
    Route::post('/update/{id}', 'update')->name('update'); //post.update($id)
    Route::post('/delete/{id}', 'delete')->name('delete'); //post.delete($id)
});
