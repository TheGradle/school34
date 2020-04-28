<?php 
  require_once "../../includes/config.php";

  $target = "reports"; // pagination for reports
  require_once "../../includes/pagination.php";

  $reports = mysqli_query($connection, "SELECT * FROM `reports` ORDER BY `reports`.`id` DESC LIMIT $start, $count" );

  /* SEARCH */

  $search_check = false;
  $search = $_GET['search'];

  /*function display($search_check) {
    if ($search_check && $reports->num_rows == 0) {
      echo "style=\"opacity: 0;\"";
    } 
  }*/

  if (isset($search) && !empty($search) && !ctype_space($search)){
    $search_check = true;
    
    $search = substr($search, 0, 64);
    $search = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $search);

    $reports = mysqli_query($connection, "SELECT * FROM `reports` WHERE `caption` LIKE '%$search%' OR `subtitle` LIKE '%$search%'");
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Звіти - Інформація - Миколаївський заклад загальної середньої освіти № 34</title>
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
      <h2 class="page__title wow fadeInUp animation">
        <?php
          if ($search_check == true) {
            echo "Результати пошуку:<span class='page__title_subtitle'>Знайдено звітів зі словом $search: <span>$reports->num_rows</span></span>";
          } else {
            echo "Звіти";
          }
        ?>
      </h2>
      <div class="list-box">
        <div class="list wow fadeIn" data-wow-delay=".7s">
          <?php 
            $article = mysqli_fetch_array($reports);
            do { ?>
            <div class="list-item wow fadeIn animation">
              <h3 class="list-item__caption"><a href="<?=$article['link'] ?>" target="_blank"><?=$article['caption'] ?></a></h3>
              <p class="list-item__subtitle"><?=$article['subtitle'] ?></p>
              <p class="list-item__date"><?=friendlyDate($article['date']) ?></p>
            </div>
          <?php } while ($article = mysqli_fetch_array($reports)); ?>
        </div>
        <div class="help wow fadeInRight animation">
          <div class="help-search">
            <form>
              <span class="help-search__icon"><img src="../../img/search.svg" alt=""></span><input type="text" name="search" class="help-search__input" placeholder="Пошук" value="<?=$search ?>">
            </form>
          </div>
          <div class="help-subscribe">
            <h3 class="help-subscribe__title">Свіжі новини на Ваш email</h3>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="email" name="email" placeholder="Ваш email" class="help-subscribe__input">
              <button type="sumbit" class="help-subscribe__button">Підписатись</button>
            </form>
            <p class="help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
          </div>
        </div>
        <div class="pagination pagination_mobile">
          <?php 
            if ($search_check == false) {
              pagination_render($str_pag, $page);
            }
          ?>
        </div>
      </div>
      <div class="pagination">
        <?php 
          if ($search_check == false) {
            pagination_render($str_pag, $page);
          }
        ?>
      </div>
    </div>
  </div>
  <div class="help-subscribe_mobile help-subscribe wow fadeInUp animation">
    <h3 class="help-subscribe__title">Свіжі новини на Ваш email</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="email" name="email" placeholder="Ваш email" class="help-subscribe__input" placeholder="Пошук">
      <button type="sumbit" class="help-subscribe__button">Підписатись</button>
    </form>
    <p class="help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
  </div>
  <div class="footer">
    <?php
      require_once "../../templates/footer.php";
    ?>
  </div>
  <script src="../../js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../../js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>