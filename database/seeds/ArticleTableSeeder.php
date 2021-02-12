<?php

use Illuminate\Database\Seeder;
use App\models\Article;
use App\models\Comment;


class AtricleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 50) //50件の投稿を作成
            -> create()
            ->each(function ($post) {
                $comments = factory(Comment::class, 2)->make(); //各投稿に２件のコメント作成
                $post->comments()->saveMany($comments);
            });
    }
}
