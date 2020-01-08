<?php 
  require_once "../../includes/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Міні-тренінг "Емоційний інтелект" - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <meta name="keywords" content="мета-теги, шаблон, html, css">
  <meta name="robots" content="index,follow,noodp">
  <meta name="googlebot" content="index,follow">
  <meta name="google" content="nositelinkssearchbox">
  <link rel="stylesheet" href="../../css/reset.min.css">
  <link rel="stylesheet" href="../../css/main.min.css">
  <link rel="stylesheet" href="../../css/zno.min.css">
  
  <meta name="google" content="notranslate"><!-- Подтверждает авторство страницы в Google Search Console -->
 
  <!-- не меньше 600х315, не более 8Мб -->
  <meta content="http://localhost.my/img/og_cover.jpg">
  <meta content="описание не длиннее 155 символов">
  <meta content="Facebook ID">

  <link rel="shortcut icon" href="../../img/icons/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../../img/icons/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="../../img/icons/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="../../img/icons/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../img/icons/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="../../img/icons/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="../../img/icons/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="../../img/icons/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="../../img/icons/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="../../img/icons/apple-touch-icon-180x180.png" />
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="../../img/icons/mstile-144x144.png">
  <meta name="theme-color" content="#fd333b">
  <meta name="msapplication-navbutton-color" content="#fff">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#fd333b">
</head>
<body>
  <header>
    <div class="wrap">
      <nav class="header">
        <div class="header-logo">
          <a href="../../index.html"><img src="../../img/logo.png" alt=""></a>
        </div>
        <ul class="header-list">
          <li class="header-list__item"><a href="../../about.html">Про нас</a></li>
          <li class="header-list__item"><a href="index.html">Новини</a></li>
          <li class="header-list__item header-list-dropdown">
            <a>Інформація</a>
            <ul class="header-list-dropdown-list">
              <li class="header-list-dropdown-list__item"><a href="../information/reports/index.html">Звіти</a></li>
              <li class="header-list-dropdown-list__item header-list__item_active"><a href="../information/zno/index.html">ЗНО</a></li>
            </ul>
          </li>
          <li class="header-list__item"><a href="../documents.html">Документи</a></li>
          <li class="header-list__item"><a href="../gallery.html">Галерея</a></li>
        </ul>
        <span class="header__toggle">☰</span>
      </nav>
    </div>
    <ul class="header-list_mobile">
      <li class="header-list__item"><a href="../about.html">Про нас</a></li>
      <li class="header-list__item"><a href="index.html">Новини</a></li>
      <li class="header-list__item header-list-dropdown">
        <a>Інформація</a>
        <ul class="header-list-dropdown-list">
          <li class="header-list-dropdown-list__item"><a href="../information/reports/index.html">Звіти</a></li>
          <li class="header-list-dropdown-list__item"><a href="../information/zno/index.html">ЗНО</a></li>
        </ul>
      </li>
      <li class="header-list__item"><a href="../documents.html">Документи</a></li>
      <li class="header-list__item"><a href="../gallery.html">Галерея</a></li>
    </ul>
  </header>
  <div class="page">
    <div class="wrap">  
      <?php
        $zno = mysqli_query($connection, "SELECT * FROM `zno` WHERE `id` = " . (int) $_GET['id']);

        if (mysqli_num_rows($zno) <= 0) {
          ?>
            <!-- html ошибки -->
          <?php
        }

        $this_zno = mysqli_fetch_assoc($zno);
      ?>
      <div class="zno">
        <div class="zno-back"><a href="index.php"><img src="../../img/right-arrow.svg" alt=""></a></div>
        <h2 class="zno__title">
          <?=$this_zno['caption'] ?>
          <span><?=$this_zno['date'] ?></span>
        </h2>
        <?php if (!$this_zno['img'] == null)
        { ?>
          <div class="zno-img wow fadeInUp">
            <img src="../img/<?=$this_zno['img'] ?>" alt="">
          </div>
        <?php } ?>
        <div class="zno-text">
          <p class="zno-text__excerpt"><?=$this_zno['excerpt'] ?></p>
        </div>
      </div>
      <div class="page">
        <div class="share">
          <h3 class="share__title">Поширити</h3>
          <ul class="share-list">
            <li><a href="#"><img src="" alt="" title="Telegram"></a></li>
            <li><a href="#"><img src="" alt="" title="VK"></a></li>
          </ul>
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
    <div class="wrap">
      <div class="footer-about">
        <a href="" class="footer-about__logo"><img src="../../img/logo-gray.png" alt=""></a>
        <p class="footer-about__copyright">© 2019 "Миколаївський заклад загальної середньої освіти №34". Всі права захищені</p>
      </div>
      <div class="footer-links">
        <h2 class="footer__caption">Корисні посилання</h2>
        <ul class="footer-links-list">
          <li class="footer-links-list__item"><a href="../about.html">Про нас</a></li>
          <li class="footer-links-list__item"><a href="index.html">Новини</a></li>
          <li class="footer-links-list__item"><a href="#">Інформація</a></li>
          <li class="footer-links-list__item"><a href="../documents.html">Документи</a></li>
          <li class="footer-links-list__item"><a href="../gallery.html">Галерея</a></li>
        </ul>
      </div>
      <div class="footer-contacts">
        <h2 class="footer__caption">Контакти</h2>
        <ul class="footer-contacts-list">
          <li class="footer-contacts-list__item"><a href=""></a>(0512) 47-89-25</li>
          <li class="footer-contacts-list__item"><a href=""></a>54017  м. Миколаїв, вул. Лягіна, 28</li>
          <li class="footer-contacts-list__item"><a href=""></a>adamchukFront@gmail.com</li>
        </ul>
        <ul class="footer-contacts-social">
          <li class="footer-contacts-social__item"><a href=""><i class="fab fa-facebook"></i></a></li> 
          <li class="footer-contacts-social__item"><a href=""><i class="fab fa-telegram"></i></a></li>
          <li class="footer-contacts-social__item"><a href=""><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../slick/slick.min.js"></script>
  <script src="../js/main.min.js"></script>
  <script id="dsq-count-scr" src="//school34-mk.disqus.com/count.js" async></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>