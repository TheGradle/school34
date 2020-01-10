<?php

function getConnection() {
    $db = mysqli_connect(HOST, USER, PASS, DB);
    mysqli_query($db, "SET NAMES utf8");
    return $db;
}

function getAssocResult($sql) {
    $db = getConnection();
    $result = mysqli_query($db, $sql);
    $array_result = array();
    while($row = mysqli_fetch_assoc($result)){
        $array_result[] = $row;
    }
    mysqli_close($db);
    return $array_result;
}

function executeQuery($sql, $db = null) {
    if(!$db){
        $db = getConnection();
    }

    $result = mysqli_query($db, $sql);

    echo mysqli_error($db);
    mysqli_close($db);
    return $result;
}

function prepareSqlString($link, $value) {
    return mysqli_real_escape_string(
        $link,
        (string)htmlspecialchars( strip_tags($value) )
    );
}

function execQuery($sql) {
    $db = getConnection();

    $result = mysqli_query($db, $sql);

    mysqli_close($db);
    return $result;
}

function addNews($caption, $subtitle, $excerpt, $img_name) {
    $link = getConnection();
   
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $excerpt = prepareSqlString($link, $excerpt);
    $img_name = prepareSqlString($link, $img_name);

    $sql = "INSERT INTO `news` (`caption`, `subtitle`, `excerpt`, `img`) VALUES ('$caption', '$subtitle', '$excerpt', '$img_name')";

    $result = execQuery($sql, $link);
    
    return $result;
}

function editNews($id, $caption, $subtitle, $excerpt, $img_name) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $excerpt = prepareSqlString($link, $excerpt);
    $img_name = prepareSqlString($link, $img_name);

    $sql = "UPDATE `news` SET `img` = '$img_name', `caption` = '$caption', `subtitle` = '$subtitle', `excerpt` = '$excerpt' WHERE `id` = '$id'";

    $result = execQuery($sql, $link);
    
    return $result;
}

function delNews($id) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);

    $sql = "DELETE FROM `news` WHERE `id` = $id";

    $result = execQuery($sql, $link);
    
    return $result;
}