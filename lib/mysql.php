<?
$user = 'root';
$password = 'root';
$db = 'web-master';
$host = 'localhost';
$port = 3306;

// кеширую пароль
$dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';port=' . $port;
$pdo = new PDO($dsn, $user, $password);