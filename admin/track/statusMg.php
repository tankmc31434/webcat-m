<?php
include('./config.php');
include('../lib/function.php');
include('../lib/connect.php');
include('../lib/session.php');

$loaddder = $_POST['Valueloaddder'];
$tablename = $_POST['Valuetablename'];
$statusname = $_POST['Valuestatusname'];
$statusid = $_POST['Valuestatusid'];
$loadderstatus = $_POST['Valueloadderstatus'];
$filestatus = $_POST['Valuefilestatus'];

if ($statusname == "Approve") {
    $inputstatusname = "Denine";
    $statusoutput = "ไม่อนุมัติ";
} else if ($statusname == "Denine") {
    $inputstatusname = "Success";
    $statusoutput = "สำเร็จ";
} else if ($statusname == "Success") {
    $inputstatusname = "Approve";
    $statusoutput = "อนุมัติ";
}


$sql = "UPDATE " . $tablename . " SET "
    . $tablename . "_status= '$inputstatusname' ";

if ($statusname == "Denine"){
    $sql .= ",". $tablename . "_lastdate= NOW() ";
}

$sql .= " WHERE " . $tablename . "_id='" . $statusid . "'";
$Query = QueryDB($coreLanguageSQL, $sql);


?>
<?php if ($inputstatusname == "Approve") { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?php echo $loaddder ?>','<?php echo $tablename ?>','<?php echo $inputstatusname ?>','<?php echo $statusid ?>','<?php echo $loadderstatus ?>','<?php echo $filestatus ?>')"><span class="fontContantTbEnable"><?php echo $statusoutput ?></span></a>

<?php } else if ($inputstatusname == "Denine") { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?php echo $loaddder ?>','<?php echo $tablename ?>','<?php echo $inputstatusname ?>','<?php echo $statusid ?>','<?php echo $loadderstatus ?>','<?php echo $filestatus ?>')"><span class="fontContantTbDisable"><?php echo $statusoutput ?></span></a>
<?php } else { ?>
    <a href="javascript:void(0)" onclick="changeStatus('<?php echo $loaddder ?>','<?php echo $tablename ?>','<?php echo $inputstatusname ?>','<?php echo $statusid ?>','<?php echo $loadderstatus ?>','<?php echo $filestatus ?>')"><span class="fontContantTbSuccess"><?php echo $statusoutput ?></span></a>
<?php } ?>

<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="<?php echo $loaddder ?>" />