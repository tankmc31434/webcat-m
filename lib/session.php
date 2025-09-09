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
if (!isset($_SESSION['core_session_fid'])) {
    $_SESSION['core_session_fid'] = 0;
}

if (!isset($_SESSION['core_session_fname'])) {
    $_SESSION['core_session_fname'] = "";
}

if (!isset($_SESSION['core_session_flogout'])) {
    $_SESSION['core_session_flogout'] = "";
}
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";

$url .= $_SERVER['HTTP_HOST'];   
$url .= $_SERVER['REQUEST_URI'];
