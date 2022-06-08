<!DOCTYPE html>
<html lang="ru">

<head>
  <?
    $website_title = 'Blog Master';
    require "blocks/head.php";
  ?>
  <link rel="stylesheet" href="/blog-php-work/css/post.css">
</head>

<body>
  <? require "blocks/header.php" ?>

  <div class="wrapper">
    <section class="main">
      <?
        require_once "lib/mysql.php";

        $sql = 'SELECT * FROM articles ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
          echo "<div class='post'>
            <h2 class='title'>$row->title</h2>
            <p class='anons'>$row->anons</p>
            <p class='avtor'>Автор: <span>$row->avtor</span></p>
            <a class='link-read' href='/blog-php-work/post.php?id=$row->id'>Прочитать больше</a>
          </div>";
        }
        // 
      ?>
    </section>

    <? require "blocks/aside.php" ?>
  </div>


  <? require "blocks/footer.php" ?>
</body>

</html>