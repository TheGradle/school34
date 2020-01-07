<?php 
  require_once "includes/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Головна - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="описание не длиннее 155 символов">
  <meta name="keywords" content="мета-теги, шаблон, html, css">
  <meta name="robots" content="index,follow,noodp">
  <meta name="googlebot" content="index,follow">
  <meta name="google" content="nositelinkssearchbox">
  <link rel="stylesheet" href="css/reset.min.css">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="slick/slick.css"/>
  <link rel="stylesheet" href="slick/slick-theme.css"/>
  <link rel="stylesheet" href="css/animate.min.css">
  
  <meta name="google" content="notranslate"><!-- Подтверждает авторство страницы в Google Search Console -->
 
  <!-- не меньше 600х315, не более 8Мб -->
  <meta content="http://localhost.my/img/og_cover.jpg">
  <meta content="описание не длиннее 155 символов">
  <meta content="Facebook ID">

  <link rel="shortcut icon" href="img/icons/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-touch-icon-180x180.png" />
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="img/icons/mstile-144x144.png">
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
          <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <ul class="header-list">
          <li class="header-list__item"><a href="about.html">Про нас</a></li>
          <li class="header-list__item"><a href="news/index.html">Новини</a></li>
          <li class="header-list__item header-list-dropdown">
            <a>Інформація</a>
            <ul class="header-list-dropdown-list">
              <li class="header-list-dropdown-list__item"><a href="information/reports/index.html">Звіти</a></li>
              <li class="header-list-dropdown-list__item"><a href="information/zno/index.html">ЗНО</a></li>
            </ul>
          </li>
          <li class="header-list__item"><a href="documents.html">Документи</a></li>
          <li class="header-list__item"><a href="gallery.html">Галерея</a></li>
        </ul>
        <span class="header__toggle">☰</span>
      </nav>
    </div>
    <ul class="header-list_mobile">
      <li class="header-list__item"><a href="about.html">Про нас</a></li>
      <li class="header-list__item"><a href="news/index.html">Новини</a></li>
      <li class="header-list__item header-list-dropdown">
        <a>Інформація</a>
        <ul class="header-list-dropdown-list">
          <li class="header-list-dropdown-list__item"><a href="information/reports/index.html">Звіти</a></li>
          <li class="header-list-dropdown-list__item"><a href="information/zno/index.html">ЗНО</a></li>
        </ul>
      </li>
      <li class="header-list__item"><a href="documents.html">Документи</a></li>
      <li class="header-list__item"><a href="gallery.html">Галерея</a></li>
    </ul>
  </header>
  <div class="slider">
    <div class="slider-item">
      <h2>Дім,<br>в якому<br>добре всім</h2>
      <div class="slider-item-img">
        <img src="img/slider.jpg" alt="">
      </div>
    </div>
    <div class="slider-item">
      <h2>Test 2</h2>
      <div class="slider-item-img">
        <img src="https://mobile.photoprocenter.ru/files/201503021621525967_0.jpg" alt="">
      </div>
    </div>
    <div class="slider-item">
      <h2>Test 3</h2>
      <div class="slider-item-img">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEUAAP+KeNJXAAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC" alt="">
      </div>
    </div>
  </div>
  <div class="page">
    <div class="wrap">
      <h2 class="page__title">
        Свіжі новини
        <span class="page__title_fire"><img src="img/fire.png"></span>
        <span class="page__title_right"><a href="news/index.php"><img src="img/right-arrow.svg" alt=""></a></span>
      </h2>
      <?
        $news = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT 4");
      ?>
      <div class="news">
        <? while ($cat = mysqli_fetch_assoc($news))
        { ?>
          <div class="news-item wow fadeIn">
            <div class="news-item-img">
              <img src="<?=$cat['img'] ?>" alt="">
            </div>
            <div class="news-item-text">
              <h3 class="news-item-text__caption"><a href="news/news.php?id=<?=$cat['id'] ?>"><?=$cat['caption'] ?></a></h3>
              <p class="news-item-text__excerpt"><?=mb_substr($cat['excerpt'], 0, 80, 'utf-8') . '...' ?></p>
              <p class="news-item-text__date"><?=$cat['date'] ?></p>
            </div>
          </div>
        <? } ?>
      </div>
    </div>
  </div>
  <div class="page">
    <div class="wrap">
      <h2 class="page__title">Про нас</h2>
      <div class="about">
        <div class="about-text">
          <p class="about-text__name wow fadeIn">- Лесіна Тетяна Анатоліївна, директор закладу</p>
          <p class="about-text__description wow fadeIn"><span>Миколаївський заклад загальної середньої освіти № 34</span> – дім, в якому добре всім. Уже з порогу відчувається особлива атмосфера домашнього затишку та тепла: охайні класи, нові меблі, іграшки, багато квітів у кабінетах, на подвір’ї. Тому школу називають «сімейною»: учителі, батьки (переважна частина яких також навчалася в даному закладі) і учні - одна велика родина.</p>
          <p class="about-text__description wow fadeIn"><span>Головна мета освітньої діяльності ЗЗСО № 34</span> – створити оптимальні умови для розвитку духовно багатої, фізично здорової, вільної, творчо мислячої особистості, шляхом створення освітнього середовища, в якому учасники навчально-виховного процесу мали б змогу реалізувати себе як суб’єкти свого життя, діяльності і спілкування.</p>
          <p class="about-text__description wow fadeIn">В навчальному закладі створено умови для розвитку та підтримки творчих здібностей учнів, адже педагоги переконані, що кожна дитина - талановита.</p>
        </div>
        <div class="about-image wow fadeIn">
          <svg width="300" height="451" class="about-image__svg">
            <rect width="300" height="451" x="0" y="0" fill="#fd333b"></rect>
          </svg>
          <img src="img/lesina.jpg" alt="" class="about-image__img">
        </div>
      </div>
    </div>
  </div>
  <div class="page page_nop">
    <h2 class="wrap page__title page__title_p">Контакти</h2>
    <div class="contacts">
      <ul class="contacts-list wrap wow fadeIn">
        <li class="contacts-list__item">(0512) 47-89-25 (директор, секретар)<br>(0512) 47-89-25 (заступники директора з навчально-виховної роботи)<br>(0512) 46-73-31 (заступник директора з виховної роботи)</li>
        <li class="contacts-list__item">54017  м. Миколаїв, вул. Лягіна, 28</li>
        <li class="contacts-list__item">adamchukFront@gmail.com</li>
      </ul>
      <div class="contacts__map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2722.9353728340275!2d31.982857615608236!3d46.96295977914717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c5c967115d0785%3A0x56c84114743f47a5!2z0J3QuNC60L7Qu9Cw0LXQstGB0LrQsNGPINC-0LHRidC10L7QsdGA0LDQt9C-0LLQsNGC0LXQu9GM0L3QsNGPINGI0LrQvtC70LAgSS1JSUkg0YHRgtGD0L_QtdC90LXQuSDihJYzNA!5e0!3m2!1sru!2sua!4v1576348962600!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
  <div class="footer footer_nom">
    <div class="wrap">
      <div class="footer-about">
        <a href="" class="footer-about__logo"><img src="img/logo-gray.png" alt=""></a>
        <p class="footer-about__copyright">© <?=date(Y) ?> "Миколаївський заклад загальної середньої освіти №34". Всі права захищені</p>
      </div>
      <div class="footer-links">
        <h2 class="footer__caption">Корисні посилання</h2>
        <ul class="footer-links-list">
          <li class="footer-links-list__item"><a href="about.html">Про нас</a></li>
          <li class="footer-links-list__item"><a href="news/index.html">Новини</a></li>
          <li class="footer-links-list__item"><a href="#">Інформація</a></li>
          <li class="footer-links-list__item"><a href="documents.html">Документи</a></li>
          <li class="footer-links-list__item"><a href="gallery.html">Галерея</a></li>
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
  <script src="slick/slick.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src="js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>