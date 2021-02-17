<?php

namespace App\Http\Controllers; //名前空間の宣言

use Illuminate\Http\Request; //クラスのインポート(Illuminate\Http内のRequestを使える状態にする)
use Illuminate\Http\Response; //クラスのインポート(Illuminate\Http内のResponseを使える状態にする)
use Illuminate\Support\Facades\DB; //DBクラスのインポート(Illuminate\Support\Facades内のDBを使える状態にする)

class ArticleController extends Controller
{
  //articleページ表示 -----------------------------------------
  public function index(Request $request)
  { 
    $articles = [
      'articles' => DB::select('SELECT * FROM articles')
    ];
    return view('index', $articles);
  }
  // 記事投稿-------------------------------------------------
  public function post(Request $request)
  { 
    $articles = [
      'articles' => DB::select('SELECT * FROM articles')
    ];
    return view('index', $articles);
  }
  // ---------------------------------------------------------
  public function store(Request $request)
  {
    DB::insert('INSERT INTO articles ("title", "text") VALUES (?, ?)', ['title' => $request->title], ['text' => $request->text]);
    return redirect('index');
  }

  //commentページ表示 -----------------------------------------
  //投稿記事表示 -----------------------------------------
  public function comment(Request $request)
  { 
    if (isset($request->id)) 
    {
      $param = ['id' => $request->id];
      $articles = [
        'articles' => DB::select('SELECT * FROM articles WHERE id = :id', $param)
      ];
    } 
    else
    {
      $articles = [
        'articles' => DB::select('SELECT * FROM articles')
      ];
    }
    return view('comment', $articles);
    //コメント表示 -----------------------------------------
  //   if (isset($request->id)) 
  //   {
  //     $param = ['id' => $request->id];
  //     $comments = [
  //       'comments' => DB::select('SELECT * FROM comments WHERE id = :id', $param)
  //     ];
  //   } 
  //   else
  //   {
  //     $comments = [
  //       'comments' => DB::select('SELECT * FROM comments')
  //     ];
  //   }
  //   return view('comment', $comments);
  }
}