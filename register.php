<!DOCTYPE html>
<?php include('lib/connect.php'); ?>
<html lang="en">
<?php

?>
<style>
    /* ...existing code... */

    .form-control-lg {
        height: 10px;
        /* ปรับความสูงตามต้องการ */
        font-size: 1.25rem;


    }
</style>

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); ?>
    <script language="JavaScript" type="text/javascript">
        jQuery(function () {
            jQuery('form#myFormLogin').submit(function () {

                with (document.myFormLogin) {
                    if (inputUsername.value == '') {
                        inputUsername.focus();
                        return false;
                    }
                    if (inputPassword.value == '') {
                        inputPassword.focus();
                        return false;
                    }
                }
                registerUser();
                return false;
            });
        });
    </script>
    <style>
        .form-floating>.form-control:not(:placeholder-shown)~label,
        .form-floating>.form-control:focus~label {
            transform: scale(.85) translateY(-0.8rem) translateX(.15rem);
            opacity: .9;
            background: transparent !important;
            /* ✅ label โปร่งใส */
            color: #fff;
            /* หรือเปลี่ยนสีตัวอักษร label ให้ contrast กับ bg */
        }



        /*แสดงฟอร์มสมัครสมาชิก มีการตรวจสอบข้อมูลเบื้องต้นด้วย JavaScript 
        /* [1] The container */
        ื่ .img-hover-zoom {
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

<body
    style="background-image: url('./assets/img/background/bgform.png');background-repeat: no-repeat;background-size: cover;">

    <div class="global-container">
        <?php include('inc/header.php'); ?>


        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                        <div class="card bg-transparent text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <form action="javascript:void(0);" method="post" name="myFormLogin" id="myFormLogin">
                                    <input name="execute" type="hidden" id="execute" value="insert" />
                                    <div class="mt-md-4 pb-5">
                                        <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png"
                                            style="max-height:150px;max-width:250px" alt="profile" />
                                        <h2 class="fw-bold mb-2 text-uppercase">สมัครสมาชิก</h2>
                                        <div class="form-floating mb-4">
                                            <input type="text" name="inputUsername" id="inputUsername"
                                                class="form-control form-control-lg" placeholder=""
                                                autocomplete="username" />
                                            <label for="inputUsername" class="text-dark">ชื่อผู้ใช้</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" name="inputPassword" id="inputPassword"
                                                class="form-control form-control-lg" placeholder=""
                                                autocomplete="new-password" />
                                            <label for="inputPassword" class="text-dark">รหัสผ่าน</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="text" name="inputFname" id="inputFname"
                                                class="form-control form-control-lg" placeholder=""
                                                autocomplete="off" />
                                            <label for="inputFname" class="text-dark">ชื่อ</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="text" name="inputLname" id="inputLname"
                                                class="form-control form-control-lg" placeholder=""
                                                autocomplete="off" />
                                            <label for="inputLname" class="text-dark">นามสกุล</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="email" name="inputEmail" id="inputEmail"
                                                class="form-control form-control-lg" placeholder=""
                                                autocomplete="off" />
                                            <label for="inputEmail" class="text-dark">อีเมล</label>
                                            <!-- ไฟล์นี้ใช้สำหรับให้ผู้ใช้สมัครสมาชิกใหม่ในระบบ โดยกรอกข้อมูลส่วนตัวและส่งข้อมูลผ่านฟอร์ม -->
                                        </div>
                                        <button class="btn btn-outline-light btn-lg px-5"
                                            style="background-color: #867070;color:white;border-radius:5px"
                                            type="submit">ยืนยัน</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>

</body>

</html>