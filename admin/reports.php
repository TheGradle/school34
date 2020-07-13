<?php 
  require_once "../includes/config.php";


  /* DATA from BD */

  $row = mysqli_query($connection, "SELECT * FROM `reports` WHERE 1");

  /* addReport */

  $errors = [];

  if(isset($_POST['submit'])){
    $caption = $_POST['caption'];
    $subtitle = $_POST['subtitle'];
    $link = $_POST['link'];

    if(trim($caption) == '') {
      $errors[] = 'Введіть назву звіту!';
    }

    if(trim($subtitle) == '') {
      $errors[] = 'Опишіть коротко про звіт!';
    }

    if(trim($link) == '') {
      $errors[] = 'Вставте посилання на звіт!';
    }

    if(empty($errors)) {
      $request = addReport($caption, $subtitle, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  
  /* editReport */

  $errors_edit = [];

  if(isset($_POST['submit_edit'])){
    $id_edit = $_POST['id_edit'];
    $caption_edit = $_POST['caption_edit'];
    $subtitle_edit = $_POST['subtitle_edit'];
    $link_edit = $_POST['link_edit'];

    if(trim($id_edit) == '') {
      $errors_edit[] = 'Введіть id!';
    }

    if(empty($errors_edit)) {
      $request_edit = editReport($id_edit, $caption_edit, $subtitle_edit, $link_edit);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors_edit);
    }
  }

  
  /* delReport */

  $errors_del = [];

  if(isset($_POST['submit_del'])){
    $id_del = $_POST['id_del'];

    if(trim($id_del) == '') {
      $errors_edit[] = 'Введіть id!';
    }

    if(empty($errors_del)) {
      $request_del = delReport($id_del);
      header('Location: ' . $current_url);
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
  <title>Звіти - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
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
  <div class="page">
    <h2 class="title"><a href="../information/reports/index.php" target="_blank">Звіти</a> - Адмін панель</h2>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Новини</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="reports.php">Звіти</a>
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
        <a class="nav-link" href="new_info.php">Розділи</a>
      </li>
    </ul>
    <div class="admin">
      <h3>Список звітів</h3>
      <ol style="list-style: decimal; margin-left: 25px;">
        <?php while ($data = mysqli_fetch_assoc($row)) { 
          echo ("<li>" . "<a target='_blank' href='" . $data["link"] . "'>" . $data["caption"] . "</a> (ID:" . $data["id"] . ")</li>");
        } ?>
      </ol>
    </div>
    <div class="admin">
      <h3>Додати звіт</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="caption">Назва звіту</label>
          <input type="text" class="form-control" id="caption" name="caption">
        </div>
        <div class="form-group">
          <label for="subtitle">Коротко про звіт</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>
        <div class="form-group">
          <label for="link">Посилання на звіт</label>
          <input type="text" class="form-control" id="link" name="link">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="submit">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Редагувати звіт</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id">ID звіту, якого треба редагувати</label>
          <input type="text" class="form-control" id="id" name="id_edit">
        </div>
        <div class="form-group">
          <label for="caption">Назва звіту</label>
          <input type="text" class="form-control" id="caption" name="caption_edit" placeholder="Оставьте це поле пустим, якщо не хочете нічого змінювати">
        </div>
        <div class="form-group">
          <label for="subtitle">Коротко про звіт</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle_edit" placeholder="Оставьте це поле пустим, якщо не хочете нічого змінювати">
        </div>
        <div class="form-group">
          <label for="link">Посилання на звіт</label>
          <input type="text" class="form-control" id="link" name="link_edit" placeholder="Оставьте це поле пустим, якщо не хочете нічого змінювати">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg" name="submit_edit">Редагувати</button>
        </div>
      </form>
    </div>
    <div class="admin">
      <h3>Видалити звіт</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id">ID звіту, якого треба видалити</label>
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
</body>
</html>