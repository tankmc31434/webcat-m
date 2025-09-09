<!DOCTYPE html>
<?php include('lib/connect.php');include('lib/session.php'); ?>
<html lang="en">
<?php

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


        <section class="layout-container object-fit-cover" style="background-image: url('./assets/img/background/bgform.png');background-repeat: no-repeat;background-size: cover;">
            <form action="?" method="post" name="myForm" id="myForm">
            <input name="inputHtml" type="hidden" id="inputHtml" value="" />
                <input name="namefolder" type="hidden" id="namefolder" value="clinic" />
                <input name="execute" type="hidden" id="execute" value="insert" />
                <div class="default-page news-page">
                    <div class="news-list" style="padding-top: 16rem;">
                        <div class="container-xl">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center my-3">
                                            <div class="col-sm-12 ">
                                                <h2>ขอความช่วยเหลือแจ้งสัตว์เลี้ยงสูญหาย</h2>
                                            </div>
                                            <div class="col-sm-12 ">
                                                <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png" style="max-height:150px;max-width:250px" alt="profile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-5">
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>ชื่อสัตว์เลี้ยงที่หาย<? echo $title ?><span class="fontContantAlert">*</span> :</h4>
                                                <input type="text" name="subject" id="subject" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>ลักษณะจุดสังเกตสัตว์เลี้ยงโดยย่อ<? echo $title ?> :</h4>
                                                <input type="text" name="titles" id="titles" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col form-group">
                                                <h4>รูปภาพสัตว์เลี้ยง :</h4>
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
                                                <h4>รายละเอียดเพิ่มเติม

ลักษณะเด่น / จุดสังเกต



รายละเอียดการหาย<? echo $title ?> </h4>
                                                <textarea name="des" id="des" class="form-control border"></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col form-group text-center">
                                                <button type="button" onclick="executeSubmit()" style="background-color: #867070;border-radius:5px;color:white; " class="btn btn-lg btn-block my-4">SEND</button>
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
        CKEDITOR.replace('des', {
            extraPlugins: 'filebrowser',
            filebrowserUploadMethod: 'form',
            filebrowserUploadUrl: 'ckupload.php',
            height: 500,

        });

        // Upload file
        function uploadFile() {
            var foldername_up = 'announce';
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
            var foldername_up = 'announce';
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
                var alleditDetail = CKEDITOR.instances.des.getData();
                jQuery('#inputHtml').val(alleditDetail);
            }
            insertNew('insert-announce.php');

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
    </script>
</body>

</html>