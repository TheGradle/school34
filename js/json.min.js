function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}

function addEmail() {
  const email = $('.sidebar-subscribe__input').val();

  if (validateEmail(email) && !!email) {
    $.post({
      url: "/api.php",
      type: 'POST',
      data: {
        apiMethod: 'addEmail',
        postData: {
          email: email
        }
      },
      success: function() {
        $('.sidebar__section').addClass('sidebar__section_allowed');
        $('.sidebar-subscribe__title').addClass('sidebar-subscribe__title_allowed');
        $('.sidebar-subscribe__title_allowed').text('Перевірте Ваш email і підтвердіть розсилку');
        $('.sidebar-subscribe__input').css('display', 'none');
        $('.sidebar-subscribe__error').css('display', 'none');
        $('.sidebar-subscribe__button').css('display', 'none');
        $('.sidebar-subscribe__notice').css('display', 'none');
        $('#email').val("");
      }
    });
  } else {
    $('#valid').text("Ви ввели некоректний email!");
  }
}