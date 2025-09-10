<?php
include("../lib/session.php");
include("../lib/connect.php");
include("../lib/function.php");
include("./config.php");

if (isset($_POST['id']) && isset($_POST['filename'])) {
  $id = intval($_POST['id']);
  $filename = $_POST['filename'];
  $filePath = "../../upload/track/album/" . $filename;

  // ลบจาก database
  $sql = "DELETE FROM albumtrack WHERE albumtrack_id=$id";
  if (QueryDB($coreLanguageSQL, $sql)) {
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
