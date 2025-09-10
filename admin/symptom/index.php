<!DOCTYPE html>
<html lang="en">
<?php
include('./config.php');
include('../lib/function.php');
include('../lib/connect.php');
include('../lib/session.php');

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

        /* Add a color to the cancel button */
        .cancelbtn {
            background-color: #ccc;
            color: black;
        }

        /* Add a color to the delete button */
        .deletebtn {
            background-color: #f44336;
        }

        /* Add padding and center-align text to the container */
        .container {
            padding: 16px;
            text-align: center;
        }
    </style>
</head>

<body class="skin-default-dark fixed-layout">
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
            <?php
            $module_pagesize = "";
            $module_pageshow = "";
            $module_orderby = "";
            $module_default_pagesize = 10;
            $module_default_pageshow = 1;
            $module_sort_number = "ASC";
            $mod_path_office = "../../upload/" . $namefolder;

            if ($module_pagesize == "") {
                $module_pagesize = $module_default_pagesize;
            }
            if ($module_pageshow == "") {
                $module_pageshow = $module_default_pageshow;
            }

            if ($_REQUEST['module_pagesize'] == "") {
                $module_pagesize = $module_default_pagesize;
            } else {
                $module_pagesize = $_REQUEST['module_pagesize'];
            }

            if ($_REQUEST['module_pageshow'] == "") {
                $module_pageshow = $module_default_pageshow;
            } else {
                $module_pageshow = $_REQUEST['module_pageshow'];
            }

            if ($module_orderby == "") {
                $module_orderby = $table . "_id";
            }
            if ($_REQUEST['module_adesc'] == "") {
                $module_adesc = $module_sort_number;
            } else {
                $module_adesc = $_REQUEST['module_adesc'];
            }

            if ($_REQUEST['search'] != "") {
                $search = trim($_REQUEST['search']);
            } else {
                $search = $_REQUEST['search'];
            }
            if ($_REQUEST['kind'] != "") {
                $group = trim($_REQUEST['kind']);
            } else {
                $group = $_REQUEST['kind'];
            }
            // if ($_REQUEST['group'] != "") {
            //     $group = trim($_REQUEST['group']);
            // } else {
            //     $group = $_REQUEST['group'];
            // }
            ?>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <form action="?" method="post" name="myForm" id="myForm">
                    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $module_pageshow ?>" />
                    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $module_pagesize ?>" />
                    <input name="selectid" type="hidden" id="selectid" value="" />
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h4 class="text-themecolor">อาการป่วย</h4>
                        </div>
                        <div class="col-md-7 align-self-center text-right">
                            <div class="d-flex justify-content-end align-items-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active"><? echo $title ?></li>
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

                        <div style="width: 50%;padding:10px;">
                            <div class="form-group">
                                <select name="kind" id="kind" onchange="document.myForm.submit();" class="form-control">
                                    <option value="" <?php if($group == "") { ?> selected <?php } ?>>เลือกประเภทสัตว์เลี้ยง</option>
                                    <option value="สุนัข" <?php if($group == "สุนัข") { ?> selected <?php } ?>>สุนัข</option>
                                    <option value="แมว" <?php if($group == "แมว") { ?> selected <?php } ?>>แมว</option>
                                </select>
                            </div>
                        </div>
                        <div style="width: 47%;padding:10px;">
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหา" value="<?php echo  trim($_REQUEST['search']) ?>">
                            </div>

                        </div>
                        <div style="width: 3%;padding:10px;">
                            <button type="button" class="btn btn-info add-new" onClick="document.myForm.submit();"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="row">
                        <!-- column -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2><? echo $title ?> <b><? echo $description ?></b></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-info add-new float-right" onclick="location.href='add.php'"><i class="fa fa-plus"></i> เพิ่มข้อมูล</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th width="12%">ชื่ออาการ</th>
                                                    <th width="8%" class="text-center">ประเภทสัตว์เลี้ยง</th>
                                                    <th width="8%" class="text-center">สถานะ</th>
                                                    <th width="8%" class="text-center">วันที่สร้าง</th>
                                                    <th width="12%" class="text-center">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Value SQL SELECT #########################
                                                $slect_data = array();
                                                $slect_data[$table . "_id as " . substr("_id", 1)] = "";
                                                $slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
                                                $slect_data[$table  . "_status as " . substr("_status", 1)] = "";
                                                $slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
                                                $slect_data[$table  . "_kind as " . substr("_kind", 1)] = "";


                                                $sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table;

                                                if ($_REQUEST['kind'] != "") {
                                                    $sql = $sql . "  WHERE " . $table . "_kind ='" . $_REQUEST['kind'] . "'   ";
                                                }


                                                if ($search <> "") {
                                                    $sql = $sql . "  AND  (
                                                    " . $table . "_subject LIKE '%$search%'
                                                    ) ";
                                                }

                                                $query = QueryDB($coreLanguageSQL, $sql);

                                                $count_totalrecord = NumRowsDB($coreLanguageSQL, $query);
                                                // Find max page size #########################
                                                if ($count_totalrecord > $module_pagesize) {
                                                    $numberofpage = ceil($count_totalrecord / $module_pagesize);
                                                } else {
                                                    $numberofpage = 1;
                                                }

                                                // Recover page show into range #########################
                                                if ($module_pageshow > $numberofpage) {
                                                    $module_pageshow = $numberofpage;
                                                }

                                                // Select only paging range #########################
                                                $recordstart = ($module_pageshow - 1) * $module_pagesize;

                                                $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
                                                $query = QueryDB($coreLanguageSQL, $sql);

                                                $count_record = NumRowsDB($coreLanguageSQL, $query);

                                                $index = 1;

                                                if ($count_record > 0) {
                                                    while ($index < $count_record + 1) {
                                                        $row = FetchArrayDB($coreLanguageSQL, $query);
                                                        $valID = $row[0];
                                                        $valName = $row[1];
                                                        $valStatus = $row[2];
                                                        $valKind = $row[4];
                                                        $valDateCredate = dateFormatReal($row[5]);
                                                        $valTimeCredate = timeFormatReal($row[5]);

                                                        if ($valStatus == "Enable") {
                                                            $valStatusClass = "fontContantTbEnable";
                                                        } else if ($valStatus == "Disable") {
                                                            $valStatusClass = "fontContantTbDisable";
                                                        }


                                                ?>


                                                        <tr>
                                                            <td><?php echo $index ?></td>
                                                            <td><?php echo $valName ?></td>
                                                            <td class="text-center"><?php echo $valKind ?></td>
                                                            <td class="text-center">
                                                                <div id="load_status<?php echo  $valID ?>">
                                                                    <?php if ($valStatus == "Enable") { ?>

                                                                        <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?php echo  $valID ?>', '<?php echo  $table ?>', '<?php echo  $valStatus ?>', '<?php echo  $valID ?>', 'load_status<?php echo  $valID ?>', '../<?php echo  $namefolder ?>/statusMg.php')"><span class="<?php echo  $valStatusClass ?>">เปิดใช้งาน</span></a>
                                                                    <?php } else if ($valStatus == "Disable") { ?>

                                                                        <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?php echo  $valID ?>', '<?php echo  $table ?>', '<?php echo  $valStatus ?>', '<?php echo  $valID ?>', 'load_status<?php echo  $valID ?>', '../<?php echo  $namefolder ?>/statusMg.php')"> <span class="<?php echo  $valStatusClass ?>">ปิดใช้งาน</span> </a>

                                                                    <?php } ?>

                                                                    <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waiting<?php echo  $valID ?>" />
                                                                </div>
                                                            </td>
                                                            <td class="text-center"><?php echo $valDateCredate ?></td>
                                                            <td class="text-center">
                                                                <a class="view" title="View" data-toggle="tooltip" onclick="
                                                                document.myForm.selectid.value=<?php echo  $valID ?>;
                                                                editContactNew('viewContant.php');">
                                                                    <i class="material-icons">visibility</i>
                                                                </a>
                                                                <a class="edit" title="Edit" data-toggle="tooltip" onclick="
                                                                document.myForm.selectid.value=<?php echo  $valID ?>;
                                                                editContactNew('editContant.php');"><i class="material-icons">&#xE254;</i></a>
                                                                <a class="delete" title="Delete" data-toggle="tooltip"><i data-ids="<?php echo  $valID ?>" data-names="<?php echo  $valName ?>" class="material-icons launchConfirm" data-target="#deleteModal" data-toggle="modal">&#xE872;</i></a>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $index++;
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">ไม่มีข้อมูล</td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        <nav aria-label="Page navigation" class="float-right">
                                            <ul class="pagination">

                                                <?php if ($module_pageshow > 1) {
                                                    $valPrePage = $module_pageshow - 1;
                                                ?>
                                                    <li class="page-item"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $valPrePage ?>'; document.myForm.submit();">ก่อนหน้า</button></li>
                                                <?php } else { ?>
                                                    <li class="page-item"><button class="page-link dis-mod" disabled>ก่อนหน้า</button></li>
                                                <?php } ?>
                                                <?php
                                                $limitpage = $module_pageshow + 3;
                                                for ($i = $module_pageshow; $i <= $numberofpage; $i++) {
                                                    if ($i < $limitpage) {
                                                ?>
                                                        <li class="page-item <?php if ($i == $module_pageshow) { ?>active<?php } ?>"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $i ?>'; document.myForm.submit();"><? echo $i ?></button></li>
                                                <?php }
                                                } ?>

                                                <?php if ($module_pageshow < $numberofpage) {
                                                    $valNextPage = $module_pageshow + 1;
                                                ?>
                                                    <li class="page-item"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $valNextPage ?>'; document.myForm.submit();">ถัดไป</button></li>
                                                <?php } else { ?>
                                                    <li class="page-item"><button class="page-link dis-mod" disabled>ถัดไป</button></li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </form>
                <div id="loadCheckComplete"></div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>ลบข้อมูล <?php echo $title ?></b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="text-con"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger deletes" data-id="">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include("../lib/disconnect.php"); ?>
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
        const changeText = document.querySelector("#text-con");
        $('.launchConfirm').on('click', function(e) {
            var id = $(this).attr('data-ids');
            var name = $(this).attr('data-names');
            $('.deletes').attr('data-id', id);
            changeText.textContent = "ต้องการลบข้อมูล " + name + " หรือไม่?";
        });

        $('.deletes').on('click', function(e) {
            var TYPE = "POST";
            var URL = "delete.php";
            var id = $('.deletes').attr('data-id');
            jQuery.ajax({
                type: TYPE,
                url: URL,
                data: {
                    id: id
                },
                success: function(html) {

                    jQuery("#loadCheckComplete").show();
                    jQuery("#loadCheckComplete").html(html);

                }
            });
        });
    </script>
</body>

</html>