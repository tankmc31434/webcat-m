<?php
include("../lib/session.php");
include("../lib/connect.php");
include("../lib/function.php");
include("./config.php");

if ($_REQUEST['execute'] == "insert") {
	// $randomNumber = rand(1111, 9999);

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

	$update = array();
	$update[] = $table . "_subject='" . $_POST["subject"] . "'";
	$update[] = $table . "_kind='" . $_POST['kind'] . "'";
	$update[] = $table . "_sex='" . $_POST["sex"] . "'";
	$update[] = $table . "_gene='" . $_POST['gene'] . "'";
	$update[] = $table . "_area='" . $_POST["area"] . "'";
	$update[] = $table . "_spot='" . $_POST['spot'] . "'";


	$update[] = $table . "_pic='" . $_POST["filename"] . "'";
	$update[] = $table . "_file='" . $filename. "'";

	$update[] = $table . "_lastdate=NOW()";


	$sql = "UPDATE " . $table . " SET " . implode(",", $update) . " WHERE " . $table . "_id='" . $_POST["selectid"] . "' ";
	$Query = QueryDB($coreLanguageSQL, $sql);

	// $insert = array();
	// 	$insert[$table."_opentime"] = "'".$_REQUEST["OpenTime"]."'";
	// 	$insert[$table."_subject"] = "'".($_REQUEST['Subject'])."'";
	// 	$insert[$table."_province"] = "'".($_REQUEST['Province'])."'";
	// 	$insert[$table."_address"] = "'".($_REQUEST['Address'])."'";
	// 	$insert[$table."_tel"] = "'".($_REQUEST['Tel'])."'";
	// 	$insert[$table."_facebook"] = "'".($_REQUEST['facebook'])."'";
	// 	$insert[$table."_pic"] = "'".($_REQUEST['filename'])."'";
	// 	$insert[$table."_credate"] = "NOW()";
	// 	$insert[$table."_lastdate"] = "NOW()";
	// 	$insert[$table."_status"] = "'Disable'";

	// 	$sql="INSERT INTO ".$table."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
	// 	$Query=$db->Execute($sql);

	logs_access('Update Tracking');
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