<?php 
  require_once "../includes/config.php";

  $errors = [];

  /* DATA from BD */

  $row = mysqli_query($connection, "SELECT * FROM `documents` WHERE 1");

  /* Add document */

  if(isset($_POST['addDoc'])) {
    $document = $_POST['document'];

    if(trim($document) == '') {
      $errors[] = 'Поле пусте!';
    }

    if(empty($errors)) {
      $sql = "INSERT INTO `documents` (`text`) VALUES ('$document')";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Add subdocument */

  if(isset($_POST['addPartDoc'])) {
    $parent_id = $_POST['id_addPart'];
    $document = $_POST['document_add'];

    if(trim($document) == '') {
      $errors[] = 'Поле пусте!';
    }

    if(empty($errors)) {
      $sql1 = "INSERT INTO `documents` (`text`, `type`, `link`) VALUES ('$document', '1', '$parent_id')";
      $sql2 = "UPDATE `documents` SET `linked` = '1' WHERE `id` = '$parent_id'";
      $result = execQuery($sql1, $link);
      $result = execQuery($sql2, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Edit document */

  if(isset($_POST['editDoc'])) {
    $id = $_POST['id_edit'];
    $document = $_POST['document_edit'];

    if(trim($id) == '') {
      $errors[] = 'Поле id пусте!';
    }

    if(trim($document) == '') {
      $errors[] = 'Поле редагованого документа пусте!';
    }

    if(empty($errors)) {
      $sql = "UPDATE `documents` SET `text` = '$document' WHERE `id` = $id";
      $result = execQuery($sql, $link);
      header('Location: ' . $current_url);
    } else {
      echo array_shift($errors);
    }
  }

  /* Del document */

  if(isset($_POST['delDoc'])) {
    $id = $_POST['id_del'];

    if(trim($id) == '') {
      $errors[] = 'Поле id пусте!';
    }

    if(empty($errors)) {
      $sql = "DELETE FROM `documents` WHERE `id` = $id";
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
  <title>Документи - Адмін панель - Миколаївський заклад загальної середньої освіти №34</title>
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
    <h2 class="title"><a href="/information/documents/index.php" target="_blank">Документи</a> - Адмін панель</h2>
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
        <a class="nav-link active" href="documents.php">Документи</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Контакти</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new_info.php">Розділи</a>
      </li>
    </ul>
    <div class="admin">
      <h3>Список документів</h3>
      <div>
        <ol style="list-style: decimal; margin-left: 25px;">
          <?php while ($data = mysqli_fetch_assoc($row)) { 
            if ($data["type"] == 0) {
              echo ("<li>" . $data["text"] . " <span>(ID: " . $data["id"] . ")</span> <a href='' class='deleteDocument' id='" . $data["id"] ."' data-toggle='modal' data-target='#delDoc' style='color: red'>Видалити</a> <a href='' class='editDocument' id='" . $data["id"] ."' data-toggle='modal' data-target='#editDoc'>Редагувати</a> <a href='' class='addPartDocument' id='" . $data["id"] ."' data-toggle='modal' data-target='#addPartDoc' style='color: green'>Додати піддокумент</a></li>");

              $parent = $data["id"];

              if ($data["linked"] == 1) {
                $subrow = mysqli_query($connection, "SELECT * FROM `documents` WHERE `link` = " . $parent);
                echo "<ol style='list-style: decimal; margin-left: 25px;'>";
                while ($subdata = mysqli_fetch_assoc($subrow)) {
                  echo "<li>" . $subdata["text"] . " <span>(ID: " . $subdata["id"] . ")</span> <a href='' class='deleteDocument' id='" . $subdata["id"] ."' data-toggle='modal' data-target='#delDoc' style='color: red'>Видалити</a> <a href='' class='editDocument' id='" . $subdata["id"] ."' data-toggle='modal' data-target='#editDoc'>Редагувати</a></li>";
                }
                echo "</ol>";
              }
            }
          } ?>
        </ol>
      </div>
    </div>
    <div class="modal fade" id="delDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ви впевнені?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="documents.php" method="POST">
            <div class="modal-body">
              Ви впевнені, що хочете видалити документ ID - <input style="width: 70px;" type="text" class="modal-body__id" name="id_del"></input>?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
              <button type="submit" class="btn btn-primary" name="delDoc">Видалити</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Редагування документу</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="documents.php" method="POST">
            <div class="modal-body">
              ID - <input style="width: 70px;" type="text" class="modal-body__id" name="id_edit"></input>
              <br>Редагований документ:
              <br><input type="text" class="modal-body__document_edit" name="document_edit" style="width: 100%">
              <small id="excerptText" class="form-text text-muted" style="margin-bottom: 10px;">Щоб додати посилання використовуйте тег <a href="http://htmlbook.ru/html/a">a</a></small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
              <button type="submit" class="btn btn-primary" name="editDoc">Редагувати</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="addPartDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Додати піддокумент</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="documents.php" method="POST">
            <div class="modal-body">
              ID - <input style="width: 70px;" type="text" class="modal-body__id" name="id_addPart"></input>
              <br>Введіть піддокумент:
              <br><input type="text" class="modal-body__document_add" name="document_add" style="width: 100%">
              <small id="excerptText" class="form-text text-muted" style="margin-bottom: 10px;">Щоб додати посилання використовуйте тег <a href="http://htmlbook.ru/html/a">a</a></small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
              <button type="submit" class="btn btn-primary" name="addPartDoc">Додати</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="admin">
      <h3>Додати документ/відомість</h3>
      <form action="" method="POST" enctype="multipart/form-data" multipart="">
        <input type="text" class="form-control" name="document">
        <small id="excerptText" class="form-text text-muted" style="margin-bottom: 10px;">Щоб додати посилання використовуйте тег <a href="http://htmlbook.ru/html/a">a</a></small>
        <button type="submit" class="btn btn-primary btn-lg" name="addDoc">Відправити</button>
      </form>
    </div>
  </div>
  <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $('.deleteDocument').click(function(e) {
        var id = e.target.id;
        
        $('.modal-body__id').val(id);
      });

      $('.editDocument').click(function(e) {
        var id = e.target.id;
        
        $('.modal-body__id').val(id);
      });

      $('.addPartDocument').click(function(e) {
        var id = e.target.id;
        
        $('.modal-body__id').val(id);
      });
    });
  </script>
  <script src="../js/main.min.js"></script>
</body>
</html>