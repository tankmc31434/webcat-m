<?php
include("./lib/session.php");
include("./lib/connect.php");

if (isset($_POST['id']) && isset($_POST['filename'])) {
  $id = intval($_POST['id']);
  $filename = $_POST['filename'];
  $filePath = "./upload/track/album/" . $filename;

  // ลบจาก database
  $sql = "DELETE FROM albumtrack WHERE albumtrack_id=$id";
  if ($db->execute($sql)) {
    // ลบไฟล์จริง
    if (file_exists($filePath)) {
      unlink($filePath);
    
    }
    echo "Deleted";
  } else {
    http_response_code(500);
    echo "Error deleting";
  }
}
