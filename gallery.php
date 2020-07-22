<?php 
  require_once "includes/config.php";

  $gallery = mysqli_query($connection, "SELECT * FROM `photos` ORDER BY `photos`.`date` DESC");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Галерея - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="css/gallery.min.css">
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
        Галерея
        <span class='title__emoji'><img src='img/icons/emoji/picture.png' alt=''></span>
      </h2>
      <div class="gallery">
        <?php 
          while ($block = mysqli_fetch_assoc($gallery)) { 
          $dir = "img/pages/gallery/" . $block['date'] . "/";
          $files = scandir($dir); ?>
          <div class="gallery-block wow fadeInUp animation">
            <h3 class="gallery-block__date"><?=friendlyDate($block['date'], 'date')?></h3>
            <div class="gallery-block-img">
              <?php for ($i = 2; $i <= (count($files) - 1); $i++) { ?>
                <div class="gallery-block-img__item">
                  <img src="<?=$dir . $files[$i]?>" alt="">
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="block-preview">
    <div class="block-preview-photo">
      <img src="" alt="" class="block-preview-photo__img">
    </div>
  </div>
  <?php
    require_once "templates/footer.php";
  ?>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/main.min.js"></script>
  <script src="js/gallery.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>