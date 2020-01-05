<?php 
  require_once "../includes/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Міні-тренінг "Емоційний інтелект" - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="описание не длиннее 155 символов">
  <meta name="keywords" content="мета-теги, шаблон, html, css">
  <meta name="robots" content="index,follow,noodp">
  <meta name="googlebot" content="index,follow">
  <meta name="google" content="nositelinkssearchbox">
  <link rel="stylesheet" href="../css/reset.min.css">
  <link rel="stylesheet" href="../css/main.min.css">
  <link rel="stylesheet" href="../css/current-news.min.css">
  
  <meta name="google" content="notranslate"><!-- Подтверждает авторство страницы в Google Search Console -->
 
  <!-- не меньше 600х315, не более 8Мб -->
  <meta content="http://localhost.my/img/og_cover.jpg">
  <meta content="описание не длиннее 155 символов">
  <meta content="Facebook ID">

  <link rel="shortcut icon" href="../img/icons/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../img/icons/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="../img/icons/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="../img/icons/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="../img/icons/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="../img/icons/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="../img/icons/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="../img/icons/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="../img/icons/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="../img/icons/apple-touch-icon-180x180.png" />
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="../img/icons/mstile-144x144.png">
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
          <a href="../index.html"><img src="../img/logo.png" alt=""></a>
        </div>
        <ul class="header-list">
          <li class="header-list__item"><a href="../about.html">Про нас</a></li>
          <li class="header-list__item header-list__item_active"><a href="index.html">Новини</a></li>
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
      <? 
        $news = mysqli_query($connection, "SELECT * FROM `news` WHERE `id` = " . (int) $_GET['id']);

        if (mysqli_num_rows($news) <= 0) {
          ?>
            <!-- html ошибки -->
          <?
        }

        $this_news = mysqli_fetch_assoc($news);
      ?>
      <div class="news">
        <h2 class="news__title">
          <?=$this_news['caption'] ?>
          <span><?=$this_news['date'] ?></span>
        </h2>
        <div class="news-img">
          <img src="../img/<?=$this_news['img'] ?>" alt="">
        </div>
        <div class="news-text">
          <p class="news-text__excerpt"><?=$this_news['excerpt'] ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="wrap">
      <div class="footer-about">
        <a href="" class="footer-about__logo"><img src="../img/logo-gray.png" alt=""></a>
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
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>