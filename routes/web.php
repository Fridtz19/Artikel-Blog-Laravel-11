<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('articles.index');
});

Route::resource('articles', ArticleController::class);