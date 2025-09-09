<!DOCTYPE html>
<html lang="en">
<?php include('./config.php');
include('../lib/function.php');
include('../lib/connect.php');
include('../lib/session.php');

$mod_path_office = "../../upload/" . $namefolder;
// Value SQL SELECT #########################

$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table  . "_username as " . substr("_username", 1)] = "";
$slect_data[$table  . "_email as " . substr("_email", 1)] = "";
$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_status as " . substr("_status", 1)] = "";
$slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
$slect_data[$table  . "_lastdate as " . substr("_lastdate", 1)] = "";
$slect_data[$table  . "_fname as " . substr("_fname", 1)] = "";
$slect_data[$table  . "_lname as " . substr("_lname", 1)] = "";
$slect_data[$table  . "_password as " . substr("_password", 1)] = "";

$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table;
$sql .= " WHERE member_id = '" . $_REQUEST['selectid'] . "'";
// print_pre($sql);
$query = QueryDB($coreLanguageSQL, $sql);

$row = FetchArrayDB($coreLanguageSQL, $query);

$valID = $row[0];
$valName = $row[1];
$valEmail = $row[2];
$valStatus = $row[4];
$valFname = $row[7];
$valLname = $row[8];
$valPass = decodeStr($row[9]);
$valDateCredate = dateFormatReal($row[5]);
$valTimeCredate = timeFormatReal($row[5]);
$valPicname = $row[3];
$valPic = $mod_path_office . "/" . $row[3];
if (is_file($valPic)) {
    $valPic = $valPic;
} else {
    $valPic = "../assets/images/nopic.png";
}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Webpet Admin Console</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/CATDOG.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <link href="../assets/css/modify.css" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="../js/script.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td a.view {
            color: #5247b4;
        }

        .image {
            max-height: 350px;
            max-width: 450px;
            margin-top: 1rem;
            position: relative;
            transform: translateX(-50%);
            left: 50%;
        }

        .btn-delete {
            position: absolute;
            left: 96%;
            margin-left: -10px;
            margin-top: 2px;
            cursor: pointer;
            color: white;
            background-color: red;
            border-radius: 50%;
        }

        .inbtn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
        }
    </style>
    
</head>

