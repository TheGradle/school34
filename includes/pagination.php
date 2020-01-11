<?php

$db = mysqli_connect("localhost","mysql","mysql");
mysqli_select_db($db, "school34");
mysqli_query($db, "SET NAMES 'utf8'");

if (isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}

$count = 20;
$start = ($page * $count) - $count;

$res = mysqli_query($db, "SELECT COUNT(*) FROM `news`");
$row = mysqli_fetch_row($res);
$total = $row[0];

$str_pag = ceil($total / $count);