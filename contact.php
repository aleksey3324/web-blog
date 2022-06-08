<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  $website_title = 'Контакты';
  require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/form.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <h1>Обратная связь</h1>
      <form class="aside-form">
        <label class="form__label" for="username">Имя</label>
        <input class="form__input" name="username" id="username" type="text">

        <label class="form__label" for="email">Email</label>
        <input class="form__input" name="email" id="email" type="email">

        <label class="form__label" for="mess">Сообщение</label>
        <textarea class="textarea__input" name="mess" id="mess"></textarea>


        <div class="error-mess" id="error-block"></div>

        <button class="form__button" id="mess_send" type="button">Отправить</button>
      </form>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>

  <script>
    $('#mess_send').click(() => {
      let name = $('#username').val(),
          email = $('#email').val(),
          mess = $('#mess').val();

      $.ajax({
        url: '/blog-php-work/ajax/mail.php',
        type: 'POST',
        cahe: false,
        data: {
          'name': name,
          'email': email,
          'mess': mess
        },
        dataType: 'html',
        success: (data) => {
          if (data === "Done") {
            $('#mess_send').text("Всё готово");
            $('#error-block').hide();
            $('#name').val('');
            $('#email').val('');
            $('#mess').val('');
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