<?php 
  require_once "includes/config.php";

  // NEWS DB
  $news = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT 4");

  // ABOUT DB
  $row = mysqli_query($connection, "SELECT * FROM `about` WHERE 1");
  while ($about = mysqli_fetch_assoc($row)) {
    $text = $about['mini-text'];
    $name = $about['name'];
    $img = $about['img'];
  }
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Головна - Миколаївський заклад загальної середньої освіти № 34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="slick/slick.css">
  <link rel="stylesheet" href="slick/slick-theme.css">
  <link rel="stylesheet" href="css/slider.min.css">
  <link rel="stylesheet" href="/css/<?=$_SESSION["theme"]?>" id="theme-link">
  <?php
    require_once "templates/head.php";
  ?>
</head>
<body>
  <?php
    require_once "templates/header.php";
  ?>
  <div class="slider wow fadeIn animation">
    <div class="slider-item">
      <h2 class="slider-item__text">Дім, <br>в якому <br>добре&nbsp;всім</h2>
      <div class="slider-item-img">
        <img class="slider-item-img__item" src="img/pages/slider/slide-1.jpg" alt="">
      </div>
    </div>
    <div class="slider-item">
      <h2 class="slider-item__text">Нові друзі. <br>Нова картина. <br>Нове майбутьнє.</h2>
      <div class="slider-item-img">
        <img class="slider-item-img__item" src="img/pages/slider/slide-2.jpg" alt="">
      </div>
    </div>
    <div class="slider-item">
      <h2 class="slider-item__text">Твій кращий <br>час - тут</h2>
      <div class="slider-item-img">
        <img class="slider-item-img__item" src="img/pages/slider/slide-3.jpg" alt="">
      </div>
    </div>
  </div>
  <div class="page">
    <div class="wrap">
      <h2 class="title wow fadeInUp animation">
        Свіжі новини
        <span class="title__emoji"><img src="img/icons/emoji/fire.png" alt=""></span>
        <span class="title__right">
          <a href="news/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.49 31.49"><path d="M21.205 5.007a1.112 1.112 0 00-1.587 0 1.12 1.12 0 000 1.571l8.047 8.047H1.111A1.106 1.106 0 000 15.737c0 .619.492 1.127 1.111 1.127h26.554l-8.047 8.032c-.429.444-.429 1.159 0 1.587a1.112 1.112 0 001.587 0l9.952-9.952a1.093 1.093 0 000-1.571l-9.952-9.953z"></svg>
          </a>
        </span>
      </h2>
      <div class="news">
        <?php while ($article = mysqli_fetch_assoc($news)) { ?>
          <div class="news-item wow fadeInUp animation">
            <div class="news-item-img">
              <a href="news/news.php?id=<?=$article['id']?>"><img class="news-item-img__item" src="img/pages/news/<?=$article['caption-img']?>" alt=""></a>
            </div>
            <div class="news-item-text">
              <h3 class="news-item-text__title"><a href="news/news.php?id=<?=$article['id']?>"><?=$article['caption']?></a></h3>
              <p class="news-item-text__subtitle"><?=$article['subtitle']?></p>
              <p class="news-item-text__date"><?=friendlyDate($article['date'])?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="page">
    <div class="wrap">
      <h2 class="title wow fadeInUp animation">Про нас</h2>
      <div class="about">
        <div class="about-text wow fadeInUp animation">
          <p class="about-text__name">- <?=$name?>, директор закладу</p>
          <p class="about-text__description"><?=$text?></p>
        </div>
        <div class="about-image wow slideInRight animation">
          <svg width="300" height="451" class="about-image__svg">
            <rect width="300" height="451" x="0" y="0" fill="#fd333b"></rect>
          </svg>
          <img src="img/pages/about/<?=$img?>" alt="" class="about-image__img">
        </div>
        <div class="about-image about-image_mobile wow fadeInUp animation">
          <img src="img/pages/about/<?=$img?>" alt="" class="about-image__img">
        </div>
      </div>
    </div>
  </div>
  <div class="page" style="margin-bottom: 0;">
    <div class="wrap">
      <h2 class="title wow fadeInUp animation">Контакти</h2>
      <ul class="contacts wow fadeInUp animation">
        <li class="contacts__item"><?=$number1?> (директор, секретар)<br><?=$number2?> (заступники директора з навчально-виховної роботи)<br><?=$number3?> (заступник директора з виховної роботи)</li>
        <li class="contacts__item"><?=$address?></li>
        <li class="contacts__item"><?=$email?></li>
      </ul>
    </div>
  </div>
  <div class="map wow fadeIn animation">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2722.9353728340275!2d31.982857615608236!3d46.96295977914717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c5c967115d0785%3A0x56c84114743f47a5!2z0J3QuNC60L7Qu9Cw0LXQstGB0LrQsNGPINC-0LHRidC10L7QsdGA0LDQt9C-0LLQsNGC0LXQu9GM0L3QsNGPINGI0LrQvtC70LAgSS1JSUkg0YHRgtGD0L_QtdC90LXQuSDihJYzNA!5e0!3m2!1sru!2sua!4v1576348962600!5m2!1sru!2sua" width="450" height="450" style="border: 0; width: 100%;" allowfullscreen=""></iframe>
  </div>
  <?php
    require_once "templates/footer.php";
  ?>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="slick/slick.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
    
    $(document).ready(function(){
      $('.slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 4000
      });
    });
  </script>
  <script src="js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>