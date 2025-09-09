<!DOCTYPE html>
<?php
include('lib/connect.php');
?>
<?php  ?>
<html lang="en">
<?php
$table = "race";
$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table  . "_title as " . substr("_title", 1)] = "";
$slect_data[$table  . "_kind as " . substr("_kind", 1)] = "";
$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_status as " . substr("_status", 1)] = "";
$slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
$slect_data[$table  . "_file as " . substr("_file", 1)] = "";

$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table . " WHERE " . $table . "_id = '" . $_REQUEST['id'] . "'";
$query = $db->execute($sql);
$val = $query->fields;

$htmlpath = "upload/race/file/" . $val[7];
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
                        <div class="title  text-center">สายพันธุ์แมว</div>
                        <div class="text-center">
                            <a href="index.php" class="link" style="color:white;">หน้าหลัก</a><span style="color:white;"> > สายพันธุ์แมว</span>
                        </div>


                    </div>
                </div>
                <figure class="cover">
                    <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg5.png" alt="bg-home">
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
                                                <? echo dateFormatReal($val[6]) ?>
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
                            <div class="subtitle typo-xl fw-bold text-dark">
                                <? echo $val[2] ?>
                            </div>
                        </div>
                        <?php if (is_file('upload/race/' . $val[4])) { ?>
                        <div class="gallery-block">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="ratio ratio-16x9">
                                        <?php if (is_file('upload/race/' . $val[4])) { ?>
                                            <img src="<?php echo $core_template; ?>upload/race/<? echo $val[4] ?>" alt="" />
                                        <?php } else { ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
<!-- แสดงรายละเอียดสายพันธุ์แมวแต่ละสายพันธุ์ เช่น ชื่อ, ข้อมูล, รูปภาพ, และรายละเอียดเพิ่มเติม โดยดึงข้อมูลจากฐานข้อมูลและไฟล์ที่เกี่ยวข้อง -->

                        <!-- ck editor -->
                        <div class="editor-content">
                            <?php
                            if (is_file($htmlpath)) {

                                $fd = @fopen($htmlpath, "r");
                                $contents = @fread($fd, @filesize($htmlpath));
                                @fclose($fd);

                                echo txtReplaceHTML($contents);
                            }
                            ?>
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