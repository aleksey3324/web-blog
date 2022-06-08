<!DOCTYPE html>
<html lang="ru">

<head>
  <?
    $website_title = 'Ошибка 404';
    require "blocks/head.php";
  ?>
</head>

<body>

  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <p>Ошибка 404! Перейдина на <a href="/blog-php-work/">главную</a></p>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>
</body>

</html>