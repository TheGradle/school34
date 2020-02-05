<?php 
  require_once "../includes/config.php";

  $news = mysqli_query($connection, "SELECT * FROM `news` WHERE `id` = " . (int) $_GET['id']);

  if (mysqli_num_rows($news) <= 0) {
    ?>
      <!-- html ошибки -->
    <?php
  }

  $article = mysqli_fetch_assoc($news);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$article['caption'] ?> - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="<?=$article['subtitle'] ?>">
  <meta property="og:title" content="<?=$article['caption'] ?>">
  <meta property="og:url" content="<?=$current_url ?>">
  <meta property="og:image" content="../img/news/<?=$article['img'] ?>">
  <link rel="stylesheet" href="../css/reset.min.css">
  <link rel="stylesheet" href="../css/main.min.css">
  <link rel="stylesheet" href="../css/current-news.min.css">
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
      <div class="news">
        <div class="news-back">
          <a href="index.php"><img src="../img/right-arrow.svg" alt=""></a>
          <p><a href="index.php">Назад</a></p>
        </div>
        <h2 class="news__title wow fadeIn animation">
          <?=$article['caption'] ?>
          <span><?=$article['date'] ?></span>
        </h2>
        <div class="news-img wow fadeInUp animation" style="background: #cecece;">
          <img src="../img/news/<?=$article['caption-img'] ?>" alt="">
        </div>
        <div class="news-text wow fadeIn animation">
          <p class="news-text__excerpt"><?=$article['excerpt'] ?></p>
          <div class="share">
            <h3 class="share__title">Поширити:</h3>
            <ul class="share-list">
              <li class="share-list-item"><a href="tg://msg_url?url=<?=$current_url ?>"><i class="fab fa-telegram-plane"></i></a></li>
              <li class="share-list-item"><a href="https://vk.com/share.php?url=<?=$current_url ?>" target="_blank"><i class="fab fa-vk"></i></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="page"><div id="disqus_thread"></div></div>
      <script>

      var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
      };

      (function() { // DON'T EDIT BELOW THIS LINE
      var d = document, s = d.createElement('script');
      s.src = 'https://school34-mk.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
      })();
      </script>
      <noscript>Будь ласка увімкніть JavaScript щоб побачити <a href="https://disqus.com/?ref_noscript">коментарі.</a></noscript>
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
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../js/main.min.js"></script>
  <script id="dsq-count-scr" src="//school34-mk.disqus.com/count.js" async></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>