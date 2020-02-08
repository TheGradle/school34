<?php 
  require_once "../includes/config.php";


  $expansions = [
    'image/jpeg' => '.jpg',
    'image/gif' => '.gif',
    'image/png' => '.png'
  ];

  /* addNews */

  $errors = [];

  if(isset($_POST['submit'])){
    $caption = $_POST['caption'];
    $subtitle = $_POST['subtitle'];
    $excerpt = str_ireplace("'", "\'", nl2br($_POST['excerpt']));
    
    $caption_img_name = false;
    $caption_img = $_FILES['caption-img'];

    //$img_name = false;
    $img = $_FILES['img'];
    $img_desc = reArrayFiles($img);

    if(trim($caption) == '') {
      $errors[] = 'Введіть назву новини!';
    }

    if(trim($subtitle) == '') {
      $errors[] = 'Опишіть коротку про новину!';
    }

    if(trim($excerpt) == '') {
      $errors[] = 'Напишіть текст новини!';
    }

    /*if ($img && !$img['error']) {
      if (isset($expansions[$img['type']])) {
        $img_name = $img['name'];
      } else {
        $errors[] = 'Неверное разширение изображения!';
      }
    }*/

    if ($caption_img && !$caption_img['error']) {
      if (isset($expansions[$caption_img['type']])) {
        $caption_img_name = $caption_img['name'];
      } else {
        $errors[] = 'Неверное разширение изображения!';
      }
    }

    if(empty($errors)) {
      $request = addNews($caption, $subtitle, $excerpt, $caption_img_name);
      if ($request) {
        if ($img_desc) {
          foreach($img_desc as $item) {
            move_uploaded_file($item['tmp_name'], '../img/news/' . $item['name']);
          }
        }

        if ($caption_img_name) {
          move_uploaded_file($caption_img['tmp_name'], '../img/news/' . $caption_img_name);
        }
      }
    } else {
      echo array_shift($errors);
    }
  }
  
  /* editNews */

  $errors_edit = [];

  if(isset($_POST['submit_edit'])){
    $id_edit = $_POST['id_edit'];
    $caption_edit = $_POST['caption_edit'];
    $subtitle_edit = $_POST['subtitle_edit'];
    $excerpt_edit = str_ireplace("'", "\'", nl2br($_POST['excerpt_edit']));

    //$caption_img_name_edit = false;
    $caption_img_edit = $_FILES['caption-img_edit'];
    
    $img_name_edit = false;
    $img_edit = $_FILES['img_edit'];
    $img_desc_edit = reArrayFiles($img_edit);

    if(trim($id_edit) == '') {
      $errors_edit[] = 'Введіть id!';
    }

    /*if ($img_edit && !$img_edit['error']) {
      if (isset($expansions[$img_edit['type']])) {
        $img_name_edit = $img_edit['name'];
      } else {
        $errors_edit[] = 'Неверное разширение изображения!';
      }
    }*/

    if ($caption_img_edit && !$caption_img_edit['error']) {
      if (isset($expansions[$caption_img_edit['type']])) {
        $caption_img_name_edit = $caption_img_edit['name'];
      } else {
        $errors_edit[] = 'Неверное разширение изображения!';
      }
    }

    if(empty($errors_edit)) {
      $request_edit = editNews($id_edit, $caption_edit, $subtitle_edit, $excerpt_edit, $caption_img_name_edit);
      if ($request_edit) {
        if ($img_desc_edit) {
          foreach($img_desc_edit as $item) {
            move_uploaded_file($item['tmp_name'], '../img/news/' . $item['name']);
          }
        }

        if ($caption_img_name_edit) {
          move_uploaded_file($caption_img_edit['tmp_name'], '../img/news/' . $caption_img_name_edit);
        }
      }
    } else {
      echo array_shift($errors_edit);
    }
  }

  
  /* delNews */

  $errors_del = [];

  if(isset($_POST['submit_del'])){
    $id_del = $_POST['id_del'];

    if(trim($id_del) == '') {
      $errors_edit[] = 'Введіть id!';
    }

    if(empty($errors_del)) {
      $request_del = delNews($id_del);
    } else {
      echo array_shift($errors_del);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Новини - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="description" content="Загальноосвітня школа № 34 - це другий дім для учнів та працівників школи. Ми завжди раді всім хто хоче, буде, або вже навчається в нашій школі.">
  <meta name="keywords" content="мета-теги, шаблон, html, css">
  <meta name="robots" content="index,follow,noodp">
  <meta name="googlebot" content="index,follow">
  <meta name="google" content="nositelinkssearchbox">
  <link rel="stylesheet" href="../css/reset.min.css">
  <link rel="stylesheet" href="../css/main.min.css">
  <link rel="stylesheet" href="../css/admin.min.css">
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <meta name="google" content="notranslate"><!-- Подтверждает авторство страницы в Google Search Console -->
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">

  <link rel="shortcut icon" href="../img/icons/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../img/icons/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="../img/icons/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="../img/icons/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="../img/icons/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="../img/icons/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="../img/icons/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="../img/icons/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="../img/icons/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="../img/icons/apple-touch-icon-180x180.png" />
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="../img/icons/mstile-144x144.png">
  <meta name="theme-color" content="#fd333b">
  <meta name="msapplication-navbutton-color" content="#fff">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#fd333b">
</head>
<body>
  <div class="alert alert-danger" role="alert" style="display: none;"><p id="danger"></p></div>
  <div class="page">
    <h2 class="page__title"><a href="../news/index.php" target="_blank">Новини</a> - Адмін панель</h2>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Новини</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reports.php">Звіти</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="zno.php">ЗНО</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Галерея</a>
      </li>
    </ul>
    <div class="admin">
      <h3>Додати новину</h3>
      <form action="" method="POST" enctype="multipart/form-data" multipart="">
        <div class="form-group">
          <label for="caption">Назва новини</label>
          <input type="text" class="form-control" id="caption" name="caption">
        </div>
        <div class="form-group">
          <label for="subtitle">Коротко про новину</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>
        <div class="form-group">
          <label for="excerpt">Текст новини</label>
          <textarea class="form-control" id="excerpt" rows="6" name="excerpt" style="margin-bottom: 10px;"></textarea>
          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#youtube">Додати відео YouTube</button>
          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#picture">Додати URL-зображення</button>
          <label for="img" class="btn btn-secondary btn-sm" style="margin-bottom: 0px;" id="imgLabel">
            Завантажити свої зображення
          </label>
          <button type="button" class="btn btn-secondary btn-sm" id="addH2">Додати підзаголовок</button>
          <small id="excerptText" class="form-text text-muted">Ви можете користуватись html тегами для редактування тексту. Також тут ви можете додати додаткову інформацію, таку як зображення або відео YouTube.</small>
        </div>
        <div class="form-group">
          <label for="img">Завантажте головне зображення</label>
          <input type="file" class="form-control-file" id="caption-img" name="caption-img">
        </div>
        <div class="form-group" style="display: none;">
          <label for="img">Завантажте інші зображення за потребою</label>
          <input type="file" class="form-control-file" id="img" name="img[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="submit">Відправити</button>
      </form>
      <div class="modal" tabindex="-1" role="dialog" id="youtube" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Вставьте посилання на відео YouTube</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">ID:</label>
                <input type="text" class="form-control" id="youtubeLink">
              </div>
              <img src="img/inst-1.png" alt="" width="100%">
              <hr>
              <img src="img/inst-2.png" alt="" width="100%">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="youtubeAdd">Додати</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" tabindex="-1" role="dialog" id="picture" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Вставьте зображення</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Посилання:</label>
                <input type="text" class="form-control" id="pictureLink">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="pictureAdd">Додати</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="admin">
      <h3>Редагувати новину</h3>
      <form action="" method="POST" enctype="multipart/form-data" multipart="">
        <div class="form-group">
          <label for="id">ID новини, яку треба редагувати</label>
          <input type="text" class="form-control" id="id" name="id_edit">
        </div>
        <div class="form-group">
          <label for="caption">Назва новини</label>
          <input type="text" class="form-control" id="caption" name="caption_edit" placeholder="Оставьте це поле пустим, якщо не хочете нічого змінювати">
        </div>
        <div class="form-group">
          <label for="subtitle">Коротко про новину</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle_edit" placeholder="Оставьте це поле пустим, якщо не хочете нічого змінювати">
        </div>
        <div class="form-group">
          <label for="excerpt">Текст новини</label>
          <textarea class="form-control" id="excerpt_edit" rows="6" name="excerpt_edit" placeholder="Оставьте це поле пустим, якщо не хочете нічого змінювати" style="margin-bottom: 10px;"></textarea>
          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#youtube_edit">Додати відео YouTube</button>
          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#picture_edit">Додати URL-зображення</button>
          <label for="img_edit" class="btn btn-secondary btn-sm" style="margin-bottom: 0px;" id="imgLabel_edit">
            Завантажити свої зображення
          </label>
          <button type="button" class="btn btn-secondary btn-sm" id="addH2_edit">Додати підзаголовок</button>
          <small id="excerptText" class="form-text text-muted">Ви можете користуватись html тегами для редактування тексту. Також тут ви можете додати додаткову інформацію, таку як зображення або відео YouTube.</small>
        </div>
        <div class="form-group">
          <label for="img">Завантажте головне зображення, якщо хочете змінити його</label>
          <input type="file" class="form-control-file" id="caption-img_edit" name="caption-img_edit">
        </div>
        <div class="form-group" style="display: none;">
          <label for="img_edit">Завантажте додаткові зображення, якщо хочете змінити їх</label>
          <input type="file" class="form-control-file" id="img_edit" name="img_edit[]" multiple>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg" name="submit_edit">Редагувати</button>
        </div>
      </form>
      <div class="modal" tabindex="-1" role="dialog" id="youtube_edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Вставьте посилання на відео YouTube</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">ID:</label>
                <input type="text" class="form-control" id="youtubeLink_edit">
              </div>
              <img src="img/inst-1.png" alt="" width="100%">
              <hr>
              <img src="img/inst-2.png" alt="" width="100%">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="youtubeAdd_edit">Додати</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" tabindex="-1" role="dialog" id="picture_edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Вставьте зображення</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Посилання:</label>
                <input type="text" class="form-control" id="pictureLink_edit">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="pictureAdd_edit">Додати</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="admin">
      <h3>Видалити новину</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id">ID новини, яку треба видалити</label>
          <input type="text" class="form-control" id="id" name="id_del">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg" name="submit_del">Видалити</button>
        </div>
      </form>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/main.min.js"></script>
  <script>
    $(document).ready(function(){
      
      /* ADD */

      $("#youtubeAdd").click(function() {
        var link = $("#youtubeLink").val();
        var iframe = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" + link + "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
        $('#excerpt').val($.trim($('#excerpt').val() + '\n' + iframe));
      });

      $("#pictureAdd").click(function() {
        var link = $("#pictureLink").val();
        var img = "<img src=\"" + link + "\" alt=\"\">";
        $('#excerpt').val($.trim($('#excerpt').val() + '\n' + img));
      });

      $("#addH2").click(function() {
        var text = "<h2>Підзаголовок</h2>";
        $('#excerpt').val($.trim($('#excerpt').val() + '\n' + text));
      });

      /* EDIT */

      $("#youtubeAdd_edit").click(function() {
        var link = $("#youtubeLink_edit").val();
        var iframe = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" + link + "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
        $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + '\n' + iframe));
      });

      $("#pictureAdd_edit").click(function() {
        var link = $("#pictureLink_edit").val();
        var img = "<img src=\"" + link + "\" alt=\"\">";
        $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + '\n' + img));
      });

      $("#addH2_edit").click(function() {
        var text = "<h2>Підзаголовок</h2>";
        $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + '\n' + text));
      });

      /* ADD PICTURE */

      $("#img").change(function(e){
        var fileLength = e.target.files.length;

        for (var i = 0; i < fileLength; i++) {
          var fileName = e.target.files[i].name;
          var fileLink = "<img src=\"../img/news/" + fileName + "\" alt=\"\">";
          $('#excerpt').val($.trim($('#excerpt').val() + '\n' + fileLink));
        }

        $('#imgLabel').text("Ви вибрали " + fileLength + " зображення");
      });

      $("#img_edit").change(function(e){
        var fileLength = e.target.files.length;

        for (var i = 0; i < fileLength; i++) {
          var fileName = e.target.files[i].name;
          var fileLink = "<img src=\"../img/news/" + fileName + "\" alt=\"\">";
          $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + '\n' + fileLink));
        }

        $('#imgLabel_edit').text("Ви вибрали " + fileLength + " зображення");
      });
    });
  </script>
</body>
</html>