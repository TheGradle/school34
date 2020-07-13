<?php 
  require_once "../includes/config.php";

  // NEWS DB
  $news_other = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT 2");

  $news = mysqli_query($connection, "SELECT * FROM `news` WHERE `id` = " . (int) $_GET['id']);

  if (mysqli_num_rows($news) <= 0) {
    require_once "../templates/errors/404.php";
    exit();
  }

  $article = mysqli_fetch_assoc($news);
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title><?=$article['caption']?> - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="<?=$article['subtitle']?>">
  <meta property="og:title" content="<?=$article['caption']?>">
  <meta property="og:url" content="<?=$current_url?>">
  <meta property="og:image" content="../img/news/<?=$article['img']?>">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/article.min.css">
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
      <div class="article">
        <div class="article__body">
          <div class="article__header">
            <div class="article-back wow fadeIn animation">
              <a href="index.php"><img class="article-back__img" src="/img/icons/arrow.svg" alt=""></a>
            </div>
            <h2 class="article__title wow fadeIn animation">
              <?=$article['caption']?>
            </h2>
            <p class="article__date wow fadeIn animation">
              <?=friendlyDate($article['date'])?>
            </p>
            <div class="article-img wow fadeInUp animation" style="background: #cecece;">
              <img src="/img/pages/news/<?=$article['caption-img']?>" alt="">
            </div>
          </div>
          <div class="article__content wow fadeIn animation">
            <p class="article__text"><?=$article['excerpt']?></p>
            <?php
              require_once "../templates/share.php";
            ?>
          </div>
          <div class="article__comments">
            <div id="disqus_thread"></div>
            <script src="/js/disqus.min.js"></script>
            <noscript>Будь ласка увімкніть JavaScript щоб побачити <a href="https://disqus.com/?ref_noscript">коментарі.</a></noscript>
          </div>
          <div class="article__other">
            <p class='subtitle'>Інші новини</p>
            <div class="news">
              <?php while ($article = mysqli_fetch_assoc($news_other)) { ?>
                <div class="news-item wow fadeInUp animation">
                  <div class="news-item-img">
                    <a href="/news/news.php?id=<?=$article['id']?>"><img class="news-item-img__item" src="/img/pages/news/<?=$article['caption-img']?>" alt=""></a>
                  </div>
                  <div class="news-item-text">
                    <h3 class="news-item-text__title"><a href="/news/news.php?id=<?=$article['id']?>"><?=$article['caption']?></a></h3>
                    <p class="news-item-text__subtitle"><?=$article['subtitle']?></p>
                    <p class="news-item-text__date"><?=friendlyDate($article['date'])?></p>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
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
  <script src="/js/main.min.js"></script>
  <script id="dsq-count-scr" src="//school34-mk.disqus.com/count.js" async></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>