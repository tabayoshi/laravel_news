<?php

namespace App\Http\Controllers; //名前空間の宣言

use Illuminate\Http\Request; //クラスのインポート(Illuminate\Http内のRequestを使える状態にする)
use Illuminate\Support\Facades\DB; //DBクラスのインポート(Illuminate\Support\Facades内のDBを使える状態にする)

class ArticleController extends Controller
{
  public function index()
  { 
    $articles = DB::select('select * from articles');
    return view("articles.index", ['articles' => $articles]);
  }
  
  // -------------------------------------------------------------
  public function post()
  { 
    $articles = DB::select('select * from articles');
    return view("articles.index", ['articles' => $articles]);
  }
}