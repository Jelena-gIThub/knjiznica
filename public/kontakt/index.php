<?php

if ($_SERVER['QUERY_STRING']) {
    $queryString = '&' . $_SERVER['QUERY_STRING'];
} else {
    $queryString = '';
}

header('Location: http://localhost/knjiznica/public/index.php/?p=kontakt' . $queryString);
die;