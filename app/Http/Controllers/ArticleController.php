<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
   public function index(){
       $article= Article::all();
    //    $article= Article::orderBy('name')->get();
        // $article= Article::where('name', 'Ivan')->get();
        // $article= Article::latest()->get();
        return view('articles.index', ['articles' =>$article]);
   }
   

   public function show($id){
        $article= Article::findOrFail($id);
        return view('articles.view', ['article'=>$article]);
   }

    public function store(){
        $article = new Article();
        // $article->setAttribute('name', 'Имя');`.
        // $article->setAttribute('short_text', 'Проверка дефолт даты');
        // $article->setAttribute('data_create', '21.10.21');
        $article->name=request('name');
        $article->short_text=request('short_text');
        $article->data_create=request('data_create');
        $article->save();
        // return redirect('/main')->with('msg', 'Новость создана!');
        return redirect('/articles');

    }
}
