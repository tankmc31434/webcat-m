<?php

ob_start();
session_cache_expire(1280);
$cache_expire = session_cache_expire();
@session_start();


// Convert Variable Array To Variable
foreach ($_GET as $xVarName => $xVarvalue) {
    ${$xVarName} = $xVarvalue;
}

foreach ($_POST as $xVarName => $xVarvalue) {
    ${$xVarName} = $xVarvalue;
}

foreach ($_SESSION as $xVarName => $xVarvalue) {
    ${$xVarName} = $xVarvalue;
}

foreach ($_COOKIE as $xVarName => $xVarvalue) {
    ${$xVarName} = $xVarvalue;
}

foreach ($_FILES as $xVarName => $xVarvalue) {
    ${$xVarName . "_name"} = $xVarvalue['name'];
    ${$xVarName . "_type"} = $xVarvalue['type'];
    ${$xVarName . "_size"} = $xVarvalue['size'];
    ${$xVarName . "_error"} = $xVarvalue['error'];
    ${$xVarName} = $xVarvalue['tmp_name'];
}


// Session Handle Current User Information ------------------
if (!isset($_SESSION['core_session_id'])) {
    $_SESSION['core_session_id'] = 0;
}

if (!isset($_SESSION['core_session_name'])) {
    $_SESSION['core_session_name'] = "";
}

if (!isset($_SESSION['core_session_level'])) {
    $_SESSION['core_session_level'] = "";
}

if (!isset($_SESSION['core_session_language'])) {
    $_SESSION['core_session_language'] = "Thai";
}

if (!isset($_SESSION['core_session_logout'])) {
    $_SESSION['core_session_logout'] = "";
}
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
$url .= $_SERVER['HTTP_HOST'];   
$url .= $_SERVER['REQUEST_URI'];

