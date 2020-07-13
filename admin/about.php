<?php 
  require_once "../includes/config.php";

  $expansions = [
    'image/jpeg' => '.jpg',
    'image/gif' => '.gif',
    'image/png' => '.png'
  ];

  $errors = [];

  /* DATA from BD */

  $row = mysqli_query($connection, "SELECT * FROM `about` WHERE 1");
  while ($data = mysqli_fetch_assoc($row)) {
    $text = strip_tags($data['text'], '<span>');
    $miniText = strip_tags($data['mini-text'], '<span>');
    $name = $data['name'];
  }

  /* Edit text */

  if (isset($_POST['editText'])) {
    $newText = str_ireplace("'", "\'", nl2br($_POST['text']));

    if(trim($newText) == trim($text)) {
      $errors[] = 'Текст залишився незмінним!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `about` SET `text` = '$newText' WHERE 1";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Edit mini text */

  if (isset($_POST['editMiniText'])) {
    $newText = str_ireplace("'", "\'", nl2br($_POST['miniText']));

    if(trim($newText) == trim($text)) {
      $errors[] = 'Текст залишився незмінним!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `about` SET `mini-text` = '$newText' WHERE 1";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Edit name */

  if (isset($_POST['editName'])) {
    $newName = $_POST['name'];

    if(trim($newName) == trim($name)) {
      $errors[] = 'Ім\'я залишилося незмінним!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `about` SET `name` = '$newName' WHERE 1";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Edit photo */

  if (isset($_POST['editPhoto'])) {
    $img_name = false;
    $img = $_FILES['img'];

    if ($img && !$img['error']) {
      if (isset($expansions[$img['type']])) {
        $img_name = $img['name'];
      } else {
        $errors[] = 'Неверное разширение изображения!';
      }
    }

    if(empty($errors)) {
      $sql = "UPDATE `about` SET `img` = '$img_name' WHERE 1";
      $result = execQuery($sql, $link);
      if ($result) {
        if ($img_name) {
          move_uploaded_file($img['tmp_name'], '../img/pages/about/' . $img_name);
          header('Location: ' . $current_url);
        }
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
  <title>Про нас - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
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
    <h2 class="title"><a href="../about.php" target="_blank">Про нас</a> - Адмін панель</h2>
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
        <a class="nav-link active" href="about.php">Про нас</a>
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
      <h3>Редагувати текст "Про нас"</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <textarea class="form-control" id="excerpt" rows="6" name="text"><?=$text?></textarea>
        <small class="form-text text-muted" style="margin-bottom: 10px;">
          Щоб зробити текст жирним треба використовувати тег span. Наприклад &lt;span&gt;жирний текст&lt;/span&gt;
        </small>
        <button type="submit" class="btn btn-primary btn-lg" name="editText">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Редагувати міні-текст "Про нас", який показується на <a href="../index.php" target="_blank">головній</a> сторінці</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <textarea class="form-control" id="excerpt" rows="6" name="miniText"><?=$miniText?></textarea>
        <small class="form-text text-muted" style="margin-bottom: 10px;">
          Щоб зробити текст жирним треба використовувати тег span. Наприклад &lt;span&gt;жирний текст&lt;/span&gt;
        </small>
        <button type="submit" class="btn btn-primary btn-lg" name="editMiniText">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Редагувати ім'я директора</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" name="name" value="<?=$name?>">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="editName">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Редагувати фото директора</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input type="file" class="form-control-file" name="img">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="editPhoto" style="margin-bottom: 10px;">Відправити</button>
      </form>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/main.min.js"></script>
</body>
</html>