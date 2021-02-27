<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //テーブル名
    protected $table = 'comments';
    protected $primaryKey = 'id';
    //可変項目
    protected $fillable = [
        'id',
        'article_id',
        'comment',
    ];
//モデルを引き継いだCommentというクラスを使えば、commentsというテーブルの中の'commentというカラムを使える
    public function article() {
        return $this->belongsTo('app\models\Article', 'article_id', 'id');
    }
}
