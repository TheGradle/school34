<?php 
  require_once "../includes/config.php";
  
  $target = "news"; // pagination for news
  require_once "../includes/pagination.php";

  $news = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT $start, $count");

  /* SEARCH */

  $search_check = false;
  $search = $_GET['search'];

  function display($search_check) {
    if ($search_check && $reports->num_rows == 0) {
      echo "style=\"opacity: 0;\"";
    } 
  }

  if (isset($search) && !empty($search) && !ctype_space($search)){
    $search_check = true;
    
    $search = substr($search, 0, 64);
    $search = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $search);

    $news = mysqli_query($connection, "SELECT * FROM `news` WHERE `excerpt` LIKE '%$search%' OR `caption` LIKE '%$search%' OR `subtitle` LIKE '%$search%'");
  }

  /* This is function to clear place of image */

  function imgClear($search_check, $news){
    if ($search_check && $news->num_rows == 0) {
      echo "style='width: 0; height: 0;'";
    }
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Новини - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/news.min.css">
  <link rel="stylesheet" href="/css/sidebar.min.css">
  <link rel="stylesheet" href="/css/pagination.min.css">
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
        <?php
          if ($search_check) {
            echo "Результати пошуку:<p class='subtitle'>Знайдено новин зі словом $search: <span>$news->num_rows</span></p>";
            $article = false;
          } else {
            echo "Новини ";
            echo "<span class='title__emoji'><img src='/img/icons/emoji/newspaper.png' alt=''></span>";
          }
        ?>
      </h2>
      <div class="news">
        <div class="news__body">
          <div class="news__left">
            <div class="news-list wow fadeIn animation" data-wow-delay=".7s">
            <?php 
              $article = mysqli_fetch_array($news);
              do { ?>
                <div class="news-list-item wow fadeIn animation">
                  <div class="news-list-item-img" <?=imgClear($search_check, $news)?>>
                    <a href="news.php?id=<?=$article['id']?>"><img src="/img/pages/news/<?=$article['caption-img']?>" alt=""></a>
                  </div>
                  <div class="news__inner">
                    <div class="news-list-item-text">
                      <h3 class="news-list-item-text__caption"><a href="news.php?id=<?=$article['id']?>"><?=$article['caption']?></a></h3>
                      <p class="news-list-item-text__excerpt"><?=$article['subtitle']?></p>
                      <p class="news-list-item-text__date"><?=friendlyDate($article['date'])?></p>
                    </div>
                  </div>
                </div>
            <?php } while ($article = mysqli_fetch_array($news)); ?>
            </div>
          </div>
          <div class="news__right">
            <div class="sidebar wow fadeIn animation" data-wow-duration="2s">
              <div class="sidebar__body">
                <div class="sidebar__header">
                  <div class="sidebar-search">
                    <form>
                      <div class="sidebar-search-icon">
                        <img class="sidebar-search-icon__img" src="/img/icons/search.svg" alt="">
                      </div>
                      <input type="text" name="search" class="sidebar-search__input" placeholder="Пошук новин" value="<?=$search?>">
                    </form>
                  </div>
                </div>
                <div class="sidebar__section">
                  <div class="sidebar-subscribe">
                    <h3 class="sidebar-subscribe__title">Свіжі новини на Ваш email</h3>
                    <form method="POST">
                      <input type="email" name="userEmail" placeholder="Ваш email" class="sidebar-subscribe__input" id="email">
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
  <div class="sidebar-subscribe sidebar-subscribe_mobile wow fadeInUp animation">
    <div class="sidebar__section">
      <h3 class="sidebar-subscribe__title">Свіжі новини на Ваш email</h3>
      <form method="POST">
        <input type="email" name="userEmail" placeholder="Ваш email" class="sidebar-subscribe__input" id="email_mobile">
        <p id="valid" class="sidebar-subscribe__error"></p>
        <a onclick="addEmail()" class="sidebar-subscribe__button" name="submit">Підписатись</a>
      </form>
      <p class="sidebar-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
    </div>
  </div>
  <?php
    require_once "../templates/footer.php";
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