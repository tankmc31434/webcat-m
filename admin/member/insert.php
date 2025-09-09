<?php
include("../lib/session.php");
include("../lib/connect.php");
include("../lib/function.php");
include("./config.php");

if ($_REQUEST['execute'] == "insert") {
    // $randomNumber = rand(1111, 9999);

    $insert = array();
		$insert[$table."_username"] = "'".$_REQUEST["Username"]."'";
		$insert[$table."_password"] = "'".(encodeStr($_REQUEST['Password']))."'";
		$insert[$table."_fname"] = "'".($_REQUEST['name'])."'";
		$insert[$table."_lname"] = "'".($_REQUEST['lastname'])."'";
		$insert[$table."_email"] = "'".($_REQUEST['email'])."'";
		$insert[$table."_pic"] = "'".($_REQUEST['filename'])."'";
		$insert[$table."_credate"] = "NOW()";
		$insert[$table."_lastdate"] = "NOW()";
		$insert[$table."_status"] = "'Disable'";

		$sql="INSERT INTO ".$table."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=$db->Execute($sql);

        logs_access('Insert Member');
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