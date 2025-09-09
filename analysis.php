<!DOCTYPE html>
<?php
include("./lib/session.php");
include('lib/connect.php'); ?>
<html lang="en">
<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); // ต้องมี jQuery ?>
</head>
<body>
<div class="global-container">
    <?php include('inc/header.php'); ?>

    <section class="layout-container ">
        <div class="default-header">
            <div class="wrapper">
                <div class="container">
                    <div class="title text-center">วิเคราะห์โรค</div>
                    <div class="text-center txt-desc" style="color: white;line-height: 1.5rem;"></div>
                </div>
            </div>
            <figure class="cover">
                <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg-home.png" alt="bg-home">
            </figure>
        </div>

        <div class="student-page" style="margin: 6rem 0;">
            <div class="information-system">
                <div class="container-xl">
                    <form action="?" method="post" name="myForm" id="myForm">

                        <div class="row py-2">
                            <div class="col text-center">
                                <i class="fa fa-paw" style="color: #867070;font-size:5rem;" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div id="questionans">
                            <div class="row py-5">
                                <div class="col text-center">
                                    <div class="subtitle typo-xl fw-bold text-secondary">
                                        <input type="hidden" name="id" id="id" value="">
                                        <p class="text-center titile-question">สัตว์เลี้ยงของคุณคือ ประเภทไหน ?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col text-center choice-question">
                                    <div class="form-check form-check-inline mx-5 typo-lg">
                                        <input class="form-check-input" type="radio" name="question" id="inlineRadio1" value="สุนัข" checked>
                                        <label class="form-check-label" for="inlineRadio1"><b>สุนัข</b></label>
                                    </div>
                                    <div class="form-check form-check-inline mx-5 typo-lg">
                                        <input class="form-check-input" type="radio" name="question" id="inlineRadio2" value="แมว">
                                        <label class="form-check-label" for="inlineRadio2"><b>แมว</b></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-5 my-5">
                                <div class="col text-center">
                                    <button class="btn" type="button" onclick="StepValue();" style="background-color: white;border-radius:5px;border:3px solid #867070">ถัดไป</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>

    <?php include('inc/footer.php'); ?>
</div>

<script>
function StepValue() {
    var TYPE = "POST";
    var URL  = "./analysis-select.php";

    var new_value = document.querySelector('input[name="question"]:checked').value;
    var id        = document.getElementById("id").value || "";

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: { new_value: new_value, id: id },
        success: function(html) {
            jQuery("#questionans").html(html);
            // หมายเหตุ: ฝั่ง PHP จะส่ง hidden#id ตัวใหม่กลับมาเองในรอบถัดไป
        },
        error: function(xhr) {
            alert("เกิดข้อผิดพลาด: " + (xhr.status || "") + " " + (xhr.statusText || ""));
        }
    });
}
</script>
</body>
</html>
<!-- เริ่มต้นกระบวนการวิเคราะห์โรค โดยให้ผู้ใช้เลือกประเภทสัตว์เลี้ยงก่อน จากนั้นจะดำเนินการถามอาการทีละข้อผ่าน AJAX ไปยังไฟล์ analysis-select.php เพื่อวิเคราะห์โรคต่อไป -->