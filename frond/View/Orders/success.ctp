<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12 text-left">
            <h2 class="title">สั่งซื้อสำเร็จ <i class="fa fa-check"></i></h2>
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <h5 class="thin">ขอขอบคุณสำหรับการสั่งซื้อของคุณ</h5>
            <p>คุณสามารถติดตามสถานะคำส่ังซื้อได้ที่เมนู รายการสั่งซื้อ</p>
            <hr class="spacer-10 no-border">
            <hr class="spacer-30">
            <div class="text-center">ใบสั่งซื้อเลขที่: <?php echo $order['Order']['order_no'] ?></div>
            <div>รายการสินค้า</div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th colspan="2">สินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>รวม</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($order['OrderDetail'] as $product) { ?>
                        <tr>
                            <td>
                                <a onclick="viewProduct(<?php echo $product['Product']['id'] ?>, '<?php echo $product['product_name'] ?>')"
                                   href="javascript:void(0);" class="product-image" data-toggle="modal"
                                   data-target=".productQuickView">
                                    <?php
                                    $product_img = empty($product['Product']['ProductImage'][0]['path'])?'':$product['Product']['ProductImage'][0]['path'];
                                    ?>
                                    <img style="width: 60px; height: 78px"
                                         src="<?php echo Configure::read('Portal.Domain') . $product['Product']['ProductImage'][0]['path'] ?>"
                                         alt="Sample Product ">
                                </a>
                            </td>
                            <td>
                                <h6 class="regular"><a
                                            href="/products/view/<?php echo $product['Product']['id'] ?>"><?php echo $product['product_name'] ?></a>
                                </h6>
                                <p>ผู้ขาย : <?php echo $product['Merchant']['shop_name'] ?></p>
                            </td>
                            <td>
                                <span><?php echo $product['price_per_key'] ?></span>
                            </td>
                            <td>
                                <div class="col-sm-6"><?php echo $product['count'] ?>
                                </div>

                            </td>
                            <td>
                                <span class="text-primary"><?php echo number_format($product['price']) ?></span>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table><!-- end table -->
            </div><!-- end table-responsive -->
            <hr class="spacer-10 no-border">
            <hr class="spacer-30">
            <div class="row">
                <div class="col-sm-7 text-left">
                </div><!-- end col -->

                <div class="col-sm-5">
                    <div id="cart-summary" class="table-responsive">
                        <table class="table no-border">
                            <tr>
                                <th>ราคารวม</th>
                                <td><?php echo number_format($order['Order']['total_price']) ?> บ.</td>
                            </tr>
                            <tr>
                                <th>ข้อมูลการส่งสินค้า</th>
                                <td>ฟรี</td>
                            </tr>
                            <tr>
                                <th>ยอดสุทธิ</th>
                                <td><?php echo number_format($order['Order']['summary']) ?> บ.</td>
                            </tr>
                        </table><!-- end table -->
                    </div><!-- end table-responsive -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->