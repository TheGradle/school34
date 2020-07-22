$(document).ready(function(){
  $(".header-toggle").click(function() {
    $(".header-mobile").slideToggle(400, function() {});
    $("body").toggleClass('overflow');
    $(".header-toggle").toggleClass('header-toggle_active');
    //$(".header-theme").toggleClass('header-theme_active');
  });

  $(".header-theme").click(function() {
    $(".header-mobile").slideToggle(400, function() {});
    $(".header-toggle").toggleClass('header-toggle_active');
    //$(".header-theme").toggleClass('header-theme_active');
  });

  $(".theme-button").click(function() {
    var btn = $(".theme-button");
    var link = document.getElementById('theme-link');

    var lightTheme = "/css/light.min.css";
    var darkTheme = "/css/dark.min.css";

    var currTheme = link.getAttribute("href");
    var theme = "";

    if(currTheme == lightTheme) {
      currTheme = darkTheme;
      theme = "dark.min.css";
    } else {    
      currTheme = lightTheme;
      theme = "light.min.css";
    }

    link.setAttribute("href", currTheme);

    Save(theme);
  });

  function Save(theme) {
    var Request = new XMLHttpRequest();
    Request.open("GET", "/includes/themes.php?theme=" + theme, true);
    Request.send();
  }
});