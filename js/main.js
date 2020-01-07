$(document).ready(function(){
  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 3000
  });
  
  $(".header__toggle").click(function() {
    $(".header-list_mobile").slideToggle( "slow", function() {});
  });
});