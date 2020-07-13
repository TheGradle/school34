<?php 
  require_once "../../includes/config.php";

  ini_set("display_errors", 1);
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  
  $target = "zno"; // pagination for zno
  require_once "../../includes/pagination.php";

  $zno = mysqli_query($connection, "SELECT * FROM `zno` ORDER BY `zno`.`id` DESC LIMIT $start, $count");

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

    $zno = mysqli_query($connection, "SELECT * FROM `zno` WHERE `excerpt` LIKE '%$search%' OR `caption` LIKE '%$search%' OR `subtitle` LIKE '%$search%'");
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>ЗНО - Інформація - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="../../css/main.min.css">
  <link rel="stylesheet" href="../../css/articles.min.css">
  <link rel="stylesheet" href="../../css/sidebar.min.css">
  <link rel="stylesheet" href="../../css/pagination.min.css">
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
        <?php
          if ($search_check == true) {
            echo "Результати пошуку:<p class='subtitle'>Знайдено статей ЗНО зі словом $search: <span>$zno->num_rows</span></p>";
          } else {
            echo "ЗНО ";
            echo "<span class='title__emoji'><img src='/img/icons/emoji/pen.png' alt=''></span>";
          }
        ?>
      </h2>
      <div class="articles">
        <div class="articles__body">
          <div class="articles__left">
            <div class="articles-list wow fadeIn" data-wow-delay=".7s">
              <?php 
                $article = mysqli_fetch_array($zno);
                if ($article == null) {
                  echo "<span class='p__emoji'><img src='/img/icons/emoji/disappointed.png' alt=''></span>";
                  echo " Нічого не знайдено";
                }
                do { ?>
                <div class="articles-list-item wow fadeIn animation">
                  <h3 class="articles-list-item__caption"><a href="zno.php?id=<?=$article['id']?>"><?=$article['caption']?></a></h3>
                  <p class="articles-list-item__subtitle"><?=$article['subtitle']?></p>
                  <p class="articles-list-item__date"><?=friendlyDate($article['date'])?></p>
                </div>
              <?php } while ($article = mysqli_fetch_array($zno)); ?>
            </div>
          </div>
          <div class="articles__right">
            <div class="sidebar wow fadeIn animation" data-wow-duration="2s">
              <div class="sidebar__body">
                <div class="sidebar__header">
                  <div class="sidebar-search">
                    <form>
                      <div class="sidebar-search-icon">
                        <img class="sidebar-search-icon__img" src="/img/icons/search.svg" alt="">
                      </div>
                      <input type="text" name="search" class="sidebar-search__input" placeholder="Пошук статей" value="<?=$search?>">
                    </form>
                  </div>
                </div>
                <div class="sidebar__section">
                  <div class="sidebar-subscribe">
                    <h3 class="sidebar-subscribe__title">Свіжі новини на Ваш email</h3>
                    <form method="POST">
                      <input type="email" name="userEmail" placeholder="Ваш email" class="sidebar-subscribe__input" value="<?=$userEmail?>" id="email">
                      <p id="valid" class="sidebar-subscribe__error"></p>
                      <a onclick="addEmail()" class="sidebar-subscribe__button" name="submit">Підписатись</a>
                    </form>
                    <p class="sidebar-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
                  </div>
                </div>
              </div>
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
  <div class="sidebar-subscribe wow fadeInUp animation">
    <div class="sidebar__section sidebar__section_mobile">
      <h3 class="sidebar-subscribe__title">Свіжі новини на Ваш email</h3>
      <form method="POST">
        <input type="email" name="userEmail" placeholder="Ваш email" class="sidebar-subscribe__input" value="<?=$userEmail?>" id="email">
        <p id="valid" class="sidebar-subscribe__error"></p>
        <a onclick="addEmail()" class="sidebar-subscribe__button" name="submit">Підписатись</a>
      </form>
      <p class="sidebar-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
    </div>
  </div>
  <?php
    require_once "../../templates/footer.php";
  ?>
  <script src="/js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/json.min.js"></script>
  <script src="/js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>