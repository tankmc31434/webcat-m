<?php
$check_login_status = 1;
include("./lib/session.php");
include("./lib/connect.php");
include("./lib/function.php");


$inputUser = trim($_POST["inputUsername"]);
$inputPass= trim($_POST["inputPassword"]);


$sqlMaster = "SELECT staff_id FROM staff WHERE staff_username='".$inputUser."' AND staff_password='".$inputPass."' ";
$queryMaster=$db->Execute($sqlMaster);
$recordMaster=$queryMaster->_numOfRows;

if($recordMaster>=1) {

	$_SESSION["core_session_logout"]=1;
	$_SESSION["core_session_id"]=0;
	$_SESSION["core_session_name"]= "Private Member";
	$_SESSION["core_session_level"]="SuperAdmin";
	$_SESSION["core_session_language"]="Thai";
	?>
	<script language="JavaScript"  type="text/javascript">
        document.location.href = "./home.php";
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
