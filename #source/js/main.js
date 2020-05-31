$(document).ready(function(){
  $(".header-toggle").click(function() {
    $(".header-mobile").slideToggle(400, function() {});
    $("body").toggleClass('overflow');
    $(".header-toggle").toggleClass('header-toggle_active');
  });

  $('.sidebar-subscribe__input').on('blur', function () {
    var email = $(this).val();
    
    if (email.length > 0 && (email.match(/.+?\@.+/g) || []).length !== 1) {
      $('#valid').text("Ви ввели некоректний email!");
    } else {
      $('#valid').text("");
    }
  });
});