<?php 
  require_once "../includes/config.php";

  ini_set("display_errors", 1);
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  
  $target = "news"; // pagination for news
  require_once "../includes/pagination.php";

  $news = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT $start, $count");

  /* EMAIL */

  if(isset($_POST['submit'])) {
    $errors = [];

    $address = $_POST['address'];

    if(trim($address) == '') {
      $errors[] = '#1';
    }
    if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "#2";
    }
  }

  /* SEARCH */

  $search_check = false;
  $search = $_GET['search'];

  if (isset($search) && !empty($search) && !ctype_space($search)){
    $search_check = true;
    
    $search = substr($search, 0, 64);
    $search = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $search);

    $news = mysqli_query($connection, "SELECT * FROM `news` WHERE `excerpt` LIKE `%$search%` OR `caption` LIKE `%$search%` OR `subtitle` LIKE `%$search%`");
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Новини - Миколаївський заклад загальної середньої освіти № 34</title>
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
      <h2 class="page__title wow fadeInUp animation">
        <?php
          if ($search_check == true) {
            echo "Результати пошуку:<span class='page__title_subtitle'>Знайдено новин зі словом $search: <span>$news->num_rows</span></span>";
          } else {
            echo "Новини";
          }
        ?>
      </h2>
      <div class="news">
        <div class="news-list wow fadeIn animation" data-wow-delay=".7s">
          <?php 
            $article = mysqli_fetch_array($news);
            do { ?>
            <div class="wow news-list-item fadeIn animation">
              <div class="news-list-item-img">
                <a href="news.php?id=<?=$article['id'] ?>"><img src="../img/news/<?=$article['caption-img'] ?>" alt=""></a>
              </div>
              <div class="news-list-item-text">
                <h3 class="news-list-item-text__caption"><a href="news.php?id=<?=$article['id'] ?>"><?=$article['caption'] ?></a></h3>
                <p class="news-list-item-text__excerpt"><?=$article['subtitle'] ?></p>
                <p class="news-list-item-text__date"><?=friendlyDate($article['date']) ?></p>
              </div>
            </div>
          <?php } while ($article = mysqli_fetch_array($news)); ?>
        </div>
        <div class="news-help wow fadeInRight animation">
          <div class="news-help-search">
            <form>
              <span class="news-help-search__icon"><img src="../img/search.svg" alt=""></span><input type="text" name="search" class="news-help-search__input" placeholder="Пошук новин" value="<?=$search ?>">
            </form>
          </div>
          <div class="news-help-subscribe">
            <h3 class="news-help-subscribe__title">Свіжі новини на Ваш email</h3>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="email" name="address" placeholder="Ваш email" class="news-help-subscribe__input" value="<?=$address?>">
              <button type="sumbit" class="news-help-subscribe__button" name="submit">Підписатись</button>
            </form>
            <p class="news-help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
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
  <div class="news-help-subscribe_mobile news-help-subscribe wow fadeInUp animation">
    <h3 class="news-help-subscribe__title">Свіжі новини на Ваш email</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="email" name="address" placeholder="Ваш email" class="news-help-subscribe__input" value="<?=$address?>">
      <button type="sumbit" class="news-help-subscribe__button" name="submit">Підписатись</button>
    </form>
    <p class="news-help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
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
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>
<?php

if(empty($errors)) {
  addEmail($address);
} else {
  echo "<script>$(\".news-help-subscribe__input\").addClass(\"news-help-subscribe__input_error\")</script>";
}