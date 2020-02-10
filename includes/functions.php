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

function reArrayFiles($file) {
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
   
    for($i=0;$i<$file_count;$i++) {
        foreach($file_key as $val) {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}

function addNews($caption, $subtitle, $excerpt, $caption_img_name) {
    $link = getConnection();
   
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $caption_img_name = prepareSqlString($link, $caption_img_name);

    $sql = "INSERT INTO `news` (`caption`, `subtitle`, `excerpt`, `caption-img`) VALUES ('$caption', '$subtitle', '$excerpt', '$caption_img_name')";

    $result = execQuery($sql, $link);
    
    return $result;
}

function editNews($id, $caption, $subtitle, $excerpt, $caption_img_name) {
    $link = getConnection();
   
    $id = prepareSqlString($link, $id);
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $caption_img_name = prepareSqlString($link, $caption_img_name);

    $sql = "UPDATE `news` SET ";

    if ($caption) {
        $sql .= "`caption` = '$caption'";
        if ($subtitle) {
            $sql .= ", ";
        }
    }
    if ($subtitle) {
        $sql .= "`subtitle` = '$subtitle'";
        if ($caption_img_name) {
            $sql .= ", ";
        }
    }
    if ($caption_img_name) {
        $sql .= "`caption-img` = '$caption_img_name'";
        if ($excerpt) {
            $sql .= ", ";
        }
    }
    if ($excerpt) {
        if ($caption_img_name || $subtitle || $caption) {
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

function addZno($caption, $subtitle, $excerpt, $caption_img_name) {
    $link = getConnection();
   
    $caption = prepareSqlString($link, $caption);
    $subtitle = prepareSqlString($link, $subtitle);
    $caption_img_name = prepareSqlString($link, $caption_img_name);

    $sql = "INSERT INTO `zno` (`caption`, `subtitle`, `excerpt`, `caption-img`) VALUES ('$caption', '$subtitle', '$excerpt', '$caption_img_name')";

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

function addEmail($address) {
    $link = getConnection();
   
    $address = prepareSqlString($link, $address);

    $sql = "INSERT INTO `emails` (`address`) VALUES ('$address')";

    $result = execQuery($sql, $link);

    ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", "school34@gmail.com");

    $message = '<html>
                    <head>
                      <title>Test</title>
                      <style>
                        html,
                        body {
                          font-family: e-Ukraine;
                          width: 100%;
                        }

                        header {
                          width: 100%;
                          height: 500px;
                          font-size: 235px;
                          background: #fd333b;
                          color: #fff;
                          text-align: center;
                          line-height: 600px;
                        }

                        a {
                          width: 100%;
                          height: 100px;
                          background: #151111;
                          text-align: center;
                          display: block;
                          line-height: 100px;
                          color: #fff !important;
                          text-decoration: none;
                          font-size: 26px;
                        }

                        a:hover {
                          text-decoration: underline;
                        }

                        @media screen and (max-width: 600px) {
                          header {
                            font-size: 200px;
                            height: 450px;
                          }
                          a {
                            font-size: 20px;
                            height: 80px;
                            line-height: 80px;
                          }
                        }
                        @media screen and (max-width: 418px) {
                          header {
                            font-size: 170px;
                          }
                        }
                        @media screen and (max-width: 381px) {
                          a {
                            font-size: 20px;
                            height: 100px;
                            line-height: 48px;
                          }
                        }
                      </style>
                    </head>
                    <body>
                        <header>404</header>
                        <a href="http://dlkfgnkeoj98ryhe.000webhostapp.com">Повернутись на головну сторінку</a>
                    </body>
                </html>';

    $headers = "From: school34@gmail.com\r\n".
               "MIME-Version: 1.0" . "\r\n" .
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 

    mail("$address", "Ще трохи... 😉", $message, $headers);
    
    return $result;
}

/*function firstEmail($address) {
    $link = getConnection();
   
    $address = prepareSqlString($link, $address);

    $sql = "INSERT INTO `emails` (`address`) VALUES ('$address')";

    $result = execQuery($sql, $link);
    
    return $result;
}*/