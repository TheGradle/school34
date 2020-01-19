<?php 
  require_once "../includes/config.php";
  
  $target = "news";
  require_once "../includes/pagination.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Новини - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="../css/reset.min.css">
  <link rel="stylesheet" href="../css/main.min.css">
  <link rel="stylesheet" href="../css/news.min.css">
  <link rel="stylesheet" href="../css/animate.min.css">
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
      <h2 class="page__title">Новини</h2>
      <div class="news">
        <div class="news-list">
          <?php 
            $result = mysqli_query($db, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT $start, $count");
            $pagination = mysqli_fetch_array($result);
            do { ?>
            <div class="wow news-list-item fadeIn">
              <div class="news-list-item-img">
                <a href="news.php?id=<?=$pagination['id'] ?>"><img src="../img/news/<?=$pagination['img'] ?>" alt=""></a>
              </div>
              <div class="news-list-item-text">
                <h3 class="news-list-item-text__caption"><a href="news.php?id=<?=$pagination['id'] ?>"><?=$pagination['caption'] ?></a></h3>
                <p class="news-list-item-text__excerpt"><?=$pagination['subtitle'] ?></p>
                <p class="news-list-item-text__date"><?=$pagination['date'] ?></p>
              </div>
            </div>
          <?php } while ($pagination = mysqli_fetch_array($result)); ?>
        </div>
        <div class="news-help">
          <div class="news-help-search">
            <form>
              <span class="news-help-search__icon"><img src="../img/search.svg" alt=""></span><input type="text" name="search" class="news-help-search__input" placeholder="Пошук">
            </form>
          </div>
          <div class="news-help-subscribe">
            <h3 class="news-help-subscribe__title">Свіжі новини на Ваш email</h3>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="email" name="email" placeholder="Ваш email" class="news-help-subscribe__input">
              <button type="sumbit" class="news-help-subscribe__button">Підписатись</button>
            </form>
            <p class="news-help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
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
        <div class="news-help-subscribe_mobile news-help-subscribe">
          <h3 class="news-help-subscribe__title">Свіжі новини на Ваш email</h3>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="email" name="email" placeholder="Ваш email" class="news-help-subscribe__input" placeholder="Пошук">
            <button type="sumbit" class="news-help-subscribe__button">Підписатись</button>
          </form>
          <p class="news-help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
        </div>
      </div>
      <div class="pagination">
        <?php 
          for ($i = 1; $i <= $str_pag; $i++){
            /*if ($str_pag >= 5) {
              if ($i >= 3 && $i < $str_pag) {
                echo "<div class='pagination__item'>...</div>";
                continue;
              }
              echo "<div class='pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
            } else {
              echo "<div class='pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
            }*/
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
  </div>
  <div class="footer">
    <?php
      require_once "../templates/footer.php";
    ?>
  </div>
  <script src="../js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>