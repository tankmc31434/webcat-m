<!DOCTYPE html>
<?php include('lib/connect.php');
include('lib/session.php'); ?>
<html lang="en">
<?php
$myid = rand();

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




if ($val[8] == 'M') {
    $valSex = 'เพศผู้';
} else if ($val[8] == 'F') {
    $valSex = 'เพศเมีย';
} else {
    $valSex = 'ไม่ระบุ';
}
?>

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); ?>
    <script src="./ckeditor/ckeditor.js"></script>
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
    </style>
</head>

<body>

    <div class="global-container">
        <?php include('inc/header.php'); ?>

        <!-- ให้ผู้ใช้กรอกข้อมูลเพื่อขอความช่วยเหลือสัตว์เลี้ยงหาย โดยมีฟอร์มกรอกข้อมูลและอัปโหลดรูปภาพ พร้อมส่งข้อมูลไปบันทึกผ่าน AJAX -->
        <section class="layout-container object-fit-cover" style="background-image: url('./assets/img/background/bgform.png');background-repeat: no-repeat;background-size: cover;">
            <form id="lostPetForm" enctype="multipart/form-data">
                <div class="default-page news-page">
                    <div class="news-list" style="padding-top: 16rem;">
                        <div class="container-xl">

                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <div class="card mb-4 shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <?php if (is_file('upload/track/' . $val['pic'])) { ?>
                                                        <img src="<?php echo $core_template; ?>upload/track/<?php echo $val['pic'] ?>" class="img-cover lazy loaded" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo $core_template; ?>assets/img/static/nopic.png" class="img-cover lazy loaded" alt="">
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-8 d-flex align-items-center">
                                                    <p class="card-text">
                                                        <b><?php echo $val['subject']; ?></b><br>
                                                        <b>สายพันธุ์:</b> <?php echo $val['gene']; ?><br>
                                                        <b>เพศ:</b> <?php echo $valSex; ?><br>
                                                        <b>พื้นที่:</b> <?php echo $val['area']; ?><br>
                                                        <b>ตำแหน่ง:</b> <?php echo $val['spot']; ?><br>
                                                        <b>วันที่หาย:</b> <?php echo $val['credate']; ?><br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center my-3">
                                            <div class="col-sm-12 ">
                                                <h2>แจ้งเบาะแส สัตว์เลี้ยงสูญหาย</h2>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png" style="max-height:150px;max-width:250px" alt="profile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-5">
                                        <div class="row my-3 " style="display:none">
                                            <div class="col">
                                                <h4>อีเมลผู้แจ้ง<span class="fontContantAlert">*</span> :</h4>
                                                <input type="text" name="email" id="email" style=" width: 100%;background-color:#ededed" class="form-control border" value="<?php echo $_REQUEST['email'] ?>"></input>
                                                 <input type="text" name="cid" id="cid" style=" width: 100%;background-color:#ededed" class="form-control border" value="<?php echo $_REQUEST['id'] ?>"></input>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>หัวข้อ<span class="fontContantAlert">*</span> :</h4>
                                                <input type="text" name="subject" id="subject" style="width: 100%;height:36px;background-color:#ededed" class="form-control border" value="เจอเบาะแส <?php echo $val['subject'] ?>">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>ข้อความ :</h4>
                                                <textarea type="text" name="message" id="message" style="width: 100%;background-color:#ededed" class="form-control border"></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col form-group">
                                                <h4>รูปภาพเบาะแส :</h4>
                                                <div>
                                                    <input type="file" name="attachment" accept="image/*" onchange="previewImage(event)">
                                                </div>
                                                <div class="image py-3">
                                                    <img id="preview" src="./assets/img/static/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row my-3">
                                            <div class="col form-group text-center">
                                                <button type="button" id="btnSubmit" style="background-color: #867070;border-radius:5px;color:white; " class="btn btn-lg btn-block my-4">ส่งข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div id="resultMessage"></div>
            <div id="loadCheckComplete"></div>
        </section>


    </div>
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = "./assets/img/static/nopic.png";
            }
        }

        document.getElementById("btnSubmit").addEventListener("click", function() {
            let form = document.getElementById("lostPetForm");
            let formData = new FormData(form);

            // ✅ เรียก PHP เพื่อบันทึกลงฐานข้อมูลก่อน
            fetch("insert-help-repost.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(res => {
                    if (res.success) {
                        // ✅ ถ้าบันทึกสำเร็จ → ส่งอีเมล
                        return fetch("sentEmail.php", {
                            method: "POST",
                            body: formData
                        });
                    } else {
                        throw new Error(res.message);
                    }
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById("resultMessage").innerHTML =
                        `<div class="alert alert-success">${data}</div>`;
                    form.reset();
                    document.getElementById("preview").src = "./assets/img/static/nopic.png";
                })
                .catch(error => {
                    document.getElementById("resultMessage").innerHTML =
                        `<div class="alert alert-danger">เกิดข้อผิดพลาด: ${error.message}</div>`;
                });
        });
    </script>

</body>

</html>