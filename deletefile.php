<?php
include("./lib/session.php");
include("./lib/connect.php");
$table = 'track';
$namefolder = "track";
if (isset($_REQUEST['file'])) {
    // file name
    $filename = $_REQUEST['file'];
    $file_path = './upload/' . $namefolder;
    // Location
    $location = './upload/' . $namefolder . '/' . $filename;
    $response = 0;

    if (file_exists($location)) {
        unlink($location);
        $response = 1;
        $update = array();
        $update[] = $table . "_pic  	=''";
        $sql = "UPDATE " . $table . " SET " . implode(",", $update) . " WHERE " . $table . "_id='" . $_REQUEST["id"] . "'  ";
        $Query = $db->execute($sql);
    }


    echo $response;
    exit;
}
