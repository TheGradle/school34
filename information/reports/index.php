<?php 
  require_once "../../includes/config.php";
  require_once "../../includes/pagination.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Звіти - Інформація - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="../../css/reset.min.css">
  <link rel="stylesheet" href="../../css/main.min.css">
  <link rel="stylesheet" href="../../css/list.min.css">
  <link rel="stylesheet" href="../../css/animate.min.css">
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
      <h2 class="page__title">Звіти</h2>
      <?php
        $result = mysqli_query($db, "SELECT * FROM `reports` ORDER BY `reports`.`id` DESC LIMIT $start, $count" );
        $pagination = mysqli_fetch_array($result);
      ?>
      <div class="list">
        <?php do { ?>
          <div class="list-item wow fadeIn">
            <h3 class="list-item__caption"><a href="<?=$pagination['link'] ?>" target="_blank"><?=$pagination['caption'] ?></a></h3>
            <p class="list-item__subtitle"><?=$pagination['subtitle'] ?></p>
            <p class="list-item__date"><?=$pagination['date'] ?></p>
          </div>
        <?php } while ($pagination = mysqli_fetch_array($result)); ?>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php
      require_once "../../templates/footer.php";
    ?>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../../js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="../../slick/slick.min.js"></script>
  <script src="../../js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>