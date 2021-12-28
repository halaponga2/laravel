<?php

namespace App\Http\Controllers;

use App\Events\EventPublicArticle;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Notifications\ArticleNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
   public function index(){
    //    $article= Article::all();
        $currentPage = request()->get('page',1);
        $article = Cache::rememberForever('articles:all'.$currentPage, function(){
            return Article::paginate(5);
        });
        
    //    $article= Article::orderBy('name')->get();
        // $article= Article::where('name', 'Ivan')->get();
        // $article= Article::latest()->get();
        return view('articles.index', ['articles' =>$article]);
   }
   
   public function create(){
       $this->authorize('create', [self::class]);
       return view('articles.create');
   }

   public function show($id){
        $article = Cache::rememberForever('article:'.$id, function()use($id){
            return Article::findOrFail($id);
        });
        $comments = Cache::rememberForever('article:comment:'.$id, function()use($id){
            return  ArticleComment::where('article_id', $id)->where('accept', 1)->paginate(3);
        });
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
        Cache::forget('articles:all');
        $user = User::where('id', '!=', auth()->user()->id)->get();
        Notification::send($user, new ArticleNotification($article));
        event(new EventPublicArticle($article->name));
        // return redirect('/main')->with('msg', 'Новость создана!');
        return redirect('/articles/'.$article->id);

    }
    public function update($id){
        Gate::authorize('update-article');
        $article = Article::findOrFail($id);
        Cache::forget('articles::all');
        Cache::forget('article:'.$id);
        return view('articles.edit', ['article' => $article]);
    }

    public function destroy($id){
        Gate::authorize('delete-article');
        Article::findOrFail($id)->delete();
        ArticleComment::where('article_id', $id)->delete();
        Cache::forget('articles::all');
        Cache::forget('article:'.$id);
        Cache::forget('article:comment:'.$id);
        return redirect('/articles');
    }
}
