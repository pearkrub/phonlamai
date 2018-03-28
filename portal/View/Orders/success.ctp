<?php
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array(
        "",
        "ม.ค.",
        "ก.พ.",
        "มี.ค.",
        "เม.ย.",
        "พ.ค.",
        "มิ.ย.",
        "ก.ค.",
        "ส.ค.",
        "ก.ย.",
        "ต.ค.",
        "พ.ย.",
        "ธ.ค."
    );
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

?>
<style>
    @media print {
        .no-print, .no-print * {
            display: none !important;
        }
    }

</style>
<div class="col-sm-12">
    <div class="row no-print">
        <div class="col-sm-12 text-left">
            <h2 class="title">สั่งซื้อสำเร็จ <i class="fa fa-check"></i></h2>
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <button class="no-print pull-right btn btn-primary semi-circle btn-md" onclick="window.print()"><i class="fa fa-print"></i> พิมพ์ใบสั่งซื้อ
            </button>

            <h5 class="thin no-print">ขอขอบคุณสำหรับการสั่งซื้อของคุณ</h5>
            <p class="no-print">คุณสามารถติดตามสถานะคำส่ังซื้อได้ที่เมนู รายการสั่งซื้อ</p>
            <a href="/" class="no-print pull-left btn btn-default semi-circle btn-md"><i class="fa fa-shopping-cart"></i> เลือกซื้อสินค้าต่อ
            </a>
            <br>
            <hr class="spacer-30 no-print">
            <h5 class="text-center">ใบสั่งซื้อเลขที่: <?php echo $order['Order']['order_no'] ?></h5>
            <hr class="spacer-10 no-border">
            <div class="col-sm-12">
                <h6>รายการสินค้า</h6>
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
                                        $product_img = empty($product['Product']['ProductImage'][0]['path']) ? '' : $product['Product']['ProductImage'][0]['path'];
                                        ?>
                                        <img style="width: 60px; height: 78px"
                                             src="<?php echo Configure::read('Portal.Domain') . $product['Product']['ProductImage'][0]['path'] ?>"
                                             alt="Sample Product ">
                                    </a>
                                </td>
                                <td>
                                    <h6 class="regular"><a ><?php echo $product['product_name'] ?></a>
                                    </h6>
                                    <div>ผู้ขาย : <?php echo $product['Merchant']['shop_name'] ?></div>
                                    <div>พร้อมส่งประมาน : <?php echo DateThai($product['available_date']).' - '.DateThai(date('Y-m-d', strtotime($product['available_date']." + 7 days"))) ?></div>
                                </td>
                                <td>
                                    <span><?php echo $product['price'] ?> บ.</span>
                                </td>
                                <td>
                                    <div class="col-sm-6"><?php echo $product['count'] ?>
                                    </div>

                                </td>
                                <td>
                                    <span class="text-primary"><?php echo number_format($product['total_price']) ?> บ.</span>
                                </td>
                            </tr>
                            <?php
                        } ?>
                        </tbody>
                    </table><!-- end table -->
                </div><!-- end table-responsive -->

<!--                <hr class="spacer-10 no-border">-->
<!--                <hr class="spacer-30">-->
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
                                    <th>ค่าขนส่ง</th>
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
            </div>

            <div class="col-sm-12">
                <hr class="spacer-30">
                <h6>ที่อยู่สำหรับจัดส่ง</h6>
                <?php $address = json_decode($order['Order']['shipping_address'], true); ?>
                <div class="row">
                    <br>
                    <p style="margin-left: 13px">คุณ <?php echo $address['CustomerAddress']['full_name'] ?></p>
                    <p style="margin-left: 13px"><?php echo $address['CustomerAddress']['address'] ?>
                        ต.<?php echo $address['District']['district_name'] ?>
                        อ.<?php echo $address['Amphure']['amphur_name'] ?>
                        จ.<?php echo $address['Province']['province_name'] ?>
                        <?php echo $address['CustomerAddress']['zipcode'] ?></p>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->