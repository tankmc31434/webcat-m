<!DOCTYPE html>
<?php include('lib/connect.php');include('lib/session.php'); ?>
<html lang="en">
<?php


$table = "clinic";
$table_pro = "province";
$module_pagesize = "";
$module_pageshow = "";
$module_orderby = "";
$module_default_pagesize = 5;
$module_default_pageshow = 1;

if ($module_pagesize == "") {
    $module_pagesize = $module_default_pagesize;
}
if ($_REQUEST['module_pageshow'] == "") {
    $module_pageshow = $module_default_pageshow;
} else {
    $module_pageshow = $_REQUEST['module_pageshow'];
}
if ($_REQUEST['search'] != "") {
    $search = trim($_REQUEST['search']);
} else {
    $search = $_REQUEST['search'];
}
if ($_REQUEST['group'] != "") {
    $group = trim($_REQUEST['group']);
} else {
    $group = $_REQUEST['group'];
}
$pagination = [];
$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table  . "_address as " . substr("_address", 1)] = "";
$slect_data[$table  . "_opentime as " . substr("_opentime", 1)] = "";
$slect_data[$table  . "_tel as " . substr("_tel", 1)] = "";
$slect_data[$table  . "_facebook as " . substr("_facebook", 1)] = "";
$slect_data[$table  . "_province as " . substr("_province", 1)] = "";
$slect_data[$table_pro  . "_name as " . substr("_name", 1)] = "";
$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
$slect_data[$table  . "_map as " . substr("_map", 1)] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table . " INNER JOIN " . $table_pro . " ON " . $table . "." . $table . "_province = " . $table_pro . "." . $table_pro . "_id";
$sql .= " WHERE clinic_status = 'Enable'";

if ($_REQUEST['group'] >= 1) {
    $sql = $sql . "  AND " . $table_pro . "_id ='" . $_REQUEST['group'] . "'   ";
}
if ($search <> "") {
    $sql = $sql . "  AND  (
    " . $table . "_subject LIKE '%$search%'
    ) ";
}

$sql .= "ORDER BY " . $table . "_id DESC ";
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
$sql .= "LIMIT $recordstart , $module_pagesize";

$query = QueryDB($coreLanguageSQL, $sql);
// print_pre($sql);
$count_record = NumRowsDB($coreLanguageSQL, $query);



?>

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); ?>
    <style>
        /* [1] The container */
        .img-hover-zoom {
            height: 300px;
            /* [1.1] Set it as per your need */
            overflow: hidden;
            /* [1.2] Hide the overflowing of child elements */
        }

        /* [2] Transition property for smooth transformation of images */
        .img-hover-zoom img {
            transition: transform .3s ease;
        }

        /* [3] Finally, transforming the image when container gets hovered */
        .img-hover-zoom:hover img {
            transform: scale(1.2);
        }
    </style>
</head>

