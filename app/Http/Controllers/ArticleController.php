<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
   public function index(){
    //    $article= Article::all();
        $article= Article::paginate(5);
    //    $article= Article::orderBy('name')->get();
        // $article= Article::where('name', 'Ivan')->get();
        // $article= Article::latest()->get();
        return view('articles.index', ['articles' =>$article]);
   }
   
   public function create(){
       Gate::authorize('create-article');
       return view('articles.create');
   }

   public function show($id){
        $article = Article::findOrFail($id);
        $comments = ArticleComment::where('article_id', $id)->where('accept', 1)->paginate(3); 
        return view('articles.view', ['article'=>$article, 'comments'=>$comments]);
   }

    public function store($id=null){
        
        // $article->setAttribute('name', 'Имя');`.
        // $article->setAttribute('short_text', 'Проверка дефолт даты');
        // $article->setAttribute('data_create', '21.10.21');
        if ($id===null) {$article = new Article();}
        else{$article = Article::findOrFail($id);}
        $article->name=request('name');
        $article->short_text=request('short_text');
        $article->data_create=request('data_create');
        $article->save();
        // return redirect('/main')->with('msg', 'Новость создана!');
        return redirect('/articles');

    }
    public function update($id){
        Gate::authorize('update-article');
        $article = Article::findOrFail($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function destroy($id){
        Gate::authorize('delete-article');
        Article::findOrFail($id)->delete();
        ArticleComment::where('article_id', $id)->delete();
        return redirect('/articles');
    }
}
