<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //テーブル名
    protected $table = 'comments';
    //可変項目
    protected $fillable = [
        'id', //0
        'comment',  //1
    ];
//モデルを引き継いだCommentというクラスを使えば、commentsというテーブルの中の'commentというカラムを使える
    public function articles() {
        return $this->belongsTo('app\models\Article');
    }
}
