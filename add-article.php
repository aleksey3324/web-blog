<?
if (!isset($_COOKIE['login'])) {
  header('Location: /blog-php-work/register.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  $website_title = 'Добавить статью';
  require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/form.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <h1>Добавить статью</h1>
      <form class="aside-form">
        <label class="form__label" for="title">Название статьи</label>
        <input class="form__input" name="title" id="title" type="text">

        <label class="form__label" for="anons">Анонс статьи</label>
        <textarea class="textarea__input" name="anons" id="anons"></textarea>

        <label class="form__label" for="full_text">Основной текст</label>
        <textarea class="textarea__input" name="full_text" id="full_text"></textarea>


        <div class="error-mess" id="error-block"></div>

        <button class="form__button" id="add-article" type="button">Добавить</button>
      </form>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>

  <script>
    $('#add-article').click(() => {
      let title = $('#title').val(),
          anons = $('#anons').val(),
          full_text = $('#full_text').val();

      $.ajax({
        url: '/blog-php-work/ajax/add-article.php',
        type: 'POST',
        cahe: false,
        data: {
          'title': title,
          'anons': anons,
          'full_text': full_text
        },
        dataType: 'html',
        success: (data) => {
          if (data === "Done") {
            $('#add-article').text("Всё готово");
            $('#error-block').hide();
            $('#title').val('');
            $('#anons').val('');
            $('#full_text').val('');
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