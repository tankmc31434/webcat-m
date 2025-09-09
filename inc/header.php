<?
include("./lib/session.php");
?>
<header class="layout-header">
    <div id="loadCheckComplete"></div>
    <nav class="navbar navbar-expand-xl" style="background-color:#C9ACAC">
        <div class="container-xl">
            <a class="navbar-brand animate__animated animate__slideInDown" href="index.php">
                <div class="vstack gap-xxl-3 gap-2">
                    <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png" class="brand" />
                </div>
            </a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="menu-mobile-btn">
                <a href="javascript:void(0);" class="btn-mobile" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bar active"></span>
                    <span class="bar active"></span>
                    <span class="bar active"></span>
                    <span class="bar active"></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-lg-baseline me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/webcat/index.php") { ?>  active  <?php   }  ?>>" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/webcat/announce.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/announce-detail.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/announce-form.php") { ?>  active  <?php   }  ?>" aria-current="page" href="announce.php">ข่าวสาร</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/webcat/analysis.php") { ?>  active  <?php   }  ?>" aria-current="page" href="analysis.php">วิเคราะห์โรคสัตว์เลี้ยง</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle 
                        <?php
                        if (
                            $_SERVER['SCRIPT_NAME'] == "/webcat/race-dog.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/disease-dog.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/race-cat.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/disease-cat.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/clinic.php"
                            || $_SERVER['SCRIPT_NAME'] == "/webcat/race-dog-detail.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/disease-dog-detail.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/race-cat-detail.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/disease-cat-detail.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/clinic-form.php"
                        ) { ?>  active  <?php   }  ?>" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">ข้อมูลสัตว์</a>
                        <ul class="dropdown-menu submenu-level-2" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="race-dog.php">สายพันธุ์สุนัข</a></li>
                            <li><a class="dropdown-item" href="disease-dog.php">โรคภัยในสุนัข</a></li>
                            <li><a class="dropdown-item" href="race-cat.php">สายพันธุ์แมว</a></li>
                            <li><a class="dropdown-item" href="disease-cat.php">โรคภัยในแมว</a></li>
                            <li><a class="dropdown-item" href="clinic.php">สถานที่รักษาสัตว์</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/webcat/help.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/help-detail.php" || $_SERVER['SCRIPT_NAME'] == "/webcat/help-form.php") { ?>  active  <?php   }  ?>" aria-current="page" href="help.php">แจ้งสัตว์เลี้ยงสูญหาย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] == "/webcat/contact.php") { ?>  active  <?php   }  ?>" aria-current="page" href="contact.php">ติดต่อเรา</a>
                    </li>
                    <? if ($_SESSION['core_session_flogout'] >= 1) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> <? echo ($_SESSION['core_session_fname']) ?></a>
                            <ul class="dropdown-menu submenu-level-2" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="history.php">History</a></li>
                                <li><a class="dropdown-item" onclick="checkLogoutUser('./logout.php');">Logout</a></li>
                            </ul>
                        </li>
                    <? } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="login.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</header>