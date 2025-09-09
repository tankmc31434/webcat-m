<?php
include("../lib/session.php");
include("../lib/connect.php");
include("../lib/function.php");
include("./config.php");
$sql = "SELECT  " . $table . "_pic,".$table."_file  FROM " . $table . " WHERE  " . $table . "_id='" . $_REQUEST['id'] . "' ";
$Query = QueryDB($coreLanguageSQL, $sql);
$Row = FetchArrayDB($coreLanguageSQL, $Query);
$deletepic = $Row[0];
$deletehtml=$Row[1];
$file_path = '../../upload/' . $namefolder;

if(file_exists($file_path."/".$deletepic)) {
    @unlink($file_path."/".$deletepic);
}

######################## Delete  In Folder HTML ###############################
if(file_exists($path_html."/".$deletehtml)) {
    @unlink($path_html."/".$deletehtml);
}

######################### Delete  Contant ###############################
$sql="DELETE FROM ".$table." WHERE ".$table."_id=".$_REQUEST['id']." ";
$Query=QueryDB($coreLanguageSQL,$sql);

logs_access('Delete Tracking');

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