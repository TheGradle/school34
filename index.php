<?php 
  require_once "includes/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Головна - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <link rel="stylesheet" href="css/reset.min.css">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="slick/slick.css"/>
  <link rel="stylesheet" href="slick/slick-theme.css"/>
  <link rel="stylesheet" href="css/animate.min.css">
  <?php
    require_once "templates/head.php";
  ?>
</head>
<body>
  <?php
    require_once "templates/header.php";
  ?>
  <div class="slider">
    <div class="slider-item">
      <h2>Дім, <br>в якому <br>добре&nbsp;всім</h2>
      <div class="slider-item-img">
        <img src="img/slide-1.jpg" alt="">
      </div>
    </div>
    <div class="slider-item">
      <h2>Нові друзі. <br>Нова картина. <br>Нове майбутьнє.</h2>
      <div class="slider-item-img">
        <img src="img/slide-2.jpg" alt="">
      </div>
    </div>
    <div class="slider-item">
      <h2>Твій кращий <br>час - тут</h2>
      <div class="slider-item-img">
        <img src="img/slide-3.jpg" alt="">
      </div>
    </div>
  </div>
  <div class="page">
    <div class="wrap">
      <h2 class="page__title wow fadeInUp animation">
        Свіжі новини
        <span class="page__title_fire"><img src="img/fire.png"></span>
        <span class="page__title_right"><a href="news/index.php"><img src="img/right-arrow.svg" alt=""></a></span>
      </h2>
      <?php
        $news = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `news`.`id` DESC LIMIT 4");
      ?>
      <div class="news wow fadeInUp animation">
        <?php while ($cat = mysqli_fetch_assoc($news))
        { ?>
          <div class="news-item">
            <div class="news-item-img">
              <a href="news/news.php?id=<?=$cat['id'] ?>"><img src="img/news/<?=$cat['caption-img'] ?>" alt=""></a>
            </div>
            <div class="news-item-text">
              <h3 class="news-item-text__caption"><a href="news/news.php?id=<?=$cat['id'] ?>"><?=$cat['caption'] ?></a></h3>
              <p class="news-item-text__excerpt"><?=$cat['subtitle'] ?></p>
              <p class="news-item-text__date"><?=$cat['date'] ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="page">
    <div class="wrap">
      <h2 class="page__title wow fadeInUp animation">Про нас</h2>
      <div class="about">
        <div class="about-text wow fadeInUp animation">
          <p class="about-text__name">- Лесіна Тетяна Анатоліївна, директор закладу</p>
          <p class="about-text__description"><span>Миколаївський заклад загальної середньої освіти № 34</span> – дім, в якому добре всім. Уже з порогу відчувається особлива атмосфера домашнього затишку та тепла: охайні класи, нові меблі, іграшки, багато квітів у кабінетах, на подвір’ї. Тому школу називають «сімейною»: учителі, батьки (переважна частина яких також навчалася в даному закладі) і учні - одна велика родина.</p>
          <p class="about-text__description"><span>Головна мета освітньої діяльності ЗЗСО № 34</span> – створити оптимальні умови для розвитку духовно багатої, фізично здорової, вільної, творчо мислячої особистості, шляхом створення освітнього середовища, в якому учасники навчально-виховного процесу мали б змогу реалізувати себе як суб’єкти свого життя, діяльності і спілкування.</p>
          <p class="about-text__description">В навчальному закладі створено умови для розвитку та підтримки творчих здібностей учнів, адже педагоги переконані, що кожна дитина - талановита.</p>
        </div>
        <div class="about-image wow slideInRight animation">
          <svg width="300" height="451" class="about-image__svg">
            <rect width="300" height="451" x="0" y="0" fill="#fd333b"></rect>
          </svg>
          <img src="img/lesina.jpg" alt="" class="about-image__img">
        </div>
      </div>
    </div>
  </div>
  <div class="page page_nop">
    <h2 class="wrap page__title page__title_p wow fadeInUp animation">Контакти</h2>
    <div class="contacts">
      <ul class="contacts-list wrap wow fadeInUp animation">
        <li class="contacts-list__item">(0512) 47-89-25 (директор, секретар)<br>(0512) 47-89-25 (заступники директора з навчально-виховної роботи)<br>(0512) 46-73-31 (заступник директора з виховної роботи)</li>
        <li class="contacts-list__item">54017  м. Миколаїв, вул. Лягіна, 28</li>
        <li class="contacts-list__item">adamchukFront@gmail.com</li>
      </ul>
      <div class="contacts__map wow fadeIn animation">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2722.9353728340275!2d31.982857615608236!3d46.96295977914717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c5c967115d0785%3A0x56c84114743f47a5!2z0J3QuNC60L7Qu9Cw0LXQstGB0LrQsNGPINC-0LHRidC10L7QsdGA0LDQt9C-0LLQsNGC0LXQu9GM0L3QsNGPINGI0LrQvtC70LAgSS1JSUkg0YHRgtGD0L_QtdC90LXQuSDihJYzNA!5e0!3m2!1sru!2sua!4v1576348962600!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
  <div class="footer footer_nom">
    <?php
      require_once "templates/footer.php";
    ?>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="slick/slick.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
    
    $(document).ready(function(){
      $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 3000
      });
    });
  </script>
  <script src="js/main.min.js"></script>
  <script src="https://kit.fontawesome.com/4589ffe11e.js" crossorigin="anonymous"></script>
</body>
</html>