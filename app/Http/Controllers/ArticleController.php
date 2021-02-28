<?php

namespace App\Http\Controllers; //名前空間の宣言

use App\models\Article;
use Illuminate\Http\Request; //クラスのインポート(Illuminate\Http内のRequestを使える状態にする)
use Illuminate\Validation\Validator;

class ArticleController extends Controller {
//投稿記事表示 -----------------------------------------
  public function index(Request $request) {
    // $articles = Article::all();
    $sort = $request->sort;
    $articles = Article::paginate(5);
    return view('index', ['articles' => $articles]);
  }
  // 記事投稿 --------------------------------
  public function store(Request $request) {
    // バリデーション ------------------------
    $this->validate(
      $request,
      [
      'title' => 'required|string|max:30',
      'text' => 'required|string',
      ],
      [
        'title.required' => 'タイトルは必須です',
        'title.max' => 'タイトルは30文字以下です',
        'text.required' => '記事は必須です',
      ]);
    // ---------------------------------------
    $article = new Article;
    $article->title = $request->title;
    $article->text = $request->text;
    $article->save();
    // dd($article);
    return redirect()->back();
  }
}