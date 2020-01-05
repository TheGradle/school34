<?php

$connection = mysqli_connect(
  $config['server'],
  $config['username'],
  $config['password'],
  $config['name']
);

if (!$connection) {
  echo "Ошибка подключения к БД!<br>Пожалуйста, обратитесь на мой Телеграм (@adamFront) с подробностями ошибки.<br>Подробности ошибки:";
  echo mysqli_connect_error();
  exit;
}