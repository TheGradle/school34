<?php 
  require_once "../../includes/config.php";

  $zno = mysqli_query($connection, "SELECT * FROM `zno` WHERE `id` = " . (int) $_GET['id']);

  if (mysqli_num_rows($zno) <= 0) {
    require_once "../templates/errors/404.php";
    exit();
  }

  $article = mysqli_fetch_assoc($zno);
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title><?=$article['caption']?> - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="<?=$article['subtitle']?>">
  <meta property="og:title" content="<?=$article['caption']?>">
  <meta property="og:url" content="<?=$current_url?>">
  <meta property="og:image" content="/img/pages/zno/<?=$article['caption-img']?>">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/article.min.css">
  <link rel="stylesheet" href="/css/<?=$_SESSION["theme"]?>" id="theme-link">
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
      <div class="article">
        <div class="article__body">
          <div class="article__header">
            <div class="article-back wow fadeIn animation">
              <a href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.49 31.49"><path d="M21.205 5.007a1.112 1.112 0 00-1.587 0 1.12 1.12 0 000 1.571l8.047 8.047H1.111A1.106 1.106 0 000 15.737c0 .619.492 1.127 1.111 1.127h26.554l-8.047 8.032c-.429.444-.429 1.159 0 1.587a1.112 1.112 0 001.587 0l9.952-9.952a1.093 1.093 0 000-1.571l-9.952-9.953z"></svg>
              </a>
            </div>
            <h2 class="article__title wow fadeIn animation">
              <?=$article['caption']?>
            </h2>
            <p class="article__date wow fadeIn animation">
              <?=friendlyDate($article['date'])?>
            </p>
            <?php if (!$article['caption-img'] == null) { ?>
              <div class="article-img wow fadeInUp animation">
                <img src="/img/pages/zno/<?=$article['caption-img'] ?>" alt="">
              </div>
            <?php } ?>
          </div>
          <div class="article__content wow fadeIn animation">
            <p class="article__text"><?=$article['excerpt']?></p>
            <?php
              require_once "../../templates/share.php";
            ?>
          </div>
          <div class="article__comments">
            <div id="disqus_thread"></div>
            <script src="/js/disqus.min.js"></script>
            <noscript>Будь ласка увімкніть JavaScript щоб побачити <a href="https://disqus.com/?ref_noscript">коментарі.</a></noscript>
          </div>
        </div>
      </div>
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
  <script src="/js/main.min.js"></script>
  <script id="dsq-count-scr" src="//school34-mk.disqus.com/count.js" async></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>