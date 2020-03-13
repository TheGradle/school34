<?php 
  require_once "../../includes/config.php";

  $target = "reports";
  require_once "../../includes/pagination.php";
?>
<!DOCTYPE html>
<html lang="uk">
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
      <h2 class="page__title wow fadeInUp animation">Звіти</h2>
      <?php
        $result = mysqli_query($db, "SELECT * FROM `reports` ORDER BY `reports`.`id` DESC LIMIT $start, $count" );
        $pagination = mysqli_fetch_array($result);
      ?>
      <div class="list-box">
        <div class="list wow fadeIn" data-wow-delay=".7s">
          <?php do { ?>
            <div class="list-item wow fadeIn animation">
              <h3 class="list-item__caption"><a href="<?=$pagination['link'] ?>" target="_blank"><?=$pagination['caption'] ?></a></h3>
              <p class="list-item__subtitle"><?=$pagination['subtitle'] ?></p>
              <p class="list-item__date"><?=$pagination['date'] ?></p>
            </div>
          <?php } while ($pagination = mysqli_fetch_array($result)); ?>
        </div>
        <div class="help wow fadeInRight animation">
          <div class="help-search">
            <form>
              <span class="help-search__icon"><img src="../../img/search.svg" alt=""></span><input type="text" name="search" class="help-search__input" placeholder="Пошук">
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
            for ($i = 1; $i <= $str_pag; $i++){
              if ($str_pag != 1) {
                if ($page == $i) {
                  echo "<div class='pagination__item pagination__item_active'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
                } else {
                  echo "<div class='pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
                }
              }
            }
          ?>
        </div>
      </div>
      <div class="pagination">
        <?php 
          if ($str_pag >= 6) {
            $prev_page = $page - 1;
            $next_page = $page + 1;

            echo "<div class='pagination__item'><a href=index.php?page=1>1</a></div>";
            if ($page - 1 > 2) {
              echo "<div class='pagination__item'>...</div>";
            }
            if ($prev_page != 0 && $prev_page != 1) {
              echo "<div class='pagination__item'><a href=index.php?page=" . $prev_page . ">" . $prev_page . "</a></div>";
            }
            if ($page != 1 && $page != $str_pag) {
              echo "<div class='pagination__item'><a href=index.php?page=$page>$page</a></div>";
            }
            if ($page != $str_pag && $page != $str_pag - 1) {
              echo "<div class='pagination__item'><a href=index.php?page=" . $next_page . ">" . $next_page . "</a></div>";
            }
            if ($str_pag - $page > 2) {
              echo "<div class='pagination__item'>...</div>";
            }
            echo "<div class='pagination__item'><a href=index.php?page=$str_pag>$str_pag</a></div>";
          } else {
            for ($i = 1; $i <= $str_pag; $i++){
              if ($str_pag != 1) {
                if ($page == $i) {
                  echo "<div class='pagination__item pagination__item_active'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
                } else {
                  echo "<div class='pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
                }
              }
            }
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