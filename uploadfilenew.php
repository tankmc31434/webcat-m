<?php

if (isset($_FILES['file']['name'])) {
    // file name
    $rand = rand();
    $filename = $_REQUEST['namefolder'] . '-' . $rand . '-' . $_FILES['file']['name'];
    $file_path = './upload/' . $_REQUEST['namefolder'];
    // Location
    $location = './upload/' . $_REQUEST['namefolder'] . '/' . $filename;

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
        }
    }
// อัปโหลดไฟล์ (เช่น รูปภาพหรือเอกสาร) ไปยังโฟลเดอร์ที่กำหนดในระบบ โดยตรวจสอบชนิดไฟล์และสร้างชื่อไฟล์ใหม่เพื่อป้องกันชื่อซ้ำ
    echo $response;
    exit;
}
