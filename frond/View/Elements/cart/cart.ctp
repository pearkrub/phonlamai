<?php if (!empty($cart_products)) { ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="2">สินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th colspan="2">รวม</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($cart_products as $product) { ?>
                <tr>
                    <td>
                        <a onclick="viewProduct(<?php echo $product['id'] ?>, '<?php echo $product['name'] ?>')"
                           href="javascript:void(0);" class="product-image" data-toggle="modal"
                           data-target=".productQuickView">
                            <img style="width: 60px; height: 78px"
                                 src="<?php echo Configure::read('Portal.Domain') . $product['image'] ?>"
                                 alt="Sample Product ">
                        </a>
                    </td>
                    <td>
                        <h6 class="regular"><a
                                    href="/products/view/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
                        </h6>
                        <p>ผู้ขาย : <?php echo $product['shop_name'] ?></p>
                    </td>
                    <td>
                        <span><?php echo $product['price'] ?></span>
                    </td>
                    <td>
                        <div class="col-sm-6">
                            <input type="number" qty="<?php echo $product['in_stock'] ?>"
                                   class="form-control product_qty" price="<?php echo $product['price'] ?>"
                                   id="<?php echo $product['id'] ?>" value="<?php echo $product['qty'] ?>">
                        </div>

                    </td>
                    <td>
                                <span class="text-primary"
                                      id="price_<?php echo $product['id'] ?>"><?php echo number_format($product['qty'] * $product['price']) ?></span>
                    </td>
                    <td>
                        <button type="button" class="close"
                                onclick="removeProductInCartPage(<?php echo $product['id'] ?>)">×
                        </button>
                    </td>
                </tr>
            <?php
                $total = $total+($product['qty'] * $product['price']);
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
                        <td><?php echo number_format($total) ?> บ.</td>
                    </tr>
                    <tr>
                        <th>ข้อมูลการส่งสินค้า</th>
                        <td>ฟรี</td>
                    </tr>
                    <tr>
                        <th>ยอดสุทธิ</th>
                        <td><?php echo number_format($total) ?> บ.</td>
                    </tr>
                </table><!-- end table -->
            </div><!-- end table-responsive -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="text-right">
        <a href="/cart/shipping" class="btn btn-default semi-circle btn-md">
            <i class="glyphicon glyphicon-arrow-right"></i> ดำเนินการต่อ
        </a>
    </div>

<?php } else { ?>
    <div class="text-center">
        <h4>- - -ไม่มีสินค้าในตะกร้า- - -</h4>
        <br>
        <a href="/" class="btn btn-default semi-circle btn-md">
            <i class="fa fa-shopping-bag mr-5"></i> เลือกซื้อสินค้าต่อ
        </a>
    </div>
<?php } ?>