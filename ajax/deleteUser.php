<?
$id = $_POST['id'];

require_once "../lib/mysql.php";

$sql = 'DELETE FROM `users` WHERE `id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);
