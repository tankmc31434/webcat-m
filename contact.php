<!DOCTYPE html>
<?php include('lib/connect.php'); ?>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
</head>

<body>

    <div class="global-container">
        <?php include('inc/header.php'); ?>


        <section class="layout-container ">

            <!-- <div class="default-header">
                <div class="wrapper">
                    <div class="container">
                        <div class="title  text-center">Web development Pet Tracking</div>
                        <div class="text-center txt-desc" style="color: white;line-height: 1.5rem;">สำหรับผู้เลี้ยงสุนัขและแมวมือใหม่ที่คิดจะเลี้ยงสุนัขและแมว อาจจะไม่สามารถแยกสายพันธุ์ของสุนัขและแมวได้ 
                        ไม่ทราบปัญหาเกี่ยวกับวิธีการเลี้ยงดูของสัตว์เลี้ยง และนิสัยของสุนัขและแมวแต่ละสายพันธุ์ ทำให้เกิดปัญหามากมายเกี่ยวกับสุขภาพของสุนัขและแมว 
                        ทำให้สุนัขและแมวมีอายุที่สั้นลงหรือถูกเลี้ยงแบบผิดวิธี ดังนั้นจึงพัฒนาเว็บแอปพลิเคชันเพื่อรวบรวมข้อมูลการเลี้ยงสุนัขและแมวและการให้คำแนะนำเกี่ยวกับอาการของสุนัขและแมว 
                        และประเมินอาการเบื้องต้นเมื่อสุนัขและแมวมีอาการผิดปกติ เพื่อที่จะได้รับการดูแลที่ถูกวิธีและทำให้สุนัขและแมวมีอายุที่ยืนยาวมากขึ้น รวมทั้งสามารถหาคลินิครักษาสัตว์ ร้านอาหารที่ใกล้บ้าน 
                        และสามารถตามหาสุนัขและแมวในกรณีสูญหายได้</div>
                    </div>
                </div>
                <figure class="cover">
                    <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg-home.png"  alt="bg-home">
                </figure>

            </div> -->

            <div class="contact-page" style="margin: 6rem 0;">
                <div class="information-system">
                    <div class="container-xl">
                        <div class="contact-info">
                            <div class="row gx-md-5">
                                <div class="col">
                                    <div class="text-brand text-uppercase text-center">
                                        <h3 class="title typo-xxl text-primary">
                                            <strong>
                                                ติดต่อเรา
                                            </strong>
                                        </h3>
                                        <img src="<?php echo $core_template; ?>assets/img/static/CATDOG.png" style="max-height:150px" alt="profile" />
                                    </div>
                                </div>
                            </div>
                        <div class="row gx-md-5">
                            <div class="col-md-auto">
                                <div class="brand">
                                    <img src="<?php echo $core_template; ?>assets/img/static/profiles.png" style="min-height:350px" alt="profile" />
                                </div>
                            </div>
                            <div class="col pt-5">
                                <div class="text-brand text-uppercase">
                                    <h3 class="title typo-xxl text-primary">
                                        <strong>
                                            ผู้ดูแลระบบ
                                        </strong>
                                    </h3>
                                    <h4 class="subtitle typo-xl text-secondary">
                                        <strong>
                                            นางสาวลักษิกา สามลทาคณะ
                                        </strong>
                                    </h4>
                                </div>
                                <div class="row gy-3 pt-4">
                                    <div class="col-12">
                                        <div class="row align-items-start gx-0">
                                            <div class="col-sm-auto">
                                                <div class="c-label fw-bold">
                                                    คณะ:
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="desc">
                                                    คอมพิวเตอร์และเทคโนโลยีสารสนเทศ สาขาวิชาวิทยาการคอมพิวเตอร์
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row align-items-start gx-0">
                                            <div class="col-sm-auto">
                                                <div class="c-label fw-bold">
                                                    Email:
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="desc">
                                                    <a href="mailto:621463024@crru.ac.th" class="link" title="">621463024@crru.ac.th</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="row align-items-start gx-0">
                                            <div class="col-sm-auto">
                                                <div class="c-label fw-bold">
                                                    โทรศัพท์:
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="desc">
                                                    <a href="tel:092 332 6999" class="link" title="">092-332-6999</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row align-items-center gx-0 pt-sm-4">
                                            <div class="col-auto">
                                                <div class="c-label fw-bold">
                                                    Follow us:
                                                </div>
                                            </div>
                                            <div class="col">
                                                <?php include('inc/components/social.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- แสดงข้อมูลติดต่อผู้ดูแลระบบเว็บไซต์ พร้อมช่องทางติดต่อและโซเชียลมีเดีย -->
    </section>


    <?php include('inc/footer.php'); ?>
    </div>

    <?php include('inc/loadscript.php'); ?>

</body>

</html>