<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  $website_title = 'Регистрация';
  require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/form.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <h1>Регистрация</h1>
      <form class="register-form">
        <label class="form__label" for="username">Ваше имя</label>
        <input class="form__input" name="username" id="username" type="text">

        <label class="form__label" for="email">Email</label>
        <input class="form__input" name="email" id="email" type="email">

        <label class="form__label" for="login">Логин</label>
        <input class="form__input" name="login" id="login" type="text">

        <label class="form__label" for="password">Пароль</label>
        <input class="form__input" name="password" id="password" type="password">

        <div class="error-mess" id="error-block"></div>

        <button class="form__button" id="user-reg" type="button">Зарегистрироваться</button>
      </form>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>

  <script>
    $('#user-reg').click(() => {
      let name = $('#username').val();
      let email = $('#email').val();
      let login = $('#login').val();
      let pass = $('#password').val();

      $.ajax({
        url: '/blog-php-work/ajax/reg.php',
        type: 'POST',
        cahe: false,
        data: {
          'username': name,
          'email': email,
          'login': login,
          'password': pass
        },
        dataType: 'html',
        success: (data) => {
          if (data === "Done") {
            $('#user-reg').text("Всё готово");
            $('#error-block').hide();
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