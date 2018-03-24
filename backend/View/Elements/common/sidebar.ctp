<div class="page-sidebar pagescroll">

    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">

        <!-- USER INFO - START -->
        <div class="profile-info row">

            <div class="profile-image col-xs-4">
                <a href="ui-profile.html">
                    <img alt="" src="/data/profile/profile-ecommerce.jpg" class="img-responsive img-circle">
                </a>
            </div>

            <div class="profile-details col-xs-8">

                <h3>

                    <?php $user = $this->Session->read('Auth'); ?>
                    <a href="#"><?php echo $user['User']['first_name']?></a>

                    <!-- Available statuses: online, idle, busy, away and offline -->
                    <span class="profile-status online"></span>
                </h3>

                <p class="profile-title">ผู้ดูแลระบบ</p>

            </div>

        </div>
        <!-- USER INFO - END -->


        <ul class='wraplist'>

            <li>
                <a href="/">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">หน้าแรก</span>
                </a>
            </li>
            <li class="">
                <a href="/orders">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">ข้อมูลการซื้อขาย</span>
                </a>
            </li>
            <li class="">
                <a href="/customers">
                    <i class="fa fa-users"></i>
                    <span class="title">ข้อมูลลูกค้า</span>
                </a>
            </li>
            <li class="">
                <a href="/merchants">
                    <i class="fa fa-meh-o"></i>
                    <span class="title">ข้อมูลพ่อค้า</span>
                </a>
            </li>
            <li class="">
                <a href="/informs">
                    <i class="fa fa-meh-o"></i>
                    <span class="title">การแจ้งชำระเงิน</span>
                </a>
            </li>


        </ul>


    </div>
    <!-- MAIN MENU - END -->


</div>