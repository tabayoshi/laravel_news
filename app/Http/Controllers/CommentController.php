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
        // バリデーション ------------------------
        $this->validate(
            $request,
            [
                'comment'    => 'required|string|max:50',
            ],
            [
                'comment.required'    => 'コメントは必須です。',
                'comment.max'         => 'コメントは50文字以下です。',
            ]

        );
        // ---------------------------------------
        $comment = new Comment;
        $comment->article_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();
        // dd($comment);
        return redirect()->back();
    }
    // コメント削除 ----------------------------------------
    // public function destroy(Request $request) {
    //     $comment->destroy();
    //     return redirect("/comment?id={{ $comment->id }}");
    //     $comment = Comment::find();
    //     $comment->delete();
    // }
}
