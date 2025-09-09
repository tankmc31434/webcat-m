<?php
include("./lib/session.php");
###################### Start insert logs ##################
###################### End logs ##################

$_SESSION[ "core_session_id"] = 0;
$_SESSION[ "core_session_name"] = "";
$_SESSION[ "core_session_logout"] = "";
"http://".$_SERVER['HTTP_HOST']."/webcat/admin/logout.php"
?>
<script language="JavaScript"  type="text/javascript">
    document.location.href = "http://localhost/webcat/admin/index.php";
</script>
