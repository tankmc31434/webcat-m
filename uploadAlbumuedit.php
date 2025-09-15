<?php
include("./lib/session.php");
include("./lib/connect.php");

if (!empty($_FILES['images']['name'][0])) {
  if (count($_FILES['images']['name']) > 5) {
    die("Max 5 images allowed!");
  }

  foreach ($_FILES['images']['name'] as $key => $name) {
    $tmp_name = $_FILES['images']['tmp_name'][$key];
    $error    = $_FILES['images']['error'][$key];
    $myid = $_POST['myid'];
    if ($error === UPLOAD_ERR_OK) {
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      $newName = uniqid() . "." . strtolower($ext);
      $uploadPath = "./upload/track/album/" . $newName;
      if (move_uploaded_file($tmp_name, $uploadPath)) {
        $sql = "INSERT INTO albumtrack (albumtrack_filename,albumtrack_containid) VALUES ('$newName','$myid')";
        
        $Query = $db->Execute($sql);
        $lastId = $db->Insert_ID();
          echo "<div class='image-box' id='img-box-$lastId'>
                  <img src='$uploadPath' alt='$newName' style=\"max-height: 350px;max-width: 450px\">
                  <i class=\"material-icons btn-delete\" onclick=\"deleteImage($lastId, '$newName');\">remove</i>
                </div>";
        
      }
    }
  }
}
?>
