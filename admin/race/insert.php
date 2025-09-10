<?php
include("../lib/session.php");
include("../lib/connect.php");
include("../lib/function.php");
include("./config.php");

if ($_REQUEST['execute'] == "insert") {
    $randomNumber = rand(1111, 9999);
    $myid = $_REQUEST['myid'];
  
    if (!is_dir($path_html)) {
        mkdir($path_html, 0777);
    }

    if (@file_exists($path_html . "/" . $htmlfiledelete)) {
        @unlink($path_html . "/" . $htmlfiledelete);
    }
    if ($_POST['inputHtml'] != "") {
        $filename = $randomNumber . "-" . $randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
        $fp = fopen($path_html . "/" . $filename, "w");
        chmod($path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }

    $insert = array();
    $insert[$table . "_subject"] = "'" . $_REQUEST["subject"] . "'";
    $insert[$table . "_kind"] = "'" . $_REQUEST['kind'] . "'";
    $insert[$table . "_title"] = "'" . $_REQUEST['titles'] . "'";


    $insert[$table . "_pic"] = "'" . $_REQUEST['filename'] . "'";
    $insert[$table . "_file"] = "'" . $filename . "'";
    $insert[$table . "_credate"] = "NOW()";
    $insert[$table . "_lastdate"] = "NOW()";
    $insert[$table . "_status"] = "'Enable'";



    $sql = "INSERT INTO " . $table . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query = $db->Execute($sql);
    $insertid = $db->Insert_ID();

    $sqlalbum = "INSERT INTO album (album_filename, album_containid) SELECT temp_filename, temp_containid FROM temp WHERE temp_containid = '$myid'";
    $QueryAlbum = $db->Execute($sqlalbum);

    $sqlupdate = "UPDATE album SET album_containid = '$insertid' WHERE album_containid = '$myid'";
    $Queryupdate = $db->Execute($sqlupdate); 

    $sqltemp = "DELETE FORM temp WHEN temp_containid = ''$myid'";
    $Querytemp = $db->Execute($sqltemp);

    logs_access('Insert race');
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