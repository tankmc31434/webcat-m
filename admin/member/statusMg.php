<?php
include('./config.php');
include('../lib/function.php');
include('../lib/connect.php');
include('../lib/session.php');

$loaddder=$_POST['Valueloaddder'];
$tablename=$_POST['Valuetablename'];
$statusname=$_POST['Valuestatusname'];
$statusid=$_POST['Valuestatusid'];
$loadderstatus=$_POST['Valueloadderstatus'];
$filestatus=$_POST['Valuefilestatus'];

if($statusname=="Enable"){
$inputstatusname="Disable";
$statusoutput = "ปิดใช้งาน";
}else if($statusname=="Disable"){
$inputstatusname="Enable";
$statusoutput = "เปิดใช้งาน";
}
		

     	$sql = "UPDATE ".$tablename." SET "
		.$tablename."_status= '$inputstatusname'  WHERE ".$tablename."_id='". $statusid."'";
		$Query=QueryDB($coreLanguageSQL,$sql);	
		
			
	?>
	<?php if($inputstatusname=="Enable"){ ?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?php echo $loaddder?>','<?php echo $tablename?>','<?php echo $inputstatusname?>','<?php echo $statusid?>','<?php echo $loadderstatus?>','<?php echo $filestatus?>')" ><span class="fontContantTbEnable"><?php echo $statusoutput?></span></a>

                <?php }else{ ?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?php echo $loaddder?>','<?php echo $tablename?>','<?php echo $inputstatusname?>','<?php echo $statusid?>','<?php echo $loadderstatus?>','<?php echo $filestatus?>')" ><span class="fontContantTbDisable"><?php echo $statusoutput?></span></a>
                
                
                <?php } ?>
                
                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?php echo $loaddder?>" />
