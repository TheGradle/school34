<?php 
  require_once "../includes/config.php";

  $errors = [];

  /* DATA from BD */

  $row = mysqli_query($connection, "SELECT * FROM `contacts` WHERE 1");
  while ($data = mysqli_fetch_assoc($row)) {
    $number1 = $data['number1'];
    $number2 = $data['number2'];
    $number3 = $data['number3'];
    $address = $data['address'];
    $email = $data['email'];
  }

  /* EditNumbers */

  if(isset($_POST['editNumbers'])) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $number3 = $_POST['number3'];

    if(trim($number1) == '') {
      $errors[] = 'Введіть телефон директора/секретаря!';
    }
    if(trim($number2) == '') {
      $errors[] = 'Введіть телефон заступника директора з навчально-виховної роботи!';
    }
    if(trim($number3) == '') {
      $errors[] = 'Введіть телефон заступника директора з виховної роботи!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `contacts` SET `number1` = '$number1', `number2` = '$number2', `number3` = '$number3' WHERE 1";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* EditAddress */

  if(isset($_POST['editAddress'])) {
    $address = $_POST['address'];

    if(trim($address) == '') {
      $errors[] = 'Введіть адресу!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `contacts` SET `address` = '$address' WHERE 1";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* EditEmail */

  if(isset($_POST['editEmail'])) {
    $email = $_POST['email'];

    if(trim($email) == '') {
      $errors[] = 'Введіть email!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `contacts` SET `email` = '$email' WHERE 1";
      $result = execQuery($sql, $link);
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
  <title>Контакти - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
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
    <h2 class="page__title">Контакти - Адмін панель</h2>
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
        <a class="nav-link active" href="contacts.php">Контакти</a>
      </li>
    </ul>
    <div class="admin">
      <h3>Редагувати телефони</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="caption">Телефон директора/секретаря</label>
          <input type="text" class="form-control" name="number1" value="<?=$number1?>">
        </div>
        <div class="form-group">
          <label for="caption">Телефон заступника директора з навчально-виховної роботи</label>
          <input type="text" class="form-control" name="number2" value="<?=$number2?>">
        </div>
        <div class="form-group">
          <label for="caption">Телефон заступника директора з виховної роботи</label>
          <input type="text" class="form-control" name="number3" value="<?=$number3?>">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="editNumbers">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Редагувати адресу</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" class="form-control" name="address" style="margin-bottom: 10px" value="<?=$address?>">
        <button type="submit" class="btn btn-primary btn-lg" name="editAddress">Відправити</button>
      </form>
    </div>
    <div class="admin">
      <h3>Редагувати email</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="email" class="form-control" name="email" style="margin-bottom: 10px" value="<?=$email?>">
        <button type="submit" class="btn btn-primary btn-lg" name="editEmail" style="margin-bottom: 10px">Відправити</button>
      </form>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/main.min.js"></script>
</body>
</html>