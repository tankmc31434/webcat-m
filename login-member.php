<?php
$check_login_status = 1;
include("./lib/connect.php");
include("./lib/session.php");

$inputUser = trim($_POST["inputUsername"]);
$inputPass= trim($_POST["inputPassword"]);


$sqlMaster = "SELECT member_id ,member_fname FROM member WHERE member_username='".$inputUser."' AND member_password='".encodeStr($inputPass)."' AND member_status ='Enable'";
$queryMaster=$db->execute($sqlMaster);
$recordMaster=$queryMaster->_numOfRows;

if($recordMaster>=1) {

	$_SESSION["core_session_flogout"]=1;
	$_SESSION["core_session_fid"]=$queryMaster->fields[0];
	$_SESSION["core_session_fname"]= $queryMaster->fields[1];
	?>
	<script language="JavaScript"  type="text/javascript">
        document.location.href = "./index.php";
    </script>
    <?php
}else{
	?>
	<script language="JavaScript"  type="text/javascript">
		document.myFormLogin.inputUsername.value='';
		document.myFormLogin.inputPassword.value='';
		alert("Login failed. Please check username or password!");
    </script>
    <?php
}

include("./lib/disconnect.php");
?>
<!-- ตรวจสอบข้อมูลสมาชิกและเข้าสู่ระบบ ถ้าข้อมูลถูกต้องจะเข้าสู่ระบบและไปหน้าแรก ถ้าไม่ถูกต้องจะแจ้งเตือนและให้กรอกใหม่ -->