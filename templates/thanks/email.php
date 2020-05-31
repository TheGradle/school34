<?php 
  require_once "../../includes/config.php";

  $token = $_GET['token'];

  if (isset($token)) {
    confirmEmail($token);
    header('Location: /templates/thanks/email.php');
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <title>Ви підтвердили розсилку! - Миколаївський заклад загальної середньої освіти №34</title>
  <link rel="stylesheet" href="../../css/reset.min.css">
  <link rel="stylesheet" href="../../css/alert.min.css">
  <?php
    require_once "../../templates/head.php";
  ?>
</head>
<body>
  <div class="message">
    <p class="message__text message__text_small">Дякуємо за підтвердження email-розсилки</p>
  </div>
  <div class="home">
    <a class="home__link" href="../../index.php">Повернутись на головну сторінку</a>
  </div>
</body>
</html>