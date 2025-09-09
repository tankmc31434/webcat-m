<!DOCTYPE html>
<?php include('lib/connect.php');include('lib/session.php'); ?>
<html lang="en">
<?php


$table = "annouce";
$module_pagesize = "";
$module_pageshow = "";
$module_orderby = "";
$module_default_pagesize = 9;
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
$slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table  . "_title as " . substr("_title", 1)] = "";
$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_status as " . substr("_status", 1)] = "";
$slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table . " WHERE " . $table . "_status = 'Enable' ";

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
$db->close();

?>

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); ?>
    <style>
        /* [1] The container */
        .img-hover-zoom {
            height: 500px;
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
<!-- ไฟล์นี้ใช้สำหรับแสดงรายการข่าวสารหรือประกาศทั้งหมดในระบบ พร้อมฟังก์ชันค้นหาและแบ่งหน้า ผู้ดูแลสามารถเพิ่มประกาศใหม่ได้ -->
                <div class="default-header">
                    <div class="wrapper">
                        <div class="container">
                            <div class="title  text-center">ประกาศข่าวสารเกี่ยวกับสัตว์เลี้ยง</div>
                            <!-- <div class="text-center txt-desc" style="color: white;line-height: 1.5rem;">สำหรับผู้เลี้ยงสุนัขและแมวมือใหม่ที่คิดจะเลี้ยงสุนัขและแมว อาจจะไม่สามารถแยกสายพันธุ์ของสุนัขและแมวได้ 
                        ไม่ทราบปัญหาเกี่ยวกับวิธีการเลี้ยงดูของสัตว์เลี้ยง และนิสัยของสุนัขและแมวแต่ละสายพันธุ์ ทำให้เกิดปัญหามากมายเกี่ยวกับสุขภาพของสุนัขและแมว 
                        ทำให้สุนัขและแมวมีอายุที่สั้นลงหรือถูกเลี้ยงแบบผิดวิธี ดังนั้นจึงพัฒนาเว็บแอปพลิเคชันเพื่อรวบรวมข้อมูลการเลี้ยงสุนัขและแมวและการให้คำแนะนำเกี่ยวกับอาการของสุนัขและแมว 
                        และประเมินอาการเบื้องต้นเมื่อสุนัขและแมวมีอาการผิดปกติ เพื่อที่จะได้รับการดูแลที่ถูกวิธีและทำให้สุนัขและแมวมีอายุที่ยืนยาวมากขึ้น รวมทั้งสามารถหาคลินิครักษาสัตว์ ร้านอาหารที่ใกล้บ้าน 
                        และสามารถตามหาสุนัขและแมวในกรณีสูญหายได้</div> -->
                        </div>
                    </div>
                    <figure class="cover">
                        <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg1.png" alt="bg-home">
                    </figure>

                </div>

                <div class="default-page news-page" style="margin: 6rem 0;">

                    <div class="news-list">
                        <div class="container-xl">
                            <div class="row" style="margin-bottom: 1.5rem;">
                                <!-- column -->
                                <div class="col"></div>
                                <? if ($_SESSION['core_session_flogout'] >= 1) { ?>
                                <div class="col-2 ">
                                    <button type="button" onClick="location.href='announce-form.php'" class="btn shadow-lg float-end" style="background-color: #ffff;height:38px;min-width:auto;line-height:0;border-radius:5px">
                                        <i class="fa fa-plus-square" style="color: green;"></i>
                                        <span style="font-size: 1rem;">เพิ่มข้อมูล</span>
                                    </button>
                                </div>
                                <?}?>
                                <div class="col-4">
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
                                <ul class="item-list">
                                    <? foreach ($query as $Key) { ?>
                                        <li style="width: 33%;">
                                            <a href="announce-detail.php?id=<?php echo $Key[0] ?>" class="link">
                                                <div class="card" style="background-color: white;">
                                                    <div class="thumbnail">
                                                        <figure class="cover">
                                                            <?php if (is_file('upload/announce/' . $Key[3])) { ?>
                                                                <img class="img-cover" src="<?php echo $core_template; ?>upload/announce/<?php echo $Key[3] ?>" real="" alt="">
                                                            <?php } else { ?>
                                                                <img class="img-cover" src="<?php echo $core_template; ?>assets/img/static/nopic.png" real="" alt="">
                                                            <?php } ?>
                                                        </figure>
                                                    </div>
                                                    <div class="card-body px-0 px-3">
                                                        <p class="title typo-md text-primary fw-bold"><?php echo $Key[1] ?></p>
                                                        <p class="desc typo-default"><?php echo $Key[2] ?></p>
                                                        <div class="row align-items-center gutters-10">
                                                            <div class="col">
                                                                <p class="date typo-default text-secondary mt-3"><?php echo dateFormatReal($Key[5]) ?></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="material-symbols-rounded mt-3">chevron_right</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
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

</body>

</html>