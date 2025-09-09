<?php
include('./config.php');

if (isset($_REQUEST['file'])) {
    // file name
    $filename = $_REQUEST['file'];
    $file_path = '../../upload/' . $namefolder;
    // Location
    $location = '../../upload/' . $namefolder . '/' . $filename;
    $response = 0;

    if (file_exists($location)) {
    unlink($location);
    $response = 1;
    }


    echo $response;
    exit;
}
