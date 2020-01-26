$(document).ready(function(){
  $(".header__toggle").click(function() {
    $(".header-list_mobile").slideToggle( "slow", function() {});
  });
});