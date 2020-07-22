<?php 
  require_once "includes/config.php";

  $row = mysqli_query($connection, "SELECT * FROM `about` WHERE 1");
  while ($data = mysqli_fetch_assoc($row)) {
    $text = $data['text'];
    $name = $data['name'];
    $img = $data['img'];
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Про нас - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="/css/<?=$_SESSION["theme"]?>" id="theme-link">
  <?php
    require_once "templates/head.php";
  ?>
</head>
<body>
  <?php
    require_once "templates/header.php";
  ?>
  <div class="page">
    <div class="wrap">
      <h2 class="title wow fadeInUp animation">
        Про нас
        <span class='title__emoji'><img src='img/icons/emoji/hugging.png' alt=''></span>
      </h2>
      <div class="about">
        <div class="about-text wow fadeInUp animation">
          <p class="about-text__name">- <?=$name?>, директор закладу</p>
          <p class="about-text__description"><?=$text?></p>
        </div>
        <div class="about-image wow slideInRight animation">
          <svg width="300" height="451" class="about-image__svg">
            <rect width="300" height="451" x="0" y="0" fill="#fd333b"></rect>
          </svg>
          <img src="img/pages/about/<?=$img?>" alt="" class="about-image__img">
        </div>
        <div class="about-image about-image_mobile wow fadeInUp animation">
          <img src="img/pages/about/<?=$img?>" alt="" class="about-image__img">
        </div>
      </div>
      <div class="contacts">
        <ul class="contacts-list wrap wow fadeInUp animation" style="padding: 0">
          <li class="contacts-list__item"><?=$number1?> (директор, секретар)<br><?=$number2?> (заступники директора з навчально-виховної роботи)<br><?=$number3?> (заступник директора з виховної роботи)</li>
          <li class="contacts-list__item"><?=$address?></li>
          <li class="contacts-list__item"><?=$email?></li>
        </ul>
      </div>
    </div>
  </div>
  <?php
    require_once "templates/footer.php";
  ?>
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>