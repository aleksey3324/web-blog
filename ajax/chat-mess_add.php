<?
$mess = trim(filter_var($_POST['chat_mess'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

if (strlen($mess) == 0)
  exit();

require_once "../lib/mysql.php";

$sql = 'INSERT INTO `chat`(`mess`) VALUES (?)';
$query = $pdo->prepare($sql);
$query->execute([$mess]);