<body class="skin-default-dark fixed-layout">
    <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
    <input name="selectid" type="hidden" id="selectid" value="<? echo $_REQUEST['selectid'] ?>" />
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Webpet admin</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <?php include('../inc/header.php'); ?>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <?php include('../inc/nav-bar.php'); ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <!-- <h4 class="text-themecolor">Table Basic</h4> -->
                        </div>
                        <div class="col-md-7 align-self-center text-right">
                            <div class="d-flex justify-content-end align-items-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)"><? echo $title ?></a></li>
                                    <li class="breadcrumb-item active">แก้ไขข้อมูล <? echo $title ?></li>
                                </ol>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- column -->

                        <input name="execute" type="hidden" id="execute" value="insert" />
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body" style="border-bottom: #dfdfdf 0.1px solid;">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2>แก้ไขข้อมูล <b><? echo $title ?> </b></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-secondary add-new float-right mx-2" onclick="btnBackPage('index.php')"><i class="material-icons inbtn">arrow_back</i></button>
                                            <button type="button" class="btn btn-success add-new float-right mx-2" onclick="executeSubmit()"><i class="material-icons inbtn">save</i></button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                <div class="row my-3">
                                        <div class="col">
                                            <h4>ชื่อผู้ใช้<span class="fontContantAlert">*</span> : </h4>
                                            <input  type="text" name="Username" id="Username" value="<?php echo $valName ?>" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>รหัสผ่าน<span class="fontContantAlert">*</span> : </h4>
                                            <input  type="text" name="Password" id="Password" value="<?php echo $valPass ?>" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>ชื่อ : </h4>
                                            <input  type="text" name="name" id="name" value="<?php echo $valFname ?>" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>นามสกุล : </h4>
                                            <input  type="text" name="lastname" id="lastname" value="<?php echo $valLname ?>" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>อีเมล : </h4>
                                            <input  type="text" name="email" id="email" value="<?php echo $valEmail ?>" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>รูปภาพคลินิก :</h4>
                                            <div>
                                                <input type="file" name="file" id="file">
                                                <input type="button" id="btn_uploadfile" value="Upload" onclick="uploadFile();">
                                            </div>
                                            <div class="image" id="img">
                                                <?php if (is_file($valPic)) { ?>
                                                    <input type="hidden" name="filename" id="filename" value="<? echo $valPicname ?>" />
                                                    <i class="material-icons btn-delete" onclick="deleteFile();">remove</i>
                                                    <img src="<? echo $valPic ?>" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">
                                                <?php } else { ?>
                                                    <!-- <input type="hidden" name="filename" id="filename" value="" /> -->
                                                    <img src="../assets/images/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2020 Elegent Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
    </form>
    <div id="loadCheckComplete"></div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <script>
        var filenamecheck = document.getElementById("filename").value;
        if (filenamecheck != "") {
            $('#file').attr('disabled', 'disabled');
            $('#btn_uploadfile').attr('disabled', 'disabled');
        } else {
            $('#file').removeAttr('disabled');
            $('#btn_uploadfile').removeAttr('disabled');
        }
    </script>
    <script>
        // Upload file
        function uploadFile() {

            var files = document.getElementById("file").files;
            var locationfile = "../../upload/member/";

            if (files.length > 0) {

                var formData = new FormData();
                formData.append("file", files[0]);

                var xhttp = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttp.open("POST", "uploadfile.php", true);

                // call on request changes state
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var response = this.responseText;
                        if (response != 0) {
                            htmlStr = '<input type="hidden" name="filename" id="filename" value="' + response + '"/><i class="material-icons btn-delete" onclick="deleteFile();">remove</i><img src="' + locationfile + response + '" style="max-height: 350px;max-width: 450px" id="img" class="imgadd rounded mx-auto d-block">';
                            $('#img').html(htmlStr);
                            $('#file').attr('disabled', 'disabled');
                            $('#btn_uploadfile').attr('disabled', 'disabled');

                        } else {
                            alert("File not uploaded.");
                        }
                    }
                };

                // Send request with data
                xhttp.send(formData);

            } else {
                alert("Please select a file");
            }

        }


        // delete file
        function deleteFile() {
            var files = document.getElementById("filename").value;
            if (files.length > 0) {

                var formData = new FormData();
                formData.append("file", files);

                var xhttp = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttp.open("POST", "deletefile.php", true);

                // call on request changes state
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var response = this.responseText;
                        if (response == 1) {
                            htmlStr = ' <img src="../assets/images/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">';
                            $('#img').html(htmlStr);
                            $('#file').removeAttr('disabled');
                            $('#btn_uploadfile').removeAttr('disabled');

                        } else {
                            alert("File not delete.");
                        }
                    }
                };

                // Send request with data
                xhttp.send(formData);

            } else {
                alert("Please select a file");
            }

        }

        // onsubmit
        function executeSubmit() {
            with(document.myForm) {

                if (document.myForm.Username.value == '') {
                    document.myForm.Username.focus();
                    jQuery("#Username").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#Username").removeClass("formInputContantTbAlertY");
                }
                if (document.myForm.Password.value == '') {
                    document.myForm.Password.focus();
                    jQuery("#Password").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#Password").removeClass("formInputContantTbAlertY");
                }
            }
            insertNew('update.php');

        }

        // insert 
        function insertNew(fileAc) {

            var TYPE = "POST";
            var URL = fileAc;
            var dataSet = jQuery("#myForm").serialize();

            jQuery.ajax({
                type: TYPE,
                url: URL,
                data: dataSet,
                success: function(html) {
                    jQuery("#loadCheckComplete").html(html);
                    console.log(html);
                }
            });
        }
    </script>
</body>

</html>