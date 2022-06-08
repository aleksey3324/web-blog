<!DOCTYPE html>
<html lang="ru">

<head>
  <?
  $website_title = 'Список пользователей';
  require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/users.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <h1>Список пользователей</h1>
      <?
      require_once "lib/mysql.php";

      $sql = 'SELECT `login`, `name`, `id` FROM `users`';
      $query = $pdo->query($sql);
      $users = $query->fetchAll(PDO::FETCH_OBJ);

      echo '<div class="all-users">';
      foreach ($users as $user) {
        echo "<div class='user-block block-$user->id'><div class='user-block__info'><b>Имя:</b> $user->name, <b>логин:</b> $user->login</div><button class='user-block__delete' onclick='deleteUser($user->id)'>Удалить</button></div>";
      }
      echo '</div>';

      ?>

    </section>
      <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>

  <script>
    function deleteUser(id) {
      $.ajax({
        url: '/blog-php-work/ajax/deleteUser.php',
        type: 'POST',
        cache: false,
        data: {
          'id': id
        },
        dataType: 'html',
        success: (data) => {
          $(`.block-${id}`).remove();
        }
      });
    }
  </script>
</body>

</html>