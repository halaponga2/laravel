<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function store($id){
        $article = Article::find($id);
        if ($article){
            $comment_title = request('title');
            $comment = request('comment');
            if ($comment_title && $comment){
                $new_comment = new ArticleComment();
                $new_comment->title = $comment_title;
                $new_comment->comment = $comment; 
                $new_comment->article()->associate($article);
                $new_comment->save();
                return redirect('articles/'.$article->id);
            }
        }
    }
}
