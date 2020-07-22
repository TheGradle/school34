<?php

session_start();

if(isset($_GET["theme"])) {
  $theme = $_GET["theme"];

  if($theme == "light.min.css" || $theme == "dark.min.css") {
 		$_SESSION["theme"] = $theme;
  }
}