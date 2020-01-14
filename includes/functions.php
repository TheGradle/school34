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
    $img_name = prepareSqlString($link, $img_name);

    $sql = "UPDATE `news` SET ";

    if ($caption) {
        $sql .= "`caption` = '$caption'";
        if ($subtitle) {
            $sql .= ", ";
        }
    }
    if ($subtitle) {
        $sql .= "`subtitle` = '$subtitle'";
        if ($img_name) {
            $sql .= ", ";
        }
    }
    if ($img_name) {
        $sql .= "`img` = '$img_name'";
        if ($excerpt) {
            $sql .= ", ";
        }
    }
    if ($excerpt) {
        if ($img_name || $subtitle || $caption) {
            $sql .= ", ";
        }
        $sql .= "`excerpt` = '$excerpt'";
    }

    $sql .= " WHERE `id` = '$id'";

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

function addReport($caption, $subtitle, $siteLink) {
    $link = getConnection();
   
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $siteLink = prepareSqlString($link, $siteLink);

    $sql = "INSERT INTO `reports` (`caption`, `subtitle`, `link`) VALUES ('$caption', '$subtitle', '$siteLink')";

    $result = execQuery($sql, $link);
    
    return $result;
}

function editReport($id, $caption, $subtitle, $siteLink) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $siteLink = prepareSqlString($link, $siteLink);

    $sql = "UPDATE `reports` SET ";

    if ($caption) {
        $sql .= "`caption` = '$caption'";
        if ($subtitle) {
            $sql .= ", ";
        }
    }
    if ($subtitle) {
        $sql .= "`subtitle` = '$subtitle'";
        if ($siteLink) {
            $sql .= ", ";
        }
    }
    if ($siteLink) {
        if ($subtitle || $caption) {
            $sql .= ", ";
        }
        $sql .= "`link` = '$siteLink'";
    }

    $sql .= " WHERE `id` = '$id'";

    $result = execQuery($sql, $link);
    
    return $result;
}

function delReport($id) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);

    $sql = "DELETE FROM `reports` WHERE `id` = $id";

    $result = execQuery($sql, $link);
    
    return $result;
}

function addZno($caption, $subtitle, $excerpt, $img_name) {
    $link = getConnection();
   
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $img_name = prepareSqlString($link, $img_name);

    $sql = "INSERT INTO `zno` (`caption`, `subtitle`, `excerpt`, `img`) VALUES ('$caption', '$subtitle', '$excerpt', '$img_name')";

    $result = execQuery($sql, $link);
    
    return $result;
}

function editZno($id, $caption, $subtitle, $excerpt, $img_name) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $img_name = prepareSqlString($link, $img_name);

    $sql = "UPDATE `zno` SET ";

    if ($caption) {
        $sql .= "`caption` = '$caption'";
        if ($subtitle) {
            $sql .= ", ";
        }
    }
    if ($subtitle) {
        $sql .= "`subtitle` = '$subtitle'";
        if ($img_name) {
            $sql .= ", ";
        }
    }
    if ($img_name) {
        $sql .= "`img` = '$img_name'";
        if ($excerpt) {
            $sql .= ", ";
        }
    }
    if ($excerpt) {
        if ($img_name || $subtitle || $caption) {
            $sql .= ", ";
        }
        $sql .= "`excerpt` = '$excerpt'";
    }

    $sql .= " WHERE `id` = '$id'";

    $result = execQuery($sql, $link);
    
    return $result;
}

function delZno($id) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);

    $sql = "DELETE FROM `zno` WHERE `id` = $id";

    $result = execQuery($sql, $link);
    
    return $result;
}