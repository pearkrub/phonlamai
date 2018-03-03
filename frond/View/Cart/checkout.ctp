<?php
$Auth = $this->Session->read('Auth');
if (!empty($Auth)) { ?>
    <div class="row">
        <div class="col-sm-12 text-left">
            <h2 class="title">ดำเนินการสั่งซื้อ</h2>
        </div>
    </div>

    <hr class="spacer-5">
    <hr class="spacer-20 no-border">

    <div class="row">
        <div class="col-sm-12">
            <div class="container col-sm-12">


                <div class="row bs-wizard" style="border-bottom:0;">

                    <div class="col-xs-3 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-shopping-cart"></i> ตะกร้าสินค้า</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-truck"></i> ข้อมูลการจัดส่ง</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-credit-card"></i> ช่องทางการชำระเงิน</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-check-square-o"></i> สรุปการสั่งซื้อ</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>-->
                    </div>
                </div>
                <div class="tab-content pills">
                        <?php echo $this->element('cart/cart') ?>
                </div><!-- end pills content -->
            </div>


        </div><!-- end col -->

    </div><!-- end row -->
<?php } else { ?>
    <div class="row">
        <!-- start sidebar -->
        <div class="col-sm-3">
            <div class="widget">
                <h6 class="subtitle"></h6>
                <figure>
                    <a href="javascript:void(0);">
                        <img src="/img/products/regis.png" alt="collection">
                    </a>
                </figure>
            </div><!-- end widget -->
        </div><!-- end col -->
        <!-- end sidebar -->
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <h2 class="title">คุณยังไม่ได้เข้าสู่ระบบ</h2>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-5">
            <hr class="spacer-20 no-border">

            <a class="btn btn-primary" data-toggle="modal" data-target=".loginModal"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</a>
        </div><!-- end col -->
    </div>
<?php } ?>
