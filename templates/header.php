<?php
  $link_about = "$site_url/about.php";
  $link_home = $site_url;
  $link_news = "$site_url/news/index.php";
  $link_gallery = "$site_url/gallery.php";

  function activeLink($link, $current_url) {
    if ($current_url == $link) {
      echo "header-list__link_active";
    }
  }
?>

<header>
  <div class="wrap">
    <nav class="header">
      <div class="header-logo">
        <a href="/"><img src="/img/icons/logo/logo.png" alt="" class="header-logo__img"></a>
        <p class="header-logo__title"><a href="/">Заклад загальної<br>середньої освіти №&nbsp;34</a></p>
      </div>
      <ul class="header-list">
        <li class="header-list__item"><a class="header-list__link <?=activeLink($link_home, $current_url)?>" href="/">Головна</a></li>
        <li class="header-list__item"><a class="header-list__link <?=activeLink($link_about, $current_url)?>" href="/about.php">Про нас</a></li>
        <li class="header-list__item"><a class="header-list__link <?=activeLink($link_news, $current_url)?>" href="/news/index.php">Новини</a></li>
        <li class="header-list__item header-list-dropdown">
          <a class="header-list__link" href="/information/index.php">Інформація</a>
          <ul class="header-list-dropdown-list">
            <li class="header-list-dropdown-list__item"><a class="header-list-dropdown-list__link header-list__link" href="/information/documents/index.php">Документи</a></li>
            <li class="header-list-dropdown-list__item"><a class="header-list-dropdown-list__link header-list__link" href="/information/reports/index.php">Звіти</a></li>
            <li class="header-list-dropdown-list__item"><a class="header-list-dropdown-list__link header-list__link" href="/information/zno/index.php">ЗНО</a></li>
          </ul>
        </li>
        <li class="header-list__item"><a class="header-list__link <?=activeLink($link_gallery, $current_url)?>" href="/gallery.php">Галерея</a></li>
      </ul>
      <div class="header-toggle">
        <span class="header-toggle__line header-toggle__line_first"></span>
        <span class="header-toggle__line header-toggle__line_second"></span>
        <span class="header-toggle__line header-toggle__line_third"></span>
        <span class="header-toggle__line header-toggle__line_fourth"></span>
      </div>
    </nav>
  </div>
</header>
<div class="header-mobile">
  <ul class="header-mobile-list">
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/">Головна</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/about.php">Про нас</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/news/index.php">Новини</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/information/index.php">Інформація</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/gallery.php">Галерея</a></li>
  </ul>
</div>