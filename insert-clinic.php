<?php
include("./lib/session.php");
include("./lib/connect.php");

if ($_REQUEST['execute'] == "insert") {
	// $randomNumber = rand(1111, 9999);

	
	$table = "clinic";
	$insert = array();
	$insert[$table . "_opentime"] = "'" . $_REQUEST["OpenTime"] . "'";
	$insert[$table . "_subject"] = "'" . ($_REQUEST['Subject']) . "'";
	$insert[$table . "_province"] = "'" . ($_REQUEST['Province']) . "'";
	$insert[$table . "_address"] = "'" . ($_REQUEST['Address']) . "'";
	$insert[$table . "_tel"] = "'" . ($_REQUEST['Tel']) . "'";
	$insert[$table . "_facebook"] = "'" . ($_REQUEST['facebook']) . "'";
	$insert[$table . "_map"] = "'" . ($_REQUEST['map']) . "'";
	$insert[$table . "_pic"] = "'" . ($_REQUEST['filename']) . "'";
	$insert[$table . "_credate"] = "NOW()";
	$insert[$table . "_lastdate"] = "NOW()";
	$insert[$table . "_status"] = "'Process'";
	$insert[$table."_creby"] = "".$_SESSION["core_session_fid"]."";
	
	$sql = "INSERT INTO " . $table . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
	
	
	$Query = $db->execute($sql);

	logs_access('Insert Clinic');
}

$db->close();
?>

<form action="clinic.php" method="post" name="myFormAction" id="myFormAction">
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
<!-- รับข้อมูลคลินิกจากฟอร์มและบันทึกลงฐานข้อมูล จากนั้นเปลี่ยนหน้าไปยังหน้ารายการคลินิกทันที -->