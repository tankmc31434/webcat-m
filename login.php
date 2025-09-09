<!DOCTYPE html>
<?php include('lib/connect.php'); ?>
<html lang="en">
<?php

?>

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); ?>
    <script language="JavaScript" type="text/javascript">
        jQuery(function() {
            jQuery('form#myFormLogin').submit(function() {

                with(document.myFormLogin) {
                    if (inputUsername.value == '') {
                        inputUsername.focus();
                        return false;
                    }
                    if (inputPassword.value == '') {
                        inputPassword.focus();
                        return false;
                    }
                }
                checkLoginUser();
                return false;
            });
        });
    </script>
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

<body style="background-image: url('./assets/img/background/bgform.png');background-repeat: no-repeat;background-size: cover;">

    <div class="global-container">
        <?php include('inc/header.php'); ?>


        <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="javascript:void(0);" method="post" name="myFormLogin" id="myFormLogin">
                                <div class=" mt-md-4 pb-5">
                                <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png" style="max-height:150px;max-width:250px" alt="profile" />
                                    <h2 class="fw-bold mb-2 text-uppercase">เข้าสู้ระบบ</h2>
                                    
                                    <p class="text-white-50 mb-5">กรุณากรอกชื่อผู้ใช้และรหัสผ่าน</p>
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="inputUsername" id="inputUsername" class="form-control form-control-lg" placeholder="Username" autocomplete="off" />
                                    </div>
                                    <div class="form-outline form-white">
                                        <input type="password" name="inputPassword" id="inputPassword" class="form-control form-control-lg" placeholder="Password" autocomplete="off" />
                                    </div>
                                    <div class="form-outline form-white mb-5" style="text-align: left!important;margin-top:1rem;">
                                        <a href="register.php" style="text-decoration: none;color: white!important;"><small>สมัครสมาชิก</small></a>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" style="background-color: #867070;color:white;border-radius:5px" type="submit">เข้าสู่ระบบ</button>
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