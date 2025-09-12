<!DOCTYPE html>
<?php include('lib/connect.php');
include('lib/session.php'); ?>
<html lang="en">
<?php
$myid = rand();
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
            <form action="sentEmail.php" method="post" enctype="multipart/form-data">
                <div class="default-page news-page">
                    <div class="news-list" style="padding-top: 16rem;">
                        <div class="container-xl">

                            <div class="col-12">
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
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>email ผู้รับ<span class="fontContantAlert">*</span> :</h4>
                                                <input type="text" name="email" id="email" style="width: 100%;background-color:#ededed" class="form-control border" value="<?php echo $_REQUEST['email'] ?>"></input>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>หัวข้อ<span class="fontContantAlert">*</span> :</h4>
                                                <input type="text" name="subject" id="subject" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
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
                                                <div class="image py-3" >
                                                    <img id="preview" src="./assets/img/static/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block"  alt="...">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row my-3">
                                            <div class="col form-group text-center">
                                                <button type="submit" style="background-color: #867070;border-radius:5px;color:white; " class="btn btn-lg btn-block my-4">ส่งข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div id="loadCheckComplete"></div>
        </section>


    </div>
    <script>
        myid = document.getElementById("myid").value;

        CKEDITOR.replace('des', {
            extraPlugins: 'filebrowser',
            filebrowserUploadMethod: 'form',
            filebrowserUploadUrl: 'ckupload.php',
            height: 500,

        });


        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = "";
                preview.style.display = 'none';
            }
        }




    </script>
</body>

</html>