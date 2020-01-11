<?php

define('HOST', 'localhost');
define('USER', 'mysql');
define('PASS', 'mysql');
define('DB', 'school34');

define('IMG_DIR', 'img/');

require 'db.php';
require 'functions.php';

$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];