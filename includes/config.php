<?php

define('HOST', 'localhost');
define('USER', 'mysql');
define('PASS', 'mysql');
define('DB', 'school34');

define('IMG_DIR', 'img/');

require 'db.php';
require 'functions.php';

ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$site_url = "http://" . $_SERVER['HTTP_HOST'];


/* CONTACTS DATA from BD */

$row = mysqli_query($connection, "SELECT * FROM `contacts` WHERE 1");
while ($data = mysqli_fetch_assoc($row)) {
  $number1 = $data['number1'];
  $number2 = $data['number2'];
  $number3 = $data['number3'];
  $address = $data['address'];
  $email = $data['email'];
}