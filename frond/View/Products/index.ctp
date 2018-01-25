<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="title-wrap">
            <?php if (!empty($this->request->params['pass'][0])) { ?><h2 class="title">
                สินค้าล่วงหน้า <?php echo $this->request->params['pass'][0]; ?> เดือน</h2><?php } else { ?>
                <h2 class="title">สินค้าทั้งหมด</h2>
            <?php } ?>
            <!--<p class="lead">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>-->
        </div>
    </div><!-- end col -->
</div><!-- end row -->


<div class="row column-4">
    <?php foreach ($products as $product) { ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail store style3">
                <div class="header">
                    <?php if (!empty($product['ProductImage'][0]['path'])) { ?>
                        <?php if ($product['Product']['price'] < $product['Product']['normal_price']) { ?>
                            <div class="badges">
                                <span class="product-badge top left primary-background text-white semi-circle">ลดราคา</span>
                            </div>
                        <?php } ?>
                        <figure class="layer">
                            <a href="javascript:void(0);">

                                <img style="width: 260.5px; height: 338.64px;"
                                     src="<?php echo Configure::read('Portal.Domain') . $product['ProductImage'][0]['path'] ?>"
                                     alt="">

                            </a>
                        </figure>
                    <?php } ?>
                    <div class="icons">
                        <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                        <a class="icon semi-circle" title="เพิ่มเข้าตะกร้า" onclick="addToCart(<?php echo $product['Product']['id'] ?>)" href="javascript:void(0);"><i class="fa fa-shopping-basket"></i></a>
                        <a onclick="viewProduct(<?php echo $product['Product']['id'] ?>, '<?php echo $product['Product']['name'] ?>')"
                           title="ดูรายละเอียด"
                           class="icon semi-circle" href="javascript:void(0);" data-toggle="modal"
                           data-target=".productQuickView"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="caption">
                    <h6 class="regular"><a
                                href="shop-single-product-v1.html"><?php echo $product['Product']['name']; ?></a></h6>
                    <div class="price">
                        <?php if ($product['Product']['price'] < $product['Product']['normal_price']) { ?>
                            <small class="amount off text-danger"><?php echo $product['Product']['normal_price']; ?></small>
                        <?php } ?>
                        <span class="amount text-primary"><?php echo $product['Product']['price']; ?> บาท/<?php echo $product['Product']['price_per_key'] ?></span>
                    </div>
                    <a class="btn btn-default btn-md round"
                       onclick="addToCart(<?php echo $product['Product']['id'] ?>)"><i
                                class="fa fa-shopping-basket mr-5"></i>เพิ่มใส่ตะกร้า</a>
                </div><!-- end caption -->
            </div><!-- end thumbnail -->
        </div><!-- end col -->
    <?php } ?>
</div>