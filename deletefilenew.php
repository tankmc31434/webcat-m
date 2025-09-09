<?php

if (isset($_REQUEST['file'])) {
    // file name
    $filename = $_REQUEST['file'];
    $file_path = './upload/' . $_REQUEST['namefolder'];
    // Location
    $location = './upload/' . $_REQUEST['namefolder'] . '/' . $filename;
    $response = 0;

    if (file_exists($location)) {
    unlink($location);
    $response = 1;
    }

// สำหรับลบไฟล์ที่อัปโหลดในระบบ เช่น รูปภาพคลินิกหรือประกาศ ผ่าน AJAX โดยส่งชื่อไฟล์และโฟลเดอร์มาให้
    echo $response;
    exit;
}
