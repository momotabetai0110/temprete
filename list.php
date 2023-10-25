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
      <link rel="stylesheet" href="css/list.css">
      <script>
  function showText(textId) {
    var textElements = document.querySelectorAll('.text');
    for (var i = 0; i < textElements.length; i++) {
      textElements[i].style.display = 'none';
    }

    var selectedText = document.querySelector('.text[data-num="' + textId + '"]');
    if (selectedText) {
      selectedText.style.display = 'block';
    }
  }
</script>
  </head>
  <body>
  <div class="header">
      <ul>
      <li><a href="list.php">一覧表</a></li>
      <li><a href="list.php">編集</a></li>
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
        <<?php
    $sql = 'SELECT * FROM template';
    $stmt = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $result){
      echo '<div class="title" data-num="'.$result['id'].'" onclick="showText('.$result['id'].')">';
      echo '  <p><span class="name">'.$result['id'].'. '.$result['title'].'</span></p>';
      echo '</div>';
    }
  ?>
      </div>

      <div class="content">
      <?php
        $sql = 'SELECT * FROM template';
        $stmt = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $result) {
            echo '  <div class="text" data-num="' . $result['id'] . '" style="display: none;">' . PHP_EOL;
            echo '    <p><span class="name">' . $result['text'] . '</span></p>' . PHP_EOL;
            echo '  </div>' . PHP_EOL;
        }
        ?>

      </div>
  </div>
  <div class="footer">
          <li><a href="home.php"> ホーム</a></li>
  </div>
  </body>
  </html>



</body>


</body>
</html>