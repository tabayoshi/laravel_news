<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <section>
            @foreach($articles as $article)
                <h3>{{$article->id}}. {{$article->title}}</h3>
                <p>{{$article->text}}</p>
            @endforeach
        </seciton>
        <hr>
        <section>
            <form method="post" action="/comment">
                {{ csrf_field() }} <!-- CSRF対策(書かないと正しく動作しない) -->
                <div class="comment">
                    <label class="label_text">コメント：</label>
                    <textarea name="comment" cols="30" rows="5" value=""></textarea>
                </div><!-- .text -->
            
                <input type="submit" name="submit" value="投稿">
            </form>
            <hr>
        </section>
        <form method="post" action="/commnet">
           @foreach($comments as $comment)
                <!-- <p>{{$comment->article_id}}</p> -->
                <p>{{$comment->id}}. {{$comment->comment}}</p>
                
                <input type="submit" name="delete" value="コメントを削除">
                <hr>
            @endforeach
        </form>
        
</html>
