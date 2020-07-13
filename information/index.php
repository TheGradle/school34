<?php
  require_once "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Інформація - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/information.min.css">
  <?php
    require_once "../templates/head.php";
  ?>
</head>
<body>
  <?php
    require_once "../templates/header.php";
  ?>
  <div class="page">
    <div class="wrap">
      <h2 class="title wow fadeInUp animation">
        Інформація 
        <span class="title__emoji"><img src="/img/icons/emoji/monocle.png" alt=""></span>
        <p class='subtitle'>Все, що Вам потрібно - тут</p>
      </h2>
      <div class="information">
        <div class="information__body">
          <a href="documents/index.php">
            <div class="information-item wow fadeInUp animation">
              <img src="../img/icons/emoji/memo.png" alt="" class="information-item__img">
              <p class="information-item__title">Документи</p>
            </div>
          </a>
          <a href="reports/index.php">
            <div class="information-item wow fadeInUp animation">
              <img src="../img/icons/emoji/list.png" alt="" class="information-item__img">
              <p class="information-item__title">Звіти</p>
            </div>
          </a>
          <a href="zno/index.php">
            <div class="information-item wow fadeInUp animation">
              <img src="../img/icons/emoji/pen.png" alt="" class="information-item__img">
              <p class="information-item__title">ЗНО</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php
    require_once "../templates/footer.php";
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