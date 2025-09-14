<!DOCTYPE html>
<?php include('lib/connect.php');include('lib/session.php'); ?>
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
            <form action="?" method="post" name="myForm" id="myForm">
            <input name="inputHtml" type="hidden" id="inputHtml" value="" />
                <input name="namefolder" type="hidden" id="namefolder" value="clinic" />
                <input name="execute" type="hidden" id="execute" value="insert" />
                 <input type="text" name="myid" id="myid" value="<?php echo $myid; ?>" style="display: none;">
                <div class="default-page news-page">
                    <div class="news-list" style="padding-top: 16rem;">
                        <div class="container-xl">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center my-3">
                                            <div class="col-sm-12 ">
                                                <h2>คำขอเพิ่มขอความช่วยเหลือ</h2>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png" style="max-height:150px;max-width:250px" alt="profile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-5">
                                        <div class="row my-3">
                                        <div class="col">
                                            <h4>ชื่อสัตว์เลี้ยง<span class="fontContantAlert">*</span> :</h4>
                                            <input type="text" name="subject" id="subject" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>ประเภทของสัตว์เลี้ยง<span class="fontContantAlert">*</span> :</h4>
                                            <select type="text" name="kind" id="kind" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                                <option value="">เลือกประเภทสัตว์เลี้ยง</option>
                                                <option value="สุนัข">สุนัข</option>
                                                <option value="แมว">แมว</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-sm-6">
                                            <h4>เพศ :</h4>
                                            <select type="text" name="sex" id="sex" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                                <option value="">เลือกเพศสัตว์เลี้ยง</option>
                                                <option value="M">เพศผู้</option>
                                                <option value="F">เพศเมีย</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>สายพันธุ์ :</h4>
                                            <input type="text" name="gene" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                            <div class="col form-group">
                                                <h4>รูปภาพของสัตว์เลี้ยง :</h4>
                                                <div>
                                                    <input type="file" name="file" id="file">
                                                    <input type="button" id="btn_uploadfile" value="Upload" onclick="uploadFile();">
                                                </div>
                                                <div class="image py-3" id="img">
                                                    <input type="hidden" name="filename" id="filename" value="" />
                                                    <img src="./assets/img/static/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>ลักษณะ/จุดสังเกต :</h4>
                                            <input type="text" name="spot" id="spot" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>รายละเอียดบริเวณที่หาย :</h4>
                                            <textarea type="text" name="area" style="width: 100%;background-color:#ededed" class="form-control border"></textarea>
                                        </div>
                                    </div>
                                        
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>รายละเอียดเพิ่มเติม<? echo $title ?> :</h4>
                                                <textarea name="des" id="des" class="form-control border"></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                        <div class="col">
                                            <h4>อัลบั้ม :</h4>
                                            <div>
                                                <input type="file" id="images" multiple accept="image/*">
                                                <input type="button" value="Upload" onclick="uploadAlbum();">
                                                <div id="status"></div>
                                                <div id="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row my-3">
                                            <div class="col form-group text-center">
                                                <button type="button" onclick="executeSubmit()" style="background-color: #867070;border-radius:5px;color:white; " class="btn btn-lg btn-block my-4">ส่งข้อมูล</button>
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
            fontSize_sizes: '16/16px;18/18px;20/20px;24/24px;28/28px;32/32px;36/36px;48/48px;',
            toolbar: [
            { name: 'styles', items: [ 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
            { name: 'insert', items: [ 'Image', 'Table' ] },
            { name: 'tools', items: [ 'Maximize' ] }
            ]
        });

        // Upload file
        function uploadFile() {
            var foldername_up = 'track';
            var files = document.getElementById("file").files;
            var locationfile = "./upload/" + foldername_up + "/";

            if (files.length > 0) {

                var formData = new FormData();
                formData.append("file", files[0]);
                formData.append("namefolder", foldername_up);

                var xhttp = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttp.open("POST", "uploadfilenew.php", true);

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
            var foldername_up = 'track';
            if (files.length > 0) {

                var formData = new FormData();
                formData.append("file", files);
                formData.append("namefolder", foldername_up);

                var xhttp = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttp.open("POST", "deletefilenew.php", true);

                // call on request changes state
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var response = this.responseText;
                        if (response == 1) {
                            htmlStr = ' <img src="./assets/img/static/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">';
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

                if (document.myForm.subject.value == '') {
                    document.myForm.subject.focus();
                    jQuery("#subject").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#subject").removeClass("formInputContantTbAlertY");
                }
                if (document.getElementById('kind').value == 0) {
                    document.getElementById('kind').focus();
                    jQuery("#kind").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#kind").removeClass("formInputContantTbAlertY");
                }

                var alleditDetail = CKEDITOR.instances.des.getData();
                jQuery('#inputHtml').val(alleditDetail);
            }
            insertNew('insert-help.php');

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
                }
            });
        }

         function uploadAlbum() {
            let files = document.getElementById("images").files;
            if (files.length === 0) {
                alert("Please select at least one image!");
                return;
            }
            if (files.length > 5) {
                alert("You can upload maximum 5 images only!");
                return;
            }

            let formData = new FormData();
            formData.append("myid", myid);
            for (let i = 0; i < files.length; i++) {
                formData.append("images[]", files[i]);
            }


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "uploadAlbum.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById("preview").innerHTML += this.responseText;
                } else {
                    document.getElementById("status").innerHTML = "Upload failed!";
                }
            };

            xhr.send(formData);
        };

        // ฟังก์ชันลบรูป
        function deleteImage(id, filename) {
            if (!confirm("Delete this image?")) return;
            let formData = new FormData();
            formData.append("id", id);
            formData.append("filename", filename);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "deleteAlbum.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById("img-box-" + id).remove();
                } else {
                    alert("Delete failed!");
                }
            };

            xhr.send(formData);
        }
    </script>
</body>

</html>