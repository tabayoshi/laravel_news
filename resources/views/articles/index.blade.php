<?php


?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Laravel News</title>
    <link rel="stylesheet" href=" ./style.css">
  </head>
  <body>
    <header>
      <p>Laravel News</p>
    </header>

    <div>
      <h2>さぁ、最新のニュースをシェアしましょう</h2>
    
      <!-- エラーメッセージ表示 -->
      <?php if(!empty($error_text)): ?> 
        <ul>
          <?php foreach( $error_text as $value): ?>
            <li><?php echo $value; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
      <!-- フォーム入力 データベースへの書き込みに変更-->
      <form method="POST" action="">
        <div class="title">
          <label class="label_title">タイトル：</label>
          <input type="text" class="title" name="title" cols="50" value="">
        </div>
        
        <div class="text">
          <label class="label_text">記事：</label>
          <textarea name="text" cols="50" rows="10" value=""></textarea>
        </div>
      
        <input type="submit" class="button" name="btn_submit" value="投稿">
      </form>
      <hr>
    </div>

      <!-- 入力データ表示 -->
    <div>
      @foreach($articles as $article)
        <h3>{{$article->id}}. {{$article->title}}</h3>
        <p>{{$article->text}}</p>
      <a href="#">全文表示・コメントする</a>
      <hr>
      @endforeach
    </div>

    <script src="script.js"></script>
  </body>
</html>
