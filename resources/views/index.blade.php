<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>laravelnews</title>
  </head>
  <body>
      <header>
        <p>Laravel News</p>
      </header>

      <section>
        <h2>さぁ、最新のニュースをシェアしましょう</h2>  
        
        <!-- フォーム入力 データベースへの書き込みに変更-->
        <form method="post" action="article.store"> //rout::article.store
            {{ csrf_field() }} <!-- CSRF対策(書かないと正しく動作しない) -->
          <div class="title">
            <label class="label_title">タイトル：</label>
            <input type="text" class="title" name="title" cols="50" value="">
          </div><!-- .title -->
          
          <div class="text">
            <label class="label_text">記事：</label>
            <textarea name="text" cols="50" rows="10" value=""></textarea>
          </div><!-- .text -->
        
          <input type="submit" name="submit" value="投稿">
        </form>
        <hr>
      </section>

      <!-- データベース内容表示 -->
      @foreach($articles as $article)
        <h3>{{$article->id}}. {{$article->title}}</h3>
        <p>{{$article->text}}</p>
        <a href="http://localhost:8888/public/comment?id={{$article->id}}">全文表示・コメントする</a>
        <hr>
      @endforeach

    <!-- <script src="script.js"></script> -->
  </body>
</html>
