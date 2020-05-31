<?php

ob_start();
require_once 'includes/config.php';

$method = $_POST['apiMethod'];
$postData = $_POST['postData'];

$access_methods = [
  'addEmail'
];

function error($error_text) {
  header('Content-Type: application/json');
  echo json_encode(['result' => null, 'error' => $error_text]);
  exit;
}

if (!isset($method)) {
  error("Нет данных (method)");
}
if (!isset($postData)) {
  error("Нет данных (postData)");
}

if (!function_exists($method)) {
  error("Метод не существует");
}

if (!in_array($method, $access_methods)) {
  error("Запрещено!");
}

$data = $method($postData);

header('Content-Type: application/json');
echo json_encode(['result' => $data, 'error' => false]);
exit;
ob_end_clean();