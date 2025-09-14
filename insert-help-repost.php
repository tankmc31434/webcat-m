<?php
include('lib/connect.php'); // ใช้ $db เชื่อม MySQL

header('Content-Type: application/json');

try {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $fileName = null;

    // ✅ จัดการอัปโหลดไฟล์
    if (!empty($_FILES['attachment']['name'])) {
        $targetDir = "upload/track/repost/";
        $fileName = time() . "_" . basename($_FILES["attachment"]["name"]);
        $targetFile = $targetDir . $fileName;
        move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFile);
    }

    // ✅ บันทึกลงฐานข้อมูล
    $sql = "INSERT INTO track_repost (track_repost_subject, track_repost_text, track_repost_pic, track_repost_cid, track_repost_credate)
            VALUES (?, ?, ?, ?, NOW())";
    $db->Execute($sql, array($subject, $message, $fileName, $_POST['cid']));

    echo json_encode(["success" => true, "message" => "บันทึกสำเร็จ"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
