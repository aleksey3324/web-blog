<header class="header">
  <span class="logo">Blog Master</span>
  <nav class="menu">
    <a class="menu-link" href="/blog-php-work/">Главная</a>
    <a class="menu-link" href="/blog-php-work/contact.php">Контакты</a>
    <? if(isset($_COOKIE['login'])): ?>
      <a class="menu-link" href="/blog-php-work/users.php">Список пользователей</a>
      <a class="menu-link" href="/blog-php-work/add-article.php">Добавить статью</a>
      <a class="menu-link btn" href="/blog-php-work/login.php">Кабинет пользователя</a>
    <? else: ?>
      <a class="menu-link btn" href="/blog-php-work/login.php">Войти</a>
      <a class="menu-link btn" href="/blog-php-work/register.php">Регистрация</a>
    <? endif; ?>
  </nav>
</header>