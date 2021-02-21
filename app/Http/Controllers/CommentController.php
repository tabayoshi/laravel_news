<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comment; 
use App\models\Article; 

class CommentController extends Controller
{
//投稿記事表示 -----------------------------------------
    public function comment(Request $request) { 
        $param = ['id' => $request->id];
        $articles = Article::where('id',$param)->get();
        // dd($articles);
        //コメント表示 -----------------------------------------
        $comments = Comment::where('article_id',$param)->get();
        // dd($comments);
        return view('/comment', ['articles' => $articles, 'comments' => $comments]);
    }
    // コメント投稿 ----------------------------------------
    public function store(Request $request) {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/comment');
    }
    // コメント削除 ----------------------------------------
    public function delete(Request $request) {
        $param = ['id' => $request->id];
        $comment = new Comment;
        $comment = Comment::where('id', $param)->delete();
        return redirect('/comment');
    }

}
