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
        <li class="header-list__item">
          <div class="header-list__link theme-button">
            <svg class="theme-button__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 383.852 383.852"><path d="M382.667 248.54c-2.528-6.168-8.48-9.896-14.776-9.904-.032 0-.064-.008-.096-.008-.104 0-.192.04-.296.048a15.84 15.84 0 00-3.688.56c-.456.12-.888.24-1.328.392-.224.08-.456.112-.688.2-20.072 8.248-41.392 12.432-63.384 12.432-91.976 0-166.808-74.832-166.808-166.808 0-21.992 4.176-43.312 12.432-63.384.12-.28.16-.576.256-.864.12-.352.224-.704.32-1.072.36-1.32.584-2.648.6-3.976 0-.056.024-.112.024-.176 0-.016-.008-.04-.008-.056 0-.96-.112-1.904-.288-2.832-.04-.2-.072-.4-.112-.6-.208-.92-.472-1.832-.84-2.696-.144-.336-.344-.624-.504-.944-1.672-3.336-4.44-6.144-8.168-7.672-4.36-1.784-9.024-1.464-12.96.416-.04.016-.088.024-.128.048-23.912 9.832-45.496 24.264-64.152 42.92-77.432 77.528-77.432 203.672.008 281.216 38.768 38.72 89.68 58.072 140.6 58.072s101.84-19.36 140.616-58.08c18.592-18.6 33-40.112 42.832-63.944.048-.088.064-.192.104-.288.456-.952.824-1.944 1.088-2.976.016-.08.048-.152.072-.232.76-3.152.6-6.56-.728-9.792zm-65.976 54.608c-65.064 64.968-170.92 64.968-235.968 0-64.976-65.056-64.976-170.912-.008-235.96 6.944-6.944 14.448-13.064 22.312-18.576a200.158 200.158 0 00-3.424 36.848c0 109.624 89.184 198.808 198.808 198.808 12.48 0 24.784-1.168 36.848-3.424-5.52 7.856-11.624 15.36-18.568 22.304z"/></svg>
          </div>
        </li>
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
    <li class="header-mobile-list__item">
      <div class="header-theme" class="theme-button">
        <svg class="theme-button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 383.852 383.852"><path d="M382.667 248.54c-2.528-6.168-8.48-9.896-14.776-9.904-.032 0-.064-.008-.096-.008-.104 0-.192.04-.296.048a15.84 15.84 0 00-3.688.56c-.456.12-.888.24-1.328.392-.224.08-.456.112-.688.2-20.072 8.248-41.392 12.432-63.384 12.432-91.976 0-166.808-74.832-166.808-166.808 0-21.992 4.176-43.312 12.432-63.384.12-.28.16-.576.256-.864.12-.352.224-.704.32-1.072.36-1.32.584-2.648.6-3.976 0-.056.024-.112.024-.176 0-.016-.008-.04-.008-.056 0-.96-.112-1.904-.288-2.832-.04-.2-.072-.4-.112-.6-.208-.92-.472-1.832-.84-2.696-.144-.336-.344-.624-.504-.944-1.672-3.336-4.44-6.144-8.168-7.672-4.36-1.784-9.024-1.464-12.96.416-.04.016-.088.024-.128.048-23.912 9.832-45.496 24.264-64.152 42.92-77.432 77.528-77.432 203.672.008 281.216 38.768 38.72 89.68 58.072 140.6 58.072s101.84-19.36 140.616-58.08c18.592-18.6 33-40.112 42.832-63.944.048-.088.064-.192.104-.288.456-.952.824-1.944 1.088-2.976.016-.08.048-.152.072-.232.76-3.152.6-6.56-.728-9.792zm-65.976 54.608c-65.064 64.968-170.92 64.968-235.968 0-64.976-65.056-64.976-170.912-.008-235.96 6.944-6.944 14.448-13.064 22.312-18.576a200.158 200.158 0 00-3.424 36.848c0 109.624 89.184 198.808 198.808 198.808 12.48 0 24.784-1.168 36.848-3.424-5.52 7.856-11.624 15.36-18.568 22.304z"/></svg>
      </div>
    </li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/">Головна</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/about.php">Про нас</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/news/index.php">Новини</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/information/index.php">Інформація</a></li>
    <li class="header-mobile-list__item"><a class="header-mobile-list__link" href="/gallery.php">Галерея</a></li>
  </ul>
</div>