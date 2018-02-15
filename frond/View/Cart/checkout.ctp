<style>
    .bs-wizard {margin-top: 40px;}

    /*Form Wizard*/
    .bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
    .bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
    .bs-wizard > .bs-wizard-step + .bs-wizard-step {}
    .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
    .bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
    .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #37effb; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;}
    .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fb4c45; border-radius: 50px; position: absolute; top: 8px; left: 8px; }
    .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
    .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fb4c45;}
    .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
    .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
    .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
    .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
    .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
    .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
    .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
    .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
    .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
    /*END Form Wizard*/
</style>

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
            <div class="container col-sm-10">


                <div class="row bs-wizard" style="border-bottom:0;">

                    <div class="col-xs-3 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">ตะกร้าสินค้า</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">ข้อมูลการจัดส่ง</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">ช่องทางการชำระเงิน</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                        <div class="text-center bs-wizard-stepnum">สรุปการสั่งซื้อ</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <!--            <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>-->
                    </div>
                </div>
            </div>
<!--            <ul class="nav nav-pills style2 nav-justified">-->
<!--                <li class="active">-->
<!--                    <a href="#shopping-cart" data-toggle="tab">-->
<!--                        1. ตะกร้าสินค้า-->
<!--                        <div class="icon">-->
<!--                            <i class="fa fa-check"></i>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#billing-info" data-toggle="tab">-->
<!--                        2. ข้อมูลการจัดส่ง-->
<!--                        <div class="icon">-->
<!--                            <i class="fa fa-home"></i>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#payment" data-toggle="tab">-->
<!--                        3. ช่องทางการชำระเงิน-->
<!--                        <div class="icon">-->
<!--                            <i class="fa fa-credit-card"></i>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
            <form id="cart-form" action="/cart/confirmOrder" method="post">
                <div class="tab-content pills">
                    <div class="tab-pane" id="shopping-cart">
                        <?php echo $this->element('cart/cart') ?>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane active" id="billing-info">
                        <?php echo $this->element('cart/billing_info') ?>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane" id="payment">
                        <?php echo $this->element('cart/payment_info') ?>
                    </div><!-- end tab-pane -->
                </div><!-- end pills content -->
            </form>

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
