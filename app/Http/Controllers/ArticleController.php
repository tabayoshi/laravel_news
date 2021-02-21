<?php

namespace App\Http\Controllers; //名前空間の宣言

use App\models\Article;
use Illuminate\Http\Request; //クラスのインポート(Illuminate\Http内のRequestを使える状態にする)

class ArticleController extends Controller {
//articleページ表示 -----------------------------------------
  public function index(Request $request) {
    $articles = Article::all();
    return view('index', ['articles' => $articles]);
  }
  // データベースへの書き込み ---------------------------------
  public function store(Request $request) {
    $article = new Article;
    $article->title = $request->title;
    $article->text = $request->text;
    $article->save();
    return redirect('/');
  }
}