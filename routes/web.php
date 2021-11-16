<?php

use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('main');
});
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/about', [ContactController::class,'index']);

// Route::get('/articles/{id}', [ArticleController::class, 'show'])->where('id', '[0-9]+');
Route::get('/articles/create', function(){
    return view('articles.create');
});
Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::post('/articles/{id}/comments', [ArticleCommentController::class, 'store']);
Route::post('/articles', [ArticleController::class, 'store']);