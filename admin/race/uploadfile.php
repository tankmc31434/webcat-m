<?php
include("../lib/session.php");
include("../lib/connect.php");
include("../lib/function.php");
include("./config.php");

if (isset($_FILES['file']['name'])) {
    // file name
    $rand = rand();
    $filename = $namefolder . '-' . $rand . '-' . $_FILES['file']['name'];
    $file_path = '../../upload/' . $namefolder;
    // Location
    $location = '../../upload/' . $namefolder . '/' . $filename;

    if (!file_exists($file_path)) {

        // Create a new file or direcotry 
        mkdir($file_path, 0777, true);
    }
    // file extension
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid extensions
    $valid_ext = array("pdf", "doc", "docx", "jpg", "png", "jpeg");

    $response = 0;
    if (in_array($file_extension, $valid_ext)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = $filename;

            $update = array();
            $update[] = $table . "_pic='" . $filename . "'";

            $sql = "UPDATE " . $table . " SET " . implode(",", $update) . " WHERE " . $table . "_id='" . $_REQUEST["selectid"] . "' ";
            $Query = QueryDB($coreLanguageSQL, $sql);
        }
    }

    echo $response;
    exit;
}
