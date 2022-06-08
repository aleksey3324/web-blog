<?
  setcookie('login', '', time() - 3600 * 24 * 30, "/blog-php-work/");
  unset($_COOKIE['login']);