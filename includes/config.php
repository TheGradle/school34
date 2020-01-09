<?php

define('HOST', 'localhost');
define('USER', 'mysql');
define('PASS', 'mysql');
define('DB', 'geek_brains_shop');

define('SITE_ROOT', __DIR__ . "/../");
define('WWW_ROOT', SITE_ROOT . 'public/');
define('DATA_DIR', SITE_ROOT . 'data/');
define('TPL_DIR', SITE_ROOT . 'templates/');
define('ENG_DIR', SITE_ROOT . 'engine/');
define('IMG_DIR', 'img/');

require 'db.php';