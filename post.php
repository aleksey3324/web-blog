<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  require_once "lib/mysql.php";

  $sql = 'SELECT * FROM articles WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$_GET['id']]);

  $article = $query->fetch(PDO::FETCH_OBJ);

  $website_title = $article->title;

  require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/post.css">
  <link rel="stylesheet" href="/blog-php-work/css/form.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <?
      require_once "lib/mysql.php";

      $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
      $query = $pdo->query($sql);

      echo "<div class='post'>
                  <h2 class='title'>$article->title</h2>
                  <p class='anons'>$article->anons</p>
                  <p class='avtor'>Автор: <span>$article->avtor</span></p>
                  <p class='text'>$article->full_text</p>
                  <p class='date'><b>Дата публикации: </b>" . date('d.m.Y в H:i:s', $article->date) . "</p>
                  <a class='link-read' href='/blog-php-work/'>На главную</a>
              </div>";
      ?>

      <h3 class="comment-title">Комментарии</h3>

      <form class="comment-form">
        <label class="form__label" for="username">Ваше имя</label>
        <?php if (isset($_COOKIE['login'])) : ?>
          <input class="form__input" name="username" id="username" type="text" value="<?= $_COOKIE['login'] ?>">
        <? else : ?>
          <input class="form__input" name="username" id="username" type="text">
        <? endif; ?>

        <label class="form__label" for="mess">Сообщение</label>
        <textarea class="textarea__input" name="mess" id="mess"></textarea>

        <div class="error-mess" id="error-block"></div>

        <button class="form__button" id="mess_send" type="button">Добавить комментарий</button>
      </form>

      <div class="comments">
        <?
        $sql = 'SELECT * FROM comments WHERE `article_id` = ? ORDER BY id DESC';
        $query = $pdo->prepare($sql);
        $query->execute([$_GET['id']]);

        $comments = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($comments as $comment) {
          echo "<div class='comment'>
          <h2>$comment->name</h2>
          <p>$comment->mess</p>
        </div>";
        }
        ?>
      </div>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>

  <script>
    $('#mess_send').click(() => {
      let name = $('#username').val();
      let mess = $('#mess').val();

      $.ajax({
        url: '/blog-php-work/ajax/commend_add.php',
        type: 'POST',
        cahe: false,
        data: {
          'username': name,
          'mess': mess,
          'id': '<?= $_GET['id'] ?>'
        },
        dataType: 'html',
        success: (data) => {
          if (data === "Done") {
            $('.comments').prepend(`<div class='comment'><h2>${name}</h2><p>${mess}</p></div>`);
            $('#mess_send').text("Всё готово");
            $('#error-block').hide();
            $('#mess').val("");
          } else {
            $('#error-block').show();
            $('#error-block').text(data);
          }
        }
      });
    });
  </script>
</body>

</html>