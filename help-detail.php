<!DOCTYPE html>
<?php
include('lib/connect.php');
?>
<html lang="en">
<?php
$table = "track";
$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table  . "_title as " . substr("_title", 1)] = "";
$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_status as " . substr("_status", 1)] = "";
$slect_data[$table  . "_credate as " . substr("_credate", 1)] = "";
$slect_data[$table  . "_file as " . substr("_file", 1)] = "";
$slect_data[$table  . "_kind as " . substr("_kind", 1)] = "";
$slect_data[$table  . "_sex as " . substr("_sex", 1)] = "";
$slect_data[$table  . "_gene as " . substr("_gene", 1)] = "";
$slect_data[$table  . "_area as " . substr("_area", 1)] = "";
$slect_data[$table  . "_spot as " . substr("_spot", 1)] = "";
$slect_data[$table  . "_email as " . substr("_email", 1)] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table . " WHERE " . $table . "_id = '" . $_REQUEST['id'] . "'";
$query = $db->execute($sql);
$val = $query->fields;

$htmlpath = "upload/track/file/" . $val[6];
$db->close();




if ($val[8] == 'M') {
    $valSex = 'เพศผู้';
} else if ($val[8] == 'F') {
    $valSex = 'เพศเมีย';
}
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

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .gallery img {
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        .lightbox span {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 40px;
            color: white;
            cursor: pointer;
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
                        <div class="title  text-center">แจ้งสัตว์เลี้ยงสูญหาย</div>
                        <div class="text-center">
                            <a href="index.php" class="link" style="color:white;">หน้าหลัก</a><span style="color:white;"> >แจ้งสัตว์เลี้ยงสูญหาย</span>
                        </div>


                    </div>
                </div>
                <figure class="cover">
                    <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg-home.png" alt="bg-home">
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
                                                <? echo dateFormatReal($val[5]) ?>
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
                        <?php if (is_file('upload/track/' . $val[3])) { ?>
                            <div class="gallery-block">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="ratio ratio-16x9">
                                            <?php if (is_file('upload/track/' . $val[3])) { ?>
                                                <img src="<?php echo $core_template; ?>upload/track/<? echo $val[3] ?>" alt="" />
                                            <?php } else { ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            ประเภทสัตว์เลี้ยง : <span class="fw-normal text-dark"><? echo $val[7] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            สายพันธุ์ : <span class="fw-normal text-dark"><? echo $val[9] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            เพศ : <span class="fw-normal text-dark"><? echo $valSex ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            จุดสังเกตุ : <span class="fw-normal text-dark"><? echo $val[11] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            บริเวณหาย : <span class="fw-normal text-dark"><? echo $val[10] ?></span>
                        </div>
                        <div class="subtitle typo-sm fw-bold text-secondary">
                            อีเมลติดต่อ : <span class="fw-normal text-dark"><a href="mailto:<? echo $val[12] ?>" target="_blank"><? echo $val[12] ?></a></span>
                        </div>


                        <!-- ck editor -->
                        <div class="editor-content">
                            <div class="subtitle typo-sm fw-bold text-secondary">
                                รายละเอียดเพิ่มเติม : <span class="fw-normal text-dark"></span>
                            </div>
                            <?php
                            if (is_file($htmlpath)) {

                                $fd = @fopen($htmlpath, "r");
                                $contents = @fread($fd, @filesize($htmlpath));
                                @fclose($fd);

                                echo txtReplaceHTML($contents);
                            }
                            ?>
                        </div>

                        <div class="subtitle typo-sm fw-bold text-secondary">
                            รูปเพิ่มเติม : <span class="fw-normal text-dark"></span>
                        </div>
                        <div class="gallery">

                            

                        </div>
                        <!-- Lightbox -->
                        <div class="lightbox">
                            <span>&times;</span>
                            <img src="">
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <?php include('inc/footer.php'); ?>
    </div>

    <?php include('inc/loadscript.php'); ?>
    <script>
        $(document).ready(function() {
            $(".gallery img").click(function() {
                let src = $(this).attr("src");
                $(".lightbox img").attr("src", src);
                $(".lightbox").fadeIn();
            });
            $(".lightbox span, .lightbox").click(function(e) {
                if (e.target !== this) return; // ป้องกันคลิกที่รูปแล้วปิด
                $(".lightbox").fadeOut();
            });
        });
    </script>

</body>

</html>