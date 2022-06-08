<section class="aside">
  <div class="info">
    <h2 class="info__title">Интересные факты</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat omnis atque quam alias, esse officiis tenetur minus eveniet consequatur, voluptatum nisi numquam. Aspernatur natus iste ullam nobis culpa iure provident.</p>
  </div>
  <img class="aside__img" src="https://itproger.com/img/courses/1609834198.jpg">
  <div class="chat">
    <?
    require_once "lib/mysql.php";
    $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
    $query = $pdo->prepare($sql);
    $query->execute();

    $mess = $query->fetchAll(PDO::FETCH_OBJ);

    if (count($mess) == 0)
      echo '<div class="error-chat">Пока сообщений еще нет</div>';
    else
      foreach ($mess as $el)
        echo "<div class='chat-mess'>$el->mess</div>";
    ?>
  </div>
  <form class="chat-form" method="POST">
    <input class="chat__input" type="text" placeholder="Сообщение" name="chat_mess">
    <div class="error-mess" id="error-block"></div>
    <button class="chat__button" type="button">Отправить</button>
  </form>
</section>