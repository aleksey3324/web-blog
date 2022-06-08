<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  $website_title = 'Авторизация';
  require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/form.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <!-- Если не существует лог -->
      <? if (!isset($_COOKIE['login'])) : ?>
        <h1>Авторизация</h1>
        <form class="register-form">
          <label class="form__label" for="login">Логин</label>
          <input class="form__input" name="login" id="login" type="text">

          <label class="form__label" for="password">Пароль</label>
          <input class="form__input" name="password" id="password" type="password">

          <div class="error-mess" id="error-block"></div>

          <button class="form__button" id="login-reg" type="button">Войти</button>
        </form>
      <? else : ?>
        <h2><?= $_COOKIE['login'] ?></h2>
        <form class="register-form">
          <button class="form__button" id="exit_user" type="button">Выйти</button>
        </form>
      <? endif; ?>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>

  <script>
    $('#login-reg').click(() => {
      let login = $('#login').val();
      let pass = $('#password').val();

      $.ajax({
        url: '/blog-php-work/ajax/login.php',
        type: 'POST',
        cahe: false,
        data: {
          'login': login,
          'password': pass
        },
        dataType: 'html',
        success: (data) => {
          if (data === "Done") {
            $('#login-reg').text("Всё готово");
            $('#error-block').hide();
            document.location.reload(true);
          } else {
            $('#error-block').show();
            $('#error-block').text(data);
          }
        }
      });
    });

    $('#exit_user').click(() => {
      $.ajax({
        url: '/blog-php-work/ajax/exit.php',
        type: 'POST',
        cahe: false,
        data: {},
        dataType: 'html',
        success: (data) => {
          document.location.reload(true);
        }
      });
    });
  </script>
</body>

</html>