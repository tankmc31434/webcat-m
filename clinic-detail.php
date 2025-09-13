<!DOCTYPE html>
<?php
include('lib/connect.php');
?>

<html lang="en">
<?php
$table = "clinic";
$table_pro = "province";
$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table  . "_address as " . substr("_address", 1)] = "";
$slect_data[$table  . "_opentime as " . substr("_opentime", 1)] = "";
$slect_data[$table  . "_tel as " . substr("_tel", 1)] = "";
$slect_data[$table  . "_facebook as " . substr("_facebook", 1)] = "";
$slect_data[$table  . "_province as " . substr("_province", 1)] = "";
$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
$slect_data[$table  . "_map as " . substr("_map", 1)] = "";
$slect_data[$table_pro  . "_name as " . substr("_name", 1)] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table . " INNER JOIN " . $table_pro . " ON " . $table . "." . $table . "_province = " . $table_pro . "." . $table_pro . "_id";
$sql .= " WHERE " . $table . "_id = '" . $_REQUEST['id'] . "'";
$query = $db->execute($sql);
$val = $query->fields;
$db->close();

?>

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
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


        <section class="layout-container">
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

            <div class="default-page news-page pb-0" style="margin: 2rem 0;">
                <div class="detail-body">
                    <div class="container-xl">
                        <div class="detail-header">
                            <div class="whead">
                                <div class="row align-items-end">
                                    <div class="col-lg">
                                        <div class="tile typo-xxl fw-bold text-primary mb-sm-3 mb-2"><? echo $val[1] ?></div>
                                    </div>
                                    <div class="col-lg-auto mt-lg-0 mt-sm-4 mt-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-auto pe-md-4">
                                                <? echo dateFormatReal($val[8]) ?>
                                            </div>

                                            <div class="col-lg-auto col-md col-6 text-lg-start text-end ps-0">
                                                <div class="back">
                                                    <a href="javascript: history.go(-1)" class="btn btn-outline-primary btn-lg rounded-pill fw-bold">กลับ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (is_file('upload/clinic/' . $val[7])) { ?>
                            <div class="gallery-block">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="ratio ratio-16x9">
                                            <?php if (is_file('upload/clinic/' . $val[7])) { ?>
                                                <img src="<?php echo $core_template; ?>upload/clinic/<? echo $val[7] ?>" alt="" />
                                            <?php } else { ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- แสดงรายละเอียดสายพันธุ์สุนัขแต่ละสายพันธุ์ เช่น ชื่อ, ข้อมูล, รูปภาพ, และรายละเอียดเพิ่มเติม โดยดึงข้อมูลจากฐานข้อมูลและไฟล์ที่เกี่ยวข้อง -->
                        
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            ชื่อ : <span class="fw-normal text-dark"><? echo $val[1] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            ที่อยู่ : <span class="fw-normal text-dark"><? echo $val[2] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            จังหวัด : <span class="fw-normal text-dark"><? echo $val[10] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            เวลาทำการ : <span class="fw-normal text-dark"><? echo $val[3] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            เบอร์โทร : <span class="fw-normal text-dark"><? echo $val[4] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            แผนที่ : <span class="fw-normal text-dark"><? echo $val[9] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            facebook : <span class="fw-normal text-dark"><? echo $val[5] ?></span>
                        </div>


                    </div>
                </div>
            </div>
        </section>


        <?php include('inc/footer.php'); ?>
    </div>

    <?php include('inc/loadscript.php'); ?>

</body>

</html>