<?php

namespace App\Http\Controllers; //名前空間の宣言

use App\models\Article;
use Illuminate\Http\Request; //クラスのインポート(Illuminate\Http内のRequestを使える状態にする)
use Illuminate\Support\Facades\DB; //DBクラスのインポート(Illuminate\Support\Facades内のDBを使える状態にする)

class ArticleController extends Controller
{
//articleページ表示 -----------------------------------------
      public function index(Request $request) {
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
      }
      
// ---------------------------------------------------------
  public function store(Request $request)
  {
    $param = [
      'title' => $request->title,
      'text' => $request->text,
    ];
    DB::insert('INSERT INTO articles (title, text) VALUES (:title, :text)', $param);
    return redirect('/index');
  }

  //commentページ表示 -----------------------------------------
  //投稿記事表示 -----------------------------------------
  public function comment(Request $request) { 
    if (isset($request->id)) {
      $param = ['id' => $request->id];
      $articles = Article::where('id',$param)->get();
    } else {
      $articles = Article::all();
    }
    //コメント表示 -----------------------------------------
    if (isset($request->id)) 
    {
      $param = ['id' => $request->id];
      $comments = [
        'comments' => DB::select('SELECT * FROM comments WHERE id = :id', $param)
      ];
    } 
    else
    {
      $comments = [
        'comments' => DB::select('SELECT * FROM comments')
      ];
    }
    $article = "['articles' => $articles]";
    return view('comment', compact($articles, $comments));
  }
}