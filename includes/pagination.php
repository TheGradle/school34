<?php

$db = mysql_connect("localhost","mysql","mysql");
mysql_select_db("school34",$db);
mysql_query("SET NAMES 'utf8'",$db);

if (isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}

$count = 20;
$start = ($page * $count) - $count;

$res = mysql_query("SELECT COUNT(*) FROM `news`");
$row = mysql_fetch_row($res);
$total = $row[0];

$str_pag = ceil($total / $count);