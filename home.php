<?php
error_reporting(-1);

/* データベース設定 */
define('DB_DNS', 'mysql:host=php8-2-db-host; dbname=cri_sortable; charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

try {
  $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    echo $e->getMessage();
    exit;
}
?>

  <!DOCTYPE html>
  <html lang="ja">
  <head>
      <meta charset="UTF-8">
      <title></title>
      <link rel="stylesheet" href="css/reset.css"><!--ダウンロードしたreset.cssを最初に読み込む-->
      <link rel="stylesheet" href="css/stylea.css">

  </head>
  <body>
  <div class="header">
      <ul>
          <li><a href="home.html">ホーム</a></li>
          <li><a href="list.html">一覧表</a></li>
          <li><a href="page3.html">登録</a></li>
          <li><a href="page4.html">削除</a></li>
          <li><a href="page5.html">出力</a></li>
          <li><a href="page5.html">その他</a></li>
      </ul>
  </div>
  <div class="visual">
    <!--
      <div class="list">
    <li>リスト</li>
    </div>*/
-->
      <div class="view">
        <?php
      $sql = 'SELECT * FROM template';
      $stmt = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      foreach ($stmt as $result){
        echo '  <div class="title" data-num="'.$result['id'].'" ">'.PHP_EOL;
        echo '    <p><span class="name">'.$result['id'].'. '.$result['title'].'</span></p>'.PHP_EOL;
        echo '  </div>'.PHP_EOL;
      }
      ?>
      </div>

      <div class="content">
      <?php
      $sql = 'SELECT * FROM template';
      $stmt = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      foreach ($stmt as $result){
        echo '  <div class="text" data-num="'.$result['text'].'" ">'.PHP_EOL;
        echo '    <p><span class="name">'.$result['text'].'</span></p>'.PHP_EOL;
        echo '  </div>'.PHP_EOL;}
      ?>

      </div>
  </div>
  <div class="footer">
      <ul>
          <li>ホーム</li>
      </ul>
  </div>
  </body>
  </html>



</body>


</body>
</html>