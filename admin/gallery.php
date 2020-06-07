<?php 
  require_once "../includes/config.php";

  $errors = [];

  $expansions = [
    'image/jpeg' => '.jpg',
    'image/gif' => '.gif',
    'image/png' => '.png'
  ];

  /* Add photos to gallary */

  if(isset($_POST['submit'])) {
    $date = $_POST['date'];
    $img = $_FILES['img'];
    $img_desc = reArrayFiles($img);

    if(trim($date) == '') {
      $errors[] = 'Введіть дату!';
    }

    /*if ($img && !$img['error']) {
      if (isset($expansions[$img['type']])) {
        $img_name = $img['name'];
      } else {
        $errors[] = 'Неверное разширение изображения!';
      }
    }*/

    if(empty($errors)) {
      $check_date = mysqli_query($connection, "SELECT `date` FROM `photos` WHERE `date` = '$date'");
      $coincidences = mysqli_num_rows($check_date);

      if ($coincidences > 0) {
        $request = true;
      } else {
        $request = mysqli_query($connection, "INSERT INTO `photos` (`date`) VALUES ('$date')");
      }

      if ($request) {
        if ($img_desc) {
          $dir = "../img/pages/gallery/$date/";
          $count = 0;

          if (!file_exists($dir)) {
            mkdir($dir, 0700);
          } else {
            $files = scandir($dir);
            $count = (count($files) - 2);
          }
          
          foreach($img_desc as $item) {
            move_uploaded_file($item['tmp_name'], $dir . $count++ . $expansions[$item['type']]);
          }
        }

        header('Location: ' . $current_url);
      }
    } else {
      echo array_shift($errors);
    }
  }

  /* Delete 1 photo from gallary */

  if(isset($_POST['delPhoto'])) {
    $date = $_POST['date_del'];
    $id = $_POST['id_del'];

    if(trim($date) == '') {
      $errors[] = 'Введіть дату зображення, яке хочете видалити!';
    }
    if(trim($id) == '') {
      $errors[] = 'Введіть номер зображення, яке хочете видалити!';
    }

    if(empty($errors)) {
      $dir = "../img/pages/gallery/$date/";
      $files = scandir($dir);
      $id += 2; 
      unlink($dir . $files[$id]);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Delete date and all photos this date from gallary */

  if(isset($_POST['delDate'])) {
    $date = $_POST['date_del_all'];

    if(trim($date) == '') {
      $errors[] = 'Введіть дату зображень, які хочете видалити!';
    }

    if(empty($errors)) {
      rmdir("../img/pages/gallery/$date");
      $request = mysqli_query($connection, "DELETE FROM `photos` WHERE `date` = '$date'");
      header('Location: ' . $current_url);
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
  <title>Галерея - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
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
    <h2 class="title"><a href="/gallery.php" target="_blank">Галерея</a> - Адмін панель</h2>
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
        <a class="nav-link active" href="gallery.php">Галерея</a>
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
    </ul>
    <div class="admin">
      <h3>Додати фото</h3>
      <form action="" method="POST" enctype="multipart/form-data" multipart="">
        <div class="form-group">
          <label for="img">Завантажте зображення</label>
          <input type="file" class="form-control-file" id="img" name="img[]" multiple>
        </div>
        <div class="form-group">
          <label for="img">Введіть дату:</label>
          <input type="date" class="form-control" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="submit">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Видалити 1 фото</h3>
      <a href="/img/pages/gallery/" target="_blank">Посилання на всі папки з фото</a>
      <form action="" method="POST">
        <div class="form-group">
          <label for="id">Номер фото, якого треба видалити:</label>
          <input type="text" class="form-control" id="id" name="id_del">
        </div>
        <div class="form-group">
          <label for="img">Введіть дату фото:</label>
          <input type="date" class="form-control" id="date" name="date_del">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg" name="delPhoto">Видалити</button>
        </div>
      </form>
    </div>
    <div class="admin">
      <h3>Видалити всі фото конкретної дати</h3>
      <form action="" method="POST">
        <div class="form-group">
          <label for="img">Введіть дату:</label>
          <input type="date" class="form-control" id="date" name="date_del_all">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg" name="delDate">Видалити</button>
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