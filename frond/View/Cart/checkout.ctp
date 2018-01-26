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
                    3. ชำระเงิน
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                </a>
            </li>
        </ul>

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

        <hr class="spacer-30">

        <div class="row">
            <div class="col-sm-7 text-left">
            </div><!-- end col -->

            <div class="col-sm-5">
                <div class="table-responsive">
                    <table class="table no-border">
                        <tr>
                            <th>ราคารวม</th>
                            <td>$ 98,00</td>
                        </tr>
                        <tr>
                            <th>ข้อมูลการส่งสินค้า</th>
                            <td>ฟรี</td>
                        </tr>
                        <tr>
                            <th>ยอดสุทธิ</th>
                            <td>$ 98,00</td>
                        </tr>
                    </table><!-- end table -->
                </div><!-- end table-responsive -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->