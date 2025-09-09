<!DOCTYPE html>
<?php include('lib/connect.php');
include('lib/session.php'); ?>
<html lang="en">
<?php


$table = "race";
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

$pagination = [];
$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table . "_title as " . substr("_title", 1)] = "";
$slect_data[$table . "_kind as " . substr("_kind", 1)] = "";
$slect_data[$table . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table . "_credate as " . substr("_credate", 1)] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table;
$sql .= " WHERE race_status = 'Enable' AND race_kind = 'สุนัข'";

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
        <!-- แสดงรายการสายพันธุ์สุนัขทั้งหมดในระบบ พร้อมฟังก์ชันค้นหาและแบ่งหน้า ผู้ใช้สามารถดูรายละเอียดสายพันธุ์แต่ละตัวได้ -->

        <section class="layout-container ">
            <form action="?" method="post" name="myForm" id="myForm">
                <input name="module_pageshow" type="hidden" id="module_pageshow"
                    value="<?php echo $module_pageshow ?>" />
                <input name="module_pagesize" type="hidden" id="module_pagesize"
                    value="<?php echo $module_pagesize ?>" />

                <div class="default-header">
                    <div class="wrapper">
                        <div class="container">
                            <div class="title  text-center">สายพันธุ์สุนัข</div>
                            <div class="text-center txt-desc" style="color: white;line-height: 1.5rem;"> หมา
                                หรือคำสุภาพว่า สุนัข (ชื่อวิทยาศาสตร์: Canis familiaris หรือ Canis lupus familiaris)
                                เป็นลูกหลานหมาป่าที่ปรับตัวเป็นสัตว์เลี้ยงที่มักชูหางขึ้นสูง
                                หมาสืบสายพันธุ์จากหมาป่าโบราณที่สูญพันธ์แล้ว
                                และญาติใกล้ชิดกับหมาที่สุดที่ยังมีชีวิตอยู่คือหมาป่าสมัยใหม่
                                หมาเป็นสัตว์สปีชีส์แรกที่ถูกปรับเป็นสัตว์เลี้ยง ให้กับคนเก็บของป่าล่าสัตว์เมื่อมากกว่า
                                15,000 ปีก่อน ซึ่งอยู่ก่อนหน้าการพัฒนาด้านเกษตรกรรม
                                เนื่องจากมีส่วนเกี่ยวข้องกับมนุษย์เป็นเวลายาวนาน
                                ทำให้หมากลายเป็นสัตว์เลี้ยงของคนจำนวนมาก มีอิทธิพลต่อสังคมมนุษย์จนทำให้มันได้รับฉายา
                                "เพื่อนที่ดีที่สุดของมนุษย์"</div>
                        </div>
                    </div>
                    <figure class="cover">
                        <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg6.png"
                            alt="bg-home">
                    </figure>

                </div>

                <div class="default-page news-page" style="margin: 6rem 0;">

                    <div class="news-list">
                        <div class="container-xl">
                            <div class="row" style="margin-bottom: 1.5rem;">
                                <!-- column -->
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="search" name="search"
                                            placeholder="ค้นหา" value="<?php echo trim($_REQUEST['search']) ?>">
                                    </div>
                                </div>

                                <div class="col-1">
                                    <button type="button" onClick="document.myForm.submit();" class="btn shadow-lg"
                                        style="background-color: #ffff;height:38px;min-width:auto;line-height:0;border-radius:5px">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <?php if ($count_totalrecord > 0) { ?>
                                <div class="row">
                                    <div class="row col-12">
                                        <? foreach ($query as $Key) { ?>
                                            <div class="col-xl-12">
                                                <div class="card mb-3 card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <?php if (is_file('upload/race/' . $Key[4])) { ?>
                                                                <img style="height:300px;width:320px"
                                                                    src="<?php echo $core_template; ?>upload/race/<?php echo $Key[4] ?>"
                                                                    class="width-90 rounded-3" alt="">
                                                            <?php } else { ?>
                                                                <img style="height:300px;width:320px"
                                                                    src="<?php echo $core_template; ?>assets/img/static/nopic.png"
                                                                    class="width-90 rounded-3" alt="">
                                                            <?php } ?>


                                                        </div>
                                                        <div class="col" style="height:300px;width:320px">
                                                            <div class="overflow-hidden flex-nowrap">
                                                                <h3 class="mb-1">
                                                                    <b><? echo $Key[1] ?></b>
                                                                </h3>
                                                                <br /><br />
                                                                <h6 class="mb-1">
                                                                    <? echo $Key[2] ?>
                                                                </h6>
                                                                <button type="button"
                                                                    onclick="location.href='race-dog-detail.php?id=<?php echo $Key[0] ?>'"
                                                                    class="btn"
                                                                    style="position: absolute;right:    10px;bottom:   10px;">
                                                                    อ่านต่อ..
                                                                </button>
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

                        <?php
                        $counter = 0;
                        foreach ($data as $item) {
                            if ($counter % 3 == 0) {
                                echo '<div class="row mb-4">';
                            }
                            ?>
                            <div class="col-4"></div>
                            <div class="col-4 text-center">
                                <nav aria-label="Page navigation" class="text-center"
                                    style="width: 35%;position: absolute;left: 0px;height: 40px;width: 100%;display: flex;justify-content: center">
                                    <ul class="pagination">

                                        <?php if ($module_pageshow > 1) {
                                            $valPrePage = $module_pageshow - 1;
                                            ?>
                                            <li class="page-item"><button class="page-link"
                                                    onclick="document.myForm.module_pageshow.value='<?php echo $valPrePage ?>'; document.myForm.submit();">
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
                                                    <li class="page-item <?php if ($i == $module_pageshow) { ?>active<?php } ?>"><button
                                                            class="page-link"
                                                            onclick="document.myForm.module_pageshow.value='<?php echo $i ?>'; document.myForm.submit();"><? echo $i ?></button>
                                                    </li>
                                                <?php }
                                            }
                                        } else if ($module_pageshow == $numberofpage) {
                                            for ($i = 1; $i <= $module_pageshow; $i++) {
                                                ?>
                                                    <li class="page-item <?php if ($i == $module_pageshow) { ?>active<?php } ?>"><button
                                                            class="page-link"
                                                            onclick="document.myForm.module_pageshow.value='<?php echo $i ?>'; document.myForm.submit();"><? echo $i ?></button>
                                                    </li>
                                            <? }
                                        } ?>

                                        <?php if ($module_pageshow < $numberofpage) {
                                            $valNextPage = $module_pageshow + 1;
                                            ?>
                                            <li class="page-item"><button class="page-link"
                                                    onclick="document.myForm.module_pageshow.value='<?php echo $valNextPage ?>'; document.myForm.submit();">></button>
                                            </li>
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