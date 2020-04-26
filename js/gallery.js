$(document).ready(function(){
  $('.gallery-block-img__item').click(function(e) {
    $('.block-preview-photo__img').attr("src", "");

    var src = e.target.src;
    
    $('.block-preview-photo__img').attr("src", src);

    $('.block-preview').fadeIn();
  });

  $('.block-preview-photo').click(function(e) {
    if(this === e.target) {
      $('.block-preview').fadeOut();
    }
  });
});