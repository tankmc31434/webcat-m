<?php
include("./lib/session.php");
include("./lib/connect.php");

if ($_REQUEST['execute'] == "insert") {
    $randomNumber = rand(1111, 9999);
    $path_html = 'upload/announce/file';
    if (!is_dir($path_html)) {
        mkdir($path_html, 0777);
    }

    if ($_POST['inputHtml'] != "") {
        $filename = $randomNumber . "-" . $randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
        $fp = fopen($path_html . "/" . $filename, "w");
        chmod($path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }
    $table = 'annouce';
    $insert = array();
    $insert[$table . "_subject"] = "'" . $_REQUEST["subject"] . "'";
    $insert[$table . "_title"] = "'" . $_REQUEST['titles'] . "'";
    $insert[$table . "_pic"] = "'" . $_REQUEST['filename'] . "'";
    $insert[$table . "_file"] = "'" . $filename . "'";
    $insert[$table . "_credate"] = "NOW()";
    $insert[$table . "_lastdate"] = "NOW()";
    $insert[$table . "_status"] = "'Disable'";
    $insert[$table . "_creby"] = "" . $_SESSION["core_session_fid"] . "";



    $sql = "INSERT INTO " . $table . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";

    $Query = $db->execute($sql);

    logs_access('Insert Annouce');
}

include("../lib/disconnect.php");
?>

<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <!-- <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
    <input name="inputTy" type="hidden" id="inputTy" value="<?php echo $_REQUEST['inputTy'] ?>" />
    <input name="inputSubTy" type="hidden" id="inputSubTy" value="<?php echo $_REQUEST['inputSubTy'] ?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php echo  $_REQUEST['inputTh'] ?>" /> -->
</form>
<script language="JavaScript" type="text/javascript">
    document.myFormAction.submit();
</script>
<!-- รับข้อมูลข่าวสารหรือประกาศใหม่จากฟอร์มและบันทึกลงฐานข้อมูล พร้อมสร้างไฟล์เนื้อหา HTML และเปลี่ยนหน้าไปยังหน้าแรกทันที -->