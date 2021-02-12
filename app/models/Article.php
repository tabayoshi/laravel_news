<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //テーブル名
    protected $table = 'articles';
    //可変項目
    protected $fillable = [
        'title',
        'text',
    ];
//モデルを引き継いだArticleというクラスを使えば、aticlesというテーブルの中の'title'、'text'というカラムを使える
    public function comments()
    {
        return $this->hasMany('app\models\Comment');
    }
}
