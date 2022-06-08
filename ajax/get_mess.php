<?php
  require_once "../lib/mysql.php";

  // Получаем все сообщения из БД
  $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
  $query = $pdo->prepare($sql);
  $query->execute();
  $mess = $query->fetchAll(PDO::FETCH_OBJ);

  if(count($mess) == 0) {
    echo '<div class="error-chat">Пока сообщений еще нет</div>';
    exit();
  }

  $html = '';
  foreach($mess as $el)
    $html .= "<div class='chat-mess'>$el->mess</div>";

  echo $html;
?>