<body>

    <div class="global-container">
        <?php include('inc/header.php'); ?>


        <section class="layout-container ">
            <form action="?" method="post" name="myForm" id="myForm">
                <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $module_pageshow ?>" />
                <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $module_pagesize ?>" />

                <div class="default-header">
                    <div class="wrapper">
                        <div class="container">
                            <div class="title  text-center">สถานที่รักษาสัตว์</div>
                            <div class="text-center txt-desc" style="color: white;line-height: 1.5rem;"> มาตรฐานสถานพยาบาลสัตว์ในประเทศไทย เป็นโครงการที่ริเริ่มโดยคณะทำงานในสมาคมสัตวแพทย์ผู้ประกอบการบำบัดโรคสัตว์แห่งประเทศไทยในปี 2553 เป้าหมายของโครงการนั้นคือการที่คนใน วิชาชีพเองจะได้ช่วยกันทำให้เกิดคุณภาพของการให้บริการการรักษาสัตว์เป็นหนึ่งเดียวกัน มีเกณฑ์วัดที่มีความหมาย อยู่ในระดับเดียวกับสากลและที่สำคัญ ทำให้เกิดขึ้นได้จริงในประเทศไทย</div>
                        </div>
                    </div>
                    <figure class="cover">
                        <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg3.png" alt="bg-home">
                    </figure>

                </div>

                <div class="default-page news-page" style="margin: 6rem 0;">

                    <div class="news-list">
                        <div class="container-xl">
                            <div class="row" style="margin-bottom: 1.5rem;">
                                <!-- column -->
                                <div class="col"></div>
                                <? if ($_SESSION['core_session_flogout'] >= 1) { ?><div class="col-2 ">
                                    <button type="button" onClick="location.href='clinic-form.php'" class="btn shadow-lg float-end" style="background-color: #ffff;height:38px;min-width:auto;line-height:0;border-radius:5px">
                                        <i class="fa fa-plus-square" style="color: green;"></i>
                                        <span style="font-size: 1rem;">เพิ่มข้อมูล</span>
                                    </button>
                                </div>
                                <? } ?>
                                <div class="col-3">
                                
                                    <div class="form-group">
                                        <select name="group" id="group" onchange="document.myForm.submit();" class="form-control">
                                            <option value="">เลือกจังหวัด</option>
                                            <?php
                                            $sql_group = "SELECT ";
                                            $sql_group .= "  " . $table_pro . "_id," . $table_pro . "_name FROM " . $table_pro;

                                            $query_group = QueryDB($coreLanguageSQL, $sql_group);

                                            while ($row_group = FetchArrayDB($coreLanguageSQL, $query_group)) {
                                                $row_groupid = $row_group[0];
                                                $row_groupname = $row_group[1];
                                            ?>
                                                <option value="<?php echo  $row_groupid ?>" <?php if ($_REQUEST['group'] == $row_groupid) { ?> selected="selected" <?php } ?>><?php echo  $row_groupname ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="ค้นหา" value="<?php echo  trim($_REQUEST['search']) ?>">
                                    </div>
                                </div>

                                <div class="col-1">
                                    <button type="button" onClick="document.myForm.submit();" class="btn shadow-lg" style="background-color: #ffff;height:38px;min-width:auto;line-height:0;border-radius:5px">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <?php if ($count_totalrecord > 0) { ?>
                                <div class="container">
                                    <div class="row my-2">
                                        <? foreach ($query as $Key) { ?>
                                            <div class="col-xl-12">
                                                <div class="card mb-3 card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <?php if (is_file('upload/clinic/' . $Key[8])) { ?>
                                                                <img style="height:300px;width:320px" src="<?php echo $core_template; ?>upload/clinic/<?php echo $Key[8] ?>" class="width-90 rounded-3" alt="">
                                                            <?php } else { ?>
                                                                <img style="height:300px;width:320px" src="<?php echo $core_template; ?>assets/img/static/nopic.png" class="width-90 rounded-3" alt="">
                                                            <?php } ?>


                                                        </div>
                                                        <div class="col">
                                                            <div class="overflow-hidden flex-nowrap">
                                                                <h3 class="mb-1">
                                                                    <b>ชื่อ : <? echo $Key[1] ?></b>
                                                                </h3>
                                                                <br /><br />
                                                                <h6 class="mb-1">
                                                                    ที่อยู่ : <? echo $Key[2] ?>
                                                                </h6>
                                                                <h6 class="mb-1">
                                                                    จังหวัด : <? echo $Key[7] ?>
                                                                </h6>
                                                                <h6 class="mb-1">
                                                                    เวลาทำการ : <? echo ($Key[3]); ?>
                                                                </h6>
                                                                <h6 class="mb-1">
                                                                    เบอร์โทร : <? echo ($Key[4]); ?>
                                                                </h6>
                                                                <h6 class="mb-1">
                                                                    แผนที่ : <? echo ($Key[10]); ?>
                                                                </h6>
                                                                <h6 class="mb-1">
                                                                    Facebook : <? echo ($Key[5]); ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } ?>

                                    </div>

                                </div>
                            <? } else { ?>
                                <p class="text-center">ไม่มีข้อมูล</p>
                            <? } ?>

                        </div>

                        <?php if ($count_totalrecord > 0) { ?>
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4 text-center">
                                    <nav aria-label="Page navigation" class="text-center" style="width: 35%;position: absolute;left: 0px;height: 40px;width: 100%;display: flex;justify-content: center">
                                        <ul class="pagination">

                                            <?php if ($module_pageshow > 1) {
                                                $valPrePage = $module_pageshow - 1;
                                            ?>
                                                <li class="page-item"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $valPrePage ?>'; document.myForm.submit();">
                                                        < </button>
                                                </li>
                                            <?php } else { ?>
                                                <li class="page-item"><button class="page-link dis-mod" disabled>
                                                        < </button>
                                                </li>
                                            <?php } ?>
                                            <?php
                                            $limitpage = $module_pageshow + 3;
                                            $limitpage2 = $numberofpage - 3;
                                            if ($module_pageshow < $numberofpage) {
                                                for ($i = $module_pageshow; $i <= $numberofpage; $i++) {
                                                    if ($i < $limitpage) {
                                            ?>
                                                        <li class="page-item <?php if ($i == $module_pageshow) { ?>active<?php } ?>"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $i ?>'; document.myForm.submit();"><? echo $i ?></button></li>
                                                    <?php }
                                                }
                                            } else if ($module_pageshow == $numberofpage) {
                                                for ($i = 1; $i <= $module_pageshow; $i++) {
                                                    ?>
                                                    <li class="page-item <?php if ($i == $module_pageshow) { ?>active<?php } ?>"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $i ?>'; document.myForm.submit();"><? echo $i ?></button></li>
                                            <? }
                                            } ?>

                                            <?php if ($module_pageshow < $numberofpage) {
                                                $valNextPage = $module_pageshow + 1;
                                            ?>
                                                <li class="page-item"><button class="page-link" onclick="document.myForm.module_pageshow.value='<?php echo  $valNextPage ?>'; document.myForm.submit();">></button></li>
                                            <?php } else { ?>
                                                <li class="page-item"><button class="page-link dis-mod" disabled>></button></li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </form>
        </section>


        <?php include('inc/footer.php'); ?>
    </div>
<?php $db->close(); ?>
</body>

</html>