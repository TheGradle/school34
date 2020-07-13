<?php 
  require_once "../../includes/config.php";

  $row = mysqli_query($connection, "SELECT * FROM `documents` WHERE 1");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Документи - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/documents.min.css">
  <?php
    require_once "../../templates/head.php";
  ?>
</head>
<body>
  <?php
    require_once "../../templates/header.php";
  ?>
  <div class="page">
    <div class="wrap">
      <h2 class="title wow fadeInUp animation">
        Документи
        <span class="title__emoji"><img src="/img/icons/emoji/memo.png" alt=""></span>
      </h2>
      <div class="documents">
        <div class="documents__body">
          <ul class="documents-list wow fadeIn animation" data-wow-delay=".7s">
            <?php while ($data = mysqli_fetch_assoc($row)) { 
                $data['text'] = "<li class=\"documents-list__item\">" . $data['text'] . "</li>";
                echo $data['text'];
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php
    require_once "../../templates/footer.php";
  ?>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/main.min.js"></script>
  <script src="/js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>