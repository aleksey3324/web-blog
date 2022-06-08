<?
//trim - удаляет пробелы до и после строки
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));


$error = '';
if (strlen($login) < 3)
  $error = 'Введите логин';
else if (strlen($pass) < 5)
  $error = 'Введите пароль';

if ($error != '') {
  echo $error;
  exit(); // выход из файлаs
}

require_once "../lib/mysql.php";

$salt = 'jkdskfjkdsjf&^&)dnvndj';
$pass = md5($salt . $pass);

$sql = 'SELECT id FROM users WHERE `login` = ? AND `password` = ?';

$query = $pdo->prepare($sql);
$query->execute([$login, $pass]);

if($query->rowCount() == 0)
  echo "Такого пользователя нет";
else {
  setcookie('login', $login, time() + 36000 * 24 * 30, "/blog-php-work/");
  echo "Done";
}
  
