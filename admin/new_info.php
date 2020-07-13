<?php 
  require_once "../includes/config.php";

  $errors = [];

  $expansions = [
    'image/jpeg' => '.jpg',
    'image/gif' => '.gif',
    'image/png' => '.png'
  ];

  /* DATA from BD */

  $row = mysqli_query($connection, "SELECT * FROM `info_pages` WHERE 1");

  $cyr = [
      'а','б','в','г','ґ','д','е','є','ж','з','и','і','ї','й','к','л','м','н',
      'о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ь','ю','я',
      'А','Б','В','Г','Ґ','Д','Е','Є','Ж','З','И','І','Ї','й','К','Л','М','Н',
      'О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ю','Я'
  ];

  $lat = [
      'a','b','v','g','g','d','e','ie','zh','z','i','i','i','y','k','l','m','n',
      'o','p','r','s','t','u','f','h','ts','ch','sh','sht','a','yu','ya',
      'a','b','v','g','g','d','e','ie','zh','z','i','i','i','y','k','l','m','n',
      'o','p','r','s','t','u','f','h','ts','ch','sh','sht','a','yu','ya'
  ];

  /* ADD PART */

  if(isset($_POST['addPart'])){
    $caption_uk = $_POST['caption'];
    $caption_en = str_replace($cyr, $lat, $_POST['caption']);
    
    $caption_img_name = false;
    $caption_img = $_FILES['caption-img'];

    if(trim($caption) == '') {
      $errors[] = 'Введіть назву розділу!';
    }

    if ($caption_img && !$caption_img['error']) {
      if (isset($expansions[$caption_img['type']])) {
        $caption_img_name = $caption_img['name'];
      } else {
        $errors[] = 'Неверное разширение изображения!';
      }
    }

    if(empty($errors)) {
      $request = addPart($caption, $caption_img_name);
      if ($request) {
        if ($caption_img_name) {
          move_uploaded_file($caption_img['tmp_name'], '/img/icons/emoji/' . $caption_img_name);
        }

        header('Location: ' . $current_url);
      }
    } else {
      echo array_shift($errors);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Нові розділи - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
  <meta name="robots" content="noindex, follow">
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
    <h2 class="title"><a href="/information/index.php" target="_blank">Інфромація - розділи</a> - Адмін панель</h2>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Новини</a>
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
      <li class="nav-item">
        <a class="nav-link" href="about.php">Про нас</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documents.php">Документи</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Контакти</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="new_info.php">Розділи</a>
      </li>
    </ul>
    <div class="admin">
      <h3>Список розділів</h3>
      <div>
        <ol style="list-style: decimal; margin-left: 25px;">
          <?php while ($data = mysqli_fetch_assoc($row)) { 
            echo ("<li>" . $data["name"] . " <img src=" . $data["icon"] . " width='20' height='20'><a href='' id='" . $data["name"] ."'> Редагувати</a></li>");
          } ?>
        </ol>
      </div>
    </div>
    <div class="admin">
      <h3>Додати розділ</h3>
      <form action="" method="POST" enctype="multipart/form-data" multipart="">
        <div class="form-group">
          <label for="caption">Назва розділу (українською)</label>
          <input type="text" class="form-control" id="caption" name="caption">
        </div>
        <div class="form-group">
          <label for="caption">Зображення розділу</label>
          <input type="file" class="form-control-file" id="caption-img" name="caption-img">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="addPart">Відправити</button>
      </form>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/main.min.js"></script>
  <script>
    $(document).ready(function() {
      
      function nl2br (str, is_xhtml) {
        if (typeof str === 'undefined' || str === null) {
          return '';
        }

        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
      }

      /* ADD */

      $("#youtubeAdd").click(function() {
        var link = $("#youtubeLink").val();
        var iframe = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" + link + "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
        $('#excerpt').val($.trim($('#excerpt').val() + iframe));
      });

      $("#pictureAdd").click(function() {
        var link = $("#pictureLink").val();
        var img = "<img src=\"" + link + "\" alt=\"\">";
        $('#excerpt').val($.trim($('#excerpt').val() + img));
      });

      $("#addH2").click(function() {
        var text = "<h2>Підзаголовок</h2>";
        $('#excerpt').val($.trim($('#excerpt').val() + text));
      });

      $(".modal-add").click(function() {
        var title = $("#caption").val();
        var text = nl2br($("#excerpt").val());
        $('#modal-title').html(title);
        $('#modal-text-add').html(text);
      });

      /* EDIT */

      $("#youtubeAdd_edit").click(function() {
        var link = $("#youtubeLink_edit").val();
        var iframe = "<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/" + link + "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
        $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + iframe));
      });

      $("#pictureAdd_edit").click(function() {
        var link = $("#pictureLink_edit").val();
        var img = "<img src=\"" + link + "\" alt=\"\">";
        $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + img));
      });

      $("#addH2_edit").click(function() {
        var text = "<h2>Підзаголовок</h2>";
        $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + text));
      });

      $(".modal-edit").click(function() {
        var title = $("#caption_edit").val();
        var text = nl2br($("#excerpt_edit").val());
        $('#modal-title-edit').html(title);
        $('#modal-text-edit').html(text);
      });

      /* PICTURE */

      $("#img").change(function(e){
        var fileLength = e.target.files.length;

        for (var i = 0; i < fileLength; i++) {
          var fileName = e.target.files[i].name;
          var fileLink = "<img src=\"../img/news/" + fileName + "\" alt=\"\">";
          $('#excerpt').val($.trim($('#excerpt').val() + fileLink));
        }

        $('#imgLabel').text("Ви вибрали " + fileLength + " зображення");
      });

      $("#img_edit").change(function(e){
        var fileLength = e.target.files.length;

        for (var i = 0; i < fileLength; i++) {
          var fileName = e.target.files[i].name;
          var fileLink = "<img src=\"../img/news/" + fileName + "\" alt=\"\">";
          $('#excerpt_edit').val($.trim($('#excerpt_edit').val() + fileLink));
        }

        $('#imgLabel_edit').text("Ви вибрали " + fileLength + " зображення");
      });
    });
  </script>
</body>
</html>