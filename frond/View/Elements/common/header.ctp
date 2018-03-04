<!-- start topBar -->
<style>
    @media print {
        .no-print, .no-print * {
            display: none !important;
        }
    }

</style>
<div class="topBar no-print">
    <div class="container">

        <ul class="topBarNav pull-right">
            <?php $user = $this->Session->read('Auth');
            if (!empty($user)) {
                ?>
                <!--<li><a href="javascript:void(0);"> <?php echo $user['Customer']['first_name'] . ' ' . $user['Customer']['last_name']; ?></a></li>-->
                <li class="linkdown">
                    <a href="javascript:void(0);">
                        <i class="fa fa-user mr-5"></i>
                        <span class="hidden-xs">
                        <?php echo $user['Customer']['first_name'] . ' ' . $user['Customer']['last_name']; ?>
                            <i class="fa fa-angle-down ml-5"></i>
                    </span>
                    </a>
                    <ul class="w-150">
                        <li><a href="checkout.html">ข้อมูลส่วนตัว</a></li>
<!--                        <li><a href="wishlist.html">รายการสินค้าโปรด (5)</a></li>-->
                        <li><a href="/orders">รายการสั่งซื้อ</a></li>
                        <li><a href="/logout">ออกจากระบบ</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target=".loginModal"> เข้าสู่ระบบ</a></li>


                <li class="linkdown">
                    <a href="javascript:void(0);">
                        <i></i>
                        <span class="hidden-xs">
                        สมัครสมาชิก 
                        <i class="fa fa-angle-down ml-4"></i>
                    </span>
                    </a>
                    <ul class="cart w-200">

                        <li>
                            <div class="cart-footer">
                                <a href="<?php echo Configure::read('App.Domain') ?>register">สมัครสมาชิกเพื่อซื้อสินค้า</a>
                                <a href="<?php echo Configure::read('App.Domain'); ?>merchants/register">สมัครสมาชิกเพื่อขายสินค้า</a>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <!--<li><a href="<?php echo Configure::read('App.Domain') ?>register"> สมัครสมาชิก</a></li>-->

            <li class="linkdown">
                <a href="javascript:void(0);">
                    <i class="fa fa-shopping-basket mr-5"></i>
                    <span class="hidden-xs">
                        ตะกร้าสินค้า <sup class="text-primary count-product-of-cart"></sup>
                        <i class="fa fa-angle-down ml-5"></i>
                    </span>
                </a>
                <ul class="cart w-250">
                    <li>
                        <div class="cart-items">
                            <ol class="items cart-product">


                            </ol>
                        </div>
                    </li>
                    <li>
                        <div class="cart-footer">
                            <a href="/cart" class="pull-left"><i
                                        class="fa fa-cart-plus mr-5"></i>ดูสินค้าในตะกร้า</a>
                            <a href="/cart/checkout" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>สั่งซื้อ</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- end container -->
</div>
<!-- end topBar -->

<div class="middleBar no-print">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-3 vertical-align text-left hidden-xs">
                <a href="javascript:void(0);">
                    <img height="70" width="200" src="/img/logo5.png" alt=""/>
                </a>
            </div><!-- end col -->
            <div class="col-sm-7 vertical-align text-center">
                <form action="/products">
                    <div class="row grid-space-1">
                        <div class="col-sm-4">
                            <?php
                            $keyword = '';
                            if(!empty($this->request->query['keyword'])) {
                                $keyword = $this->request->query['keyword'];
                            }
                            ?>
                            <input type="text" value="<?php echo $keyword ?>" name="keyword" class="form-control" placeholder="ค้นหา">
                        </div><!-- end col -->
                        <div class="col-sm-3">
                            <select class="form-control" name="merchant_id">
                                <option value="">แสดงทุกร้านค้า</option>
                                <?php
                                $selected = '';
                                if(!empty($this->request->query['merchant_id'])) {
                                    $selected = $this->request->query['merchant_id'];
                                }
                                if (!empty($merchants)) {
                                    foreach ($merchants as $merchant) {
                                        ?>
                                        <option <?php if($selected == $merchant['Merchant']['id']){ echo 'selected'; } ?> value="<?php echo $merchant['Merchant']['id'] ?>"><?php echo $merchant['Merchant']['shop_name'] ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div><!-- end col -->
                        <?php
                        $category = '';
                        if(!empty($this->request->query['category_id'])) {
                            $category = $this->request->query['category_id'];
                        }
                        ?>
                        <div class="col-sm-3">
                            <select class="form-control" name="category_id">
                                <option value="">แสดงสินค้าทุกประเภท</option>
                                <option <?php if($category == 1){ echo 'selected'; } ?> value="1">สินค้าล่วงหน้า 1 เดือน</option>
                                <option <?php if($category == 2){ echo 'selected'; } ?> value="2">สินค้าล่วงหน้า 2 เดือน</option>
                                <option <?php if($category == 3){ echo 'selected'; } ?> value="3">สินค้าล่วงหน้า 3 เดือน</option>
                            </select>
                        </div><!-- end col -->
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-default btn-block" value="ค้นหา">
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form>
            </div><!-- end col -->
            <div class="col-sm-2 vertical-align header-items hidden-xs">
<!--                <div class="header-item mr-1">-->
<!--                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Wishlist">-->
<!--                        <i class="fa fa-heart-o"></i>-->
<!--                        <sub>1</sub>-->
<!--                    </a>-->
<!--                </div>-->
                <!--                <div class="header-item">-->
                <!--                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Compare">-->
                <!--                        <i class="fa fa-refresh"></i>-->
                <!--                        <sub></sub>-->
                <!--                    </a>-->
                <!--                </div>-->
            </div><!-- end col -->
        </div><!-- end  row -->
    </div><!-- end container -->
</div><!-- end middleBar -->

<!-- start navbar -->
<div class="navbar yamm navbar-default no-print">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="javascript:void(0);" class="navbar-brand visible-xs">
                <img src="/img/logo.png" alt="logo">
            </a>
        </div>
        <div id="navbar-collapse-3" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="dropdown"><a href="/">หน้าแรก</a>
                </li><!-- end li dropdown -->
                <!-- Features -->
<!--                <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">ประเภทสินค้า<i-->
<!--                                class="fa fa-angle-down ml-5"></i></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a href="/products/index/1">สินค้าล่วงหน้า 1 เดือน</a></li>-->
<!--                        <li><a href="/products/index/2">สินค้าล่วงหน้า 2 เดือน</a></li>-->
<!--                        <li><a href="/products/index/3">สินค้าล่วงหน้า 3 เดือน</a></li>-->
<!--                    </ul><!-- end ul dropdown-menu -->
<!--                </li><!-- end li dropdown -->
                <!-- Pages -->
                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">แจ้งชำระเงิน</a>
                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">เกี่ยวกับเรา</a>

                </li><!-- end li dropdown -->
                <!-- elements -->
                <!--<li><a href="<?php echo Configure::read('Portal.Domain'); ?>register">สมัครขายสินค้ากับเรา</a></li>-->
                <!-- Collections -->
            </ul><!-- end navbar-nav -->
        </div><!-- end navbar collapse -->
    </div><!-- end container -->
</div><!-- end navbar -->

<!-- Swiper slider-->
