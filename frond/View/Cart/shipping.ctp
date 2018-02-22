<?php
$Auth = $this->Session->read('Auth');
if (!empty($Auth)) { ?>
    <div class="row">
        <div class="col-sm-12 text-left">
            <h5 class="title">ดำเนินการสั่งซื้อ</h5>
        </div>
    </div>

    <hr class="spacer-5">
    <hr class="spacer-20 no-border">

    <div class="row">
        <div class="col-sm-12">
            <div class="container col-sm-12">


                <div class="row bs-wizard" style="border-bottom:0;">

                    <div class="col-xs-3 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-shopping-cart"></i> ตะกร้าสินค้า</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
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
                        <?php echo $this->element('cart/billing_info') ?>
                </div><!-- end pills content -->
            </div>


        </div><!-- end col -->

    </div><!-- end row -->
    <div class="text-right">
        <a href="/cart/checkout" class="btn btn-info semi-circle btn-md pull-left">
            <i class="glyphicon glyphicon-arrow-left"></i> กลับไปหน้าตะกร้า
        </a>
        <a href="/cart/shipping" class="btn btn-default semi-circle btn-md">
            ดำเนินการต่อ <i class="glyphicon glyphicon-arrow-right"></i>
        </a>
    </div>
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
                    <h5 class="title">คุณยังไม่ได้เข้าสู่ระบบ</h5>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-5">
            <hr class="spacer-20 no-border">

            <div class="row">
                <div class="col-sm-6 col-md-10 col-lg-6">
                    <form class="form-horizontal" action="<?php echo Configure::read('App.Domain') ?>login/authen"
                          method="post">

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">อีเมล <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input required type="email" name="email" class="form-control input-md" id="email"
                                       placeholder="Email">
                            </div>
                        </div><!-- end form-group -->

                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">รหัสผ่าน <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input required type="password" name="password" class="form-control input-md"
                                       id="password"
                                       placeholder="Password">
                            </div>
                        </div><!-- end form-group -->
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button class="btn btn-default round btn-md"><i class="fa fa-user mr-5"></i> เข้าสู่ระบบ
                                </button>
                            </div>
                        </div><!-- end form-group -->
                    </form>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->
    </div>
<?php } ?>
