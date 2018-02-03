<?php
$Auth = $this->Session->read('Auth');
if (!empty($Auth)) { ?>
    <div class="row">
        <div class="col-sm-12 text-left">
            <h2 class="title">สรุปการสั่งซื้อ</h2>
        </div><!-- end col -->
    </div><!-- end row -->

    <hr class="spacer-5">
    <hr class="spacer-20 no-border">

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-pills style2 nav-justified">
                <li class="active">
                    <a href="#shopping-cart" data-toggle="tab">
                        1. ตะกร้าสินค้า
                        <div class="icon">
                            <i class="fa fa-check"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#billing-info" data-toggle="tab">
                        2. ข้อมูลการจัดส่ง
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#payment" data-toggle="tab">
                        3. ช่องทางการชำระเงิน
                        <div class="icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                    </a>
                </li>
            </ul>
            <form id="cart-form" action="/cart/confirmOrder" method="post">
                <div class="tab-content pills">
                    <div class="tab-pane active" id="shopping-cart">
                        <?php echo $this->element('cart/cart') ?>
                    </div><!-- end tab-pane -->
                    <div class="tab-pane" id="billing-info">
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
