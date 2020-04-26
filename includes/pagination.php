<?php

if (isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}

$count = 20;
$start = ($page * $count) - $count;

$res = mysqli_query($connection, "SELECT COUNT(*) FROM `$target`");
$row = mysqli_fetch_row($res);
$total = $row[0];

$str_pag = ceil($total / $count);