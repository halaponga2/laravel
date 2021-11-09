<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Models\Article;
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

Route::get('/main', [ArticleController::class, 'index']);
Route::get('/contact', [ContactController::class,'index']);
Route::get('/article', function () {
    return view('article');
});
Route::post('/article', [ArticleController::class, 'create']);