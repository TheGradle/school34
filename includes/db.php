<?php

$connection = mysqli_connect(
  HOST,
  USER,
  PASS,
  DB
);

if (!$connection) {
  echo "Помилка підключення до БД! <br>Будь ласка, зверніться на мій Телеграм (@adamFront) з подробицями помилки. <br> Подробиці помилки:";
  echo mysqli_connect_error();
  exit;
}