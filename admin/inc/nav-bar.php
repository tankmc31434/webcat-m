<aside class="left-sidebar">
<div id="loadCheckComplete"></div>
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img style="height: 50px;" src="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>./assets/images/CATDOG.png" alt="CATDOG"></span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i
                        class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>home.php" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <!-- <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li> -->
                        <!-- <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>table-basic.php" aria-expanded="false"><i
                                    class="fa fa-table"></i><span class="hide-menu"></span>Tables</a></li> -->
                                    <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>member/index.php" aria-expanded="false"><i
                                    class="fa fa-users"></i><span class="hide-menu"></span>สมาชิก</a></li>
                        <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>clinic/index.php" aria-expanded="false"><i
                                    class="fa fa-hospital-o"></i><span class="hide-menu"></span>สถานที่รักษาสัตว์</a></li>
                                    <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>race/index.php" aria-expanded="false"><i
                        class="fa fa-paw"></i><span class="hide-menu"></span>สายพันธุ์สัตว์</a></li>
                        <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>announce/index.php" aria-expanded="false"><i
                                    class="fa fa-star-o"></i><span class="hide-menu"></span>ข่าวสาร</a></li>
                        <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>track/index.php" aria-expanded="false"><i
                        class="fa fa-comment"></i><span class="hide-menu"></span>แจ้งสัตว์เลี้ยงสูญหาย</a></li>
                        <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>symptom/index.php" aria-expanded="false"><i
                        class="fa fa-tint"></i><span class="hide-menu"></span>อาการป่วยของสัตว์</a></li>
                        <li> <a class="waves-effect waves-dark" href="<? if(!empty($Cfolder)){ echo $Cfolder ;} ?>disease/index.php" aria-expanded="false"><i
                        class="fa fa-flask"></i><span class="hide-menu"></span>โรคสัตว์เลี้ยง</a></li>

                        
                        <!-- <li> <a class="waves-effect waves-dark" href="icon-fontawesome.php" aria-expanded="false"><i
                                    class="fa fa-smile-o"></i><span class="hide-menu"></span>Icon</a></li>
                        <li> <a class="waves-effect waves-dark" href="map-google.php" aria-expanded="false"><i
                                    class="fa fa-globe"></i><span class="hide-menu"></span>Map</a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.php" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu"></span>Blank</a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.php" aria-expanded="false"><i
                                    class="fa fa-question-circle"></i><span class="hide-menu"></span>404</a></li> -->
                        <div class="text-center m-t-30">
                            <? $lglink = "http://".$_SERVER['HTTP_HOST']."/webcat/admin/logout.php"; ?>
                            <a href="#"
                                class="btn waves-effect waves-light btn-success hidden-md-down" onclick="checkLogoutUser('<? echo $lglink ?>')"> log out</a>
                        </div>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>