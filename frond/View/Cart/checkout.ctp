<div class="row">
    <div class="col-sm-12 text-left">
        <h2 class="title">ตะกร้าสินค้า</h2>
    </div><!-- end col -->
</div><!-- end row -->

<hr class="spacer-5">
<hr class="spacer-20 no-border">

<div class="row">
    <div class="col-sm-12">
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
                    <?php foreach ($cart_products as $product) { ?>
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
                                    <input type="number" qty="<?php echo $product['in_stock'] ?>" class="form-control product_qty" price="<?php echo $product['price'] ?>"
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
                    <?php } ?>
                    </tbody>
                </table><!-- end table -->
            </div><!-- end table-responsive -->
            <hr class="spacer-10 no-border">

            <a href="/" class="btn btn-light semi-circle btn-md pull-left">
                <i class="fa fa-arrow-left mr-5"></i> เลือกซื้อสินค้าต่อ
            </a>

            <a href="cart/checkout" class="btn btn-default semi-circle btn-md pull-right">
                สั่งซื้อสินค้า <i class="fa fa-arrow-right ml-5"></i>
            </a>
        <?php } else { ?>
            <div class="text-center">
                <h4>- - -ไม่มีสินค้าในตะกร้า- - -</h4>
                <br>
                <a href="/" class="btn btn-default semi-circle btn-md">
                    <i class="fa fa-shopping-bag mr-5"></i> เลือกซื้อสินค้าต่อ
                </a>
            </div>
        <?php } ?>

    </div><!-- end col -->
</div><!-- end row -->