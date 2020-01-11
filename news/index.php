<?php 
  require_once "../includes/config.php";
  require_once "../includes/pagination.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Новини - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <meta name="keywords" content="мета-теги, шаблон, html, css">
  <meta name="robots" content="index,follow,noodp">
  <meta name="googlebot" content="index,follow">
  <meta name="google" content="nositelinkssearchbox">
  <link rel="stylesheet" href="../css/reset.min.css">
  <link rel="stylesheet" href="../css/main.min.css">
  <link rel="stylesheet" href="../css/news.min.css">
  <link rel="stylesheet" href="../css/animate.min.css">
  
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
          <a href="../index.php"><img src="../img/logo.png" alt=""></a>
        </div>
        <ul class="header-list">
          <li class="header-list__item"><a href="../about.html">Про нас</a></li>
          <li class="header-list__item header-list__item_active"><a href="index.html">Новини</a></li>
          <li class="header-list__item header-list-dropdown">
            <a>Інформація</a>
            <ul class="header-list-dropdown-list">
              <li class="header-list-dropdown-list__item"><a href="../information/reports/index.php">Звіти</a></li>
              <li class="header-list-dropdown-list__item"><a href="../information/zno/index.php">ЗНО</a></li>
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
          <li class="header-list-dropdown-list__item"><a href="../information/reports/index.php">Звіти</a></li>
          <li class="header-list-dropdown-list__item"><a href="../information/zno/index.php">ЗНО</a></li>
        </ul>
      </li>
      <li class="header-list__item"><a href="../documents.html">Документи</a></li>
      <li class="header-list__item"><a href="../gallery.html">Галерея</a></li>
    </ul>
  </header>
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
                <img src="../img/news/<?=$pagination['img'] ?>" alt="">
              </div>
              <div class="news-list-item-text">
                <h3 class="news-list-item-text__caption"><a href="news.php?id=<?=$pagination['id'] ?>"><?=$pagination['caption'] ?></a></h3>
                <p class="news-list-item-text__excerpt"><?=$pagination['excerpt'] ?></p>
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
            <form>
              <input type="email" name="email" placeholder="Ваш email" class="news-help-subscribe__input">
              <button type="sumbit" class="news-help-subscribe__button">Підписатись</button>
            </form>
            <p class="news-help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
          </div>
        </div>
        <div class="news-pagination news-pagination_mobile">
          <?php 
            for ($i = 1; $i <= $str_pag; $i++){
              echo "<div class='news-pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
            }
          ?>
        </div>
        <div class="news-help-subscribe_mobile news-help-subscribe">
          <h3 class="news-help-subscribe__title">Свіжі новини на Ваш email</h3>
          <form>
            <input type="email" name="email" placeholder="Ваш email" class="news-help-subscribe__input" placeholder="Пошук">
            <button type="sumbit" class="news-help-subscribe__button">Підписатись</button>
          </form>
          <p class="news-help-subscribe__notice">Натискаючи на кнопку ви погоджуєтесь з обробкою Ваших персональних даних</p>
        </div>
      </div>
      <div class="news-pagination">
        <?php 
          for ($i = 1; $i <= $str_pag; $i++){
            /*if ($str_pag >= 5) {
              if ($i >= 3 && $i < $str_pag) {
                echo "<div class='news-pagination__item'>...</div>";
                continue;
              }
              echo "<div class='news-pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
            } else {
              echo "<div class='news-pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
            }*/
            echo "<div class='news-pagination__item'><a href=index.php?page=" . $i . ">" . $i . "</a></div>";
          }
        ?>
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
          <li class="footer-links-list__item"><a href="../index.php">Головна</a></li>
          <li class="footer-links-list__item"><a href="../about.html">Про нас</a></li>
          <li class="footer-links-list__item"><a href="index.php">Новини</a></li>
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
  <script src="../js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="../slick/slick.min.js"></script>
  <script src="../js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>