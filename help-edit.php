<!DOCTYPE html>
<?php include('lib/connect.php');include('lib/session.php'); ?>
<html lang="en">
<?php
$myid = rand();
$namefolder = "track";
$mod_path_office = "./upload/" . $namefolder;
$path_html = './upload/track/file';
// Value SQL SELECT #########################
$table = "track";
$slect_data = array();
$slect_data[$table . "_id as " . substr("_id", 1)] = "";
$slect_data[$table  . "_subject as " . substr("_subject", 1)] = "";
$slect_data[$table  . "_kind as " . substr("_kind", 1)] = "";
$slect_data[$table  . "_gene as " . substr("_gene", 1)] = "";
$slect_data[$table  . "_sex as " . substr("_sex", 1)] = "";
$slect_data[$table  . "_area as " . substr("_area", 1)] = "";
$slect_data[$table  . "_spot as " . substr("_spot", 1)] = "";

$slect_data[$table  . "_pic as " . substr("_pic", 1)] = "";
$slect_data[$table  . "_file as " . substr("_file", 1)] = "";
$slect_data[$table  . "_email as " . substr("_email", 1)] = "";
$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . " FROM " . $table;
$sql .= " WHERE track_id = '" . $_REQUEST['id'] . "'";
// print_pre($sql);
$query = QueryDB($coreLanguageSQL, $sql);

$row = FetchArrayDB($coreLanguageSQL, $query);
$valID = $row[0];
$valName = $row[1];
$valKind = $row[2];
$valGene = $row[3];
$valSex = $row[4];
$valArea = $row[5];
$valSpot = $row[6];
$valPicname = $row[7];
$valPic = $mod_path_office . "/" . $row[7];
// if (is_file($valPic)) {
//     $valPic = $valPic;
// } else {
//     $valPic = "../assets/images/nopic.png";
// }
$valHtml = $path_html . "/" .$row[8];
$valhtmlname = $row[8];
$valEmail = $row[9];

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
                <input name="selectid" type="hidden" id="selectid" value="<? echo $_REQUEST['id'] ?>" />
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
                                                <h2>แก้ไขข้อมูล ขอความช่วยเหลือ</h2>
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
                                            <input value="<?php echo $valName ?>" type="text" name="subject" id="subject" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>ประเภทของสัตว์เลี้ยง<span class="fontContantAlert">*</span> :</h4>
                                            <select type="text" name="kind" id="kind" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                                <option value="" <?php if($valKind == ""){ ?> selected  <?php } ?>>เลือกประเภทสัตว์เลี้ยง</option>
                                                <option value="สุนัข" <?php if($valKind == "สุนัข"){ ?> selected  <?php } ?>>สุนัข</option>
                                                <option value="แมว" <?php if($valKind == "แมว"){ ?> selected  <?php } ?>>แมว</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-sm-6">
                                            <h4>เพศ :</h4>
                                            <select type="text" name="sex" id="sex" style="width: 100%;height:36px;background-color:#ededed" class="form-control border border-4 rounded">
                                                 <option value="" <?php if($valSex == ""){ ?> selected  <?php } ?>>เลือกประเภทสัตว์เลี้ยง</option>
                                                <option value="M" <?php if($valSex == "M"){ ?> selected  <?php } ?>>เพศผู้</option>
                                                <option value="F" <?php if($valSex == "F"){ ?> selected  <?php } ?>>เพศเมีย</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>สายพันธุ์ :</h4>
                                            <input value="<?php echo $valGene ?>" type="text" name="gene" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
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
                                                    <?php if (is_file($valPic)) { ?>
                                                    <input type="hidden" name="filename" id="filename" value="<? echo $valPicname ?>" />
                                                    <i class="material-icons btn-delete" onclick="deleteFile();">remove</i>
                                                    <img src="<? echo $valPic ?>" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">
                                                <?php } else { ?>
                                                    <!-- <input type="hidden" name="filename" id="filename" value="" /> -->
                                                    <img src="./assets/img/static/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>ลักษณะ/จุดสังเกต :</h4>
                                            <input value="<?php echo $valSpot ?>" type="text" name="spot" id="spot" style="width: 100%;height:36px;background-color:#ededed" class="form-control border">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col">
                                            <h4>รายละเอียดบริเวณที่หาย :</h4>
                                            <textarea type="text" name="area" style="width: 100%;background-color:#ededed" class="form-control border"><?php echo $valGene ?></textarea>
                                        </div>
                                    </div>
                                        
                                        <div class="row my-3">
                                            <div class="col">
                                                <h4>รายละเอียดเพิ่มเติม<? echo $title ?> :</h4>
                                                <textarea name="des" id="des" class="form-control border"> 
                                                    <?php
                                            if (is_file($valHtml)) {
                                                $fd = @fopen($valHtml, "r");
                                                $contents = @fread($fd, @filesize($valHtml));
                                                @fclose($fd);
                                                echo txtReplaceHTML($contents);
                                            }
                                            ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                        <div class="col">
                                            <h4>อัลบั้ม :</h4>
                                            <div>
                                                <input type="file" id="images" multiple accept="image/*">
                                                <input type="button" value="Upload" onclick="uploadAlbum();">
                                                <div id="status"></div>
                                                <div id="preview">
                                                    <?php
                                                    // โหลดรูปจาก DB มาแสดงตอนเปิดหน้า
                                                    $sqlalbum = "SELECT * FROM albumtrack WHERE albumtrack_containid = ".$valID." ORDER BY albumtrack_id DESC";
                                                    $result = QueryDB($coreLanguageSQL, $sqlalbum);
                                                    $count_record = NumRowsDB($coreLanguageSQL, $result);
                                                    $index = 1;
                                                    if ($count_record > 0) {
                                                        
                                                        while ($index < $count_record + 1) {
                                                            $rowalbum = FetchArrayDB($coreLanguageSQL, $result);
                                                            $id = $rowalbum['albumtrack_id'];
                                                            $filename = $rowalbum['albumtrack_filename'];
                                                            $path = "./upload/track/album/" . $filename;
                                                            echo "<div class='image-box' id='img-box-$id'>
                                                            <img src='$path' alt='$filename' style=\"max-height: 350px;max-width: 450px\">
                                                            <i class=\"material-icons btn-delete\" onclick=\"deleteImage($id, '$filename');\">remove</i>
                                                            </div>";
                                                            $index++;
                                                        }
                                                    } else {
                                                        echo "<p>No images yet.</p>";
                                                    }
                                                    ?>
                                                </div>
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

            var files = document.getElementById("file").files;
            var locationfile = "./upload/track/";
            var idselect = document.getElementById("selectid").value;
            if (files.length > 0) {

                var formData = new FormData();
                formData.append("file", files[0]);
                formData.append("id", idselect);
                var xhttp = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttp.open("POST", "uploadfile.php", true);

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
            var idselect = document.getElementById("selectid").value;
            if (files.length > 0) {

                var formData = new FormData();
                formData.append("file", files);
                formData.append("id", idselect);
                var xhttp = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttp.open("POST", "deletefile.php", true);

                // call on request changes state
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var response = this.responseText;
                        if (response == 1) {
                            htmlStr = ' <img src="./assets/images/nopic.png" style="max-height: 350px;max-width: 450px" class="imgadd rounded mx-auto d-block" alt="...">';
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
            insertNew('update.php');

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
                    console.log(html);
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
            formData.append("myid", document.getElementById('selectid').value); // ส่ง myid ไปด้วย
            for (let i = 0; i < files.length; i++) {
                formData.append("images[]", files[i]);
            }


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "uploadAlbumuedit.php", true);

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
            xhr.open("POST", "deleteAlbumedit.php", true);

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