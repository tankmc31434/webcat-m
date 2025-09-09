<?php
include('./lib/connect.php');
include('./lib/session.php');


$tablename = 'track';
$sql = "UPDATE " . $tablename . " SET "
    . $tablename . "_status= 'Success' ";

$sql .= "," . $tablename . "_lastdate= NOW() ";

$sql .= " WHERE " . $tablename . "_id='" . $_REQUEST['selectid'] . "'";
$Query = QueryDB($coreLanguageSQL, $sql);

?>

<form action="history.php" method="post" name="myFormAction" id="myFormAction">
</form>
<script language="JavaScript" type="text/javascript">
    document.myFormAction.submit();
</script>
<!-- ใช้สำหรับอัปเดตสถานะการติดตาม (track) ให้สำเร็จ และเปลี่ยนหน้าไปยังประวัติการติดตามทันที -->