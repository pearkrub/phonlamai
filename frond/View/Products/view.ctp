
<div class="row">
    <div class="col-sm-5">
        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
            <div class='carousel-inner'>
                <?php foreach ($product['ProductImage'] as $key => $image) { ?>
                    <div class='item <?php echo $key == 0 ? "active" : "" ?>'>
                        <figure>
                            <img style="width: 357.5px; height: 403.96px;"
                                 src="<?php echo Configure::read('Portal.Domain') . $image['path'] ?>" alt="">
                        </figure>
                    </div><!-- end item -->
                <?php } ?>

                <!-- Arrows -->
                <!--                <a class='left carousel-control' href='.html' data-slide='prev'>-->
                <!--                    <span class='fa fa-angle-left'></span>-->
                <!--                </a>-->
                <!--                <a class='right carousel-control' href='.html' data-slide='next'>-->
                <!--                    <span class='fa fa-angle-right'></span>-->
                <!--                </a>-->
            </div><!-- end carousel-inner -->

            <!-- thumbs -->
            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                <?php foreach ($product['ProductImage'] as $key => $image) { ?>
                    <li data-target='.product-slider' data-slide-to='<?php echo $key ?>'
                        class='<?php echo $key == 0 ? "active" : "" ?>'><img
                            src='<?php echo Configure::read('Portal.Domain') . $image['path'] ?>'
                            alt=''/></li>
                <?php } ?>
            </ol><!-- end carousel-indicators -->
        </div><!-- end carousel -->
    </div><!-- end col -->
    <div class="col-sm-7">
        <p class="text-gray alt-font">ชื่อสินค้า: <?php echo $product['Product']['name'] ?></p>

        <br>
        ราคา <?php if ($product['Product']['price'] < $product['Product']['normal_price']) { ?> <br><span
            style="text-decoration: line-through;"
            class="amount off text-danger"><?php echo $product['Product']['normal_price'] ?> บาท</span> <?php } ?>
        <h4
            class="text-primary"><?php echo $product['Product']['price'] ?>
            บาท/<?php echo $product['Product']['price_per_key'] ?></h4>

        <p>
            <?php echo $product['Product']['detail'] ?>
        </p>
        <hr class="spacer-10">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                จำนวน
            </div><!-- end col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input class="form-control" qty="<?php echo $product['Product']['quantity'] ?>" id="product-count" type="number" value="1">
            </div><!-- end col -->
            <div class="col-md-4 col-sm-12">
                <?php echo $product['Product']['price_per_key'] ?>
            </div><!-- end col -->
        </div><!-- end row -->
        <small class="text-gray">เหลือ <?php echo $product['Product']['quantity'].' '.$product['Product']['price_per_key']; ?> </small>
        <br>
        <small class="text-gray">สามารถสั่งซื้อได้ถึงวันที่ <?php echo $this->Phonlamai->DateThai($product['Product']['end_date']) ?> </small>
        <hr class="spacer-10">
        <ul class="list list-inline">
            <li>
                <?php if (intval($product['Product']['quantity']) > 0) { ?>
                    <button type="button" onclick="addToCart(<?php echo $product['Product']['id'] ?>)"
                            class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>เพิ่มใส่ตะกร้า
                    </button>
                <?php }else{ ?>
                    <span style="color: #0a6aa1">สินค้าหมด</span>
                <?php }?>
            </li>
<!--            <li>-->
<!--                <button type="button" onclick="addToWishlist()"-->
<!--                        class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>เพิ่มใส่สินค้าที่ชื่นชอบ-->
<!--                </button>-->
<!--            </li>-->
        </ul>
    </div><!-- end col -->
</div><!-- end row -->
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script>
    $('#product-count').on('input', function () {
        var qty = $(this).val()
        var in_stock = $(this).attr('qty')
        if (parseInt(qty) > parseInt(in_stock)) {
            swal("มีบางอย่างผิดพลาด!", "จำนวนสอนค้าในร้านไม่พอเหลือ " + in_stock + ' หน่วย', "error");
            $(this).val(in_stock)
        }
    })
</script>