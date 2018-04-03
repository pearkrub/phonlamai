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

function DateTimeThai($strDate)
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
    return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds น.";
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
    <div class="row">
        <div class="col-sm-12">
            <button class="no-print pull-right btn btn-primary semi-circle btn-md" onclick="window.print()"><i
                        class="fa fa-print"></i> พิมพ์
            </button>
            <p class="no-print"> <br><br></p>
            <a href="/orders" class="no-print pull-left btn btn-default semi-circle btn-md"><i
                        class="glyphicon glyphicon-arrow-left"></i> กลับไปหน้ารายการสั่งซื้อ
            </a>
            <a href="/orders/informPayment/<?php echo base64_encode($order['Order']['id']) ?>" class="no-print pull-right btn btn-info semi-circle btn-md"><i
                        class="fa fa-check"></i> แจ้งชำระเงิน
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
                            <th>สถานะ</th>
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
                                    <h6 class="regular"><a><?php echo $product['product_name'] ?></a>
                                    </h6>
                                    <div>ผู้ขาย : <?php echo $product['Merchant']['shop_name'] ?></div>
                                    <div>พร้อมส่งประมาน
                                        : <?php echo DateThai($product['available_date']) . ' - ' . DateThai(date('Y-m-d',
                                                strtotime($product['available_date'] . " + 7 days"))) ?></div>
                                </td>
                                <td>
                                    <span><?php echo $product['price'] ?> บ.</span>
                                </td>
                                <td>
                                    <div class="col-sm-6"><?php echo $product['count'] ?>
                                    </div>

                                </td>
                                <td>
                                    <span class="text-primary"><?php echo number_format($product['total_price']) ?>
                                        บ.</span>
                                </td>
                                <td>
                                    <?php if($product['status'] == '') echo 'รอจัดส่ง'?>
                                    <?php if($product['status'] == 'shipping') echo 'กำลังจัดส่ง'?>
                                    <?php if($product['status'] == 'delivered') echo 'ส่งสินค้าแล้ว'?>
                                    <?php if($product['status'] == 'received') echo 'รับสินค้าแล้ว'?>
                                    <?php if($product['status'] == 'refunded') echo 'คืนสินค้า'?>
                                    <?php if($product['status'] == 'delivered'){ ?>
                                        <a onclick="receivedItem(<?php echo $product['id'] ?>)" class="btn btn-sm btn-default">ยืนยันรับสินค้า</a>
                                        <a title="คืนสินค้า" onclick="refundItem(<?php echo $product['id'] ?>)" class="btn btn-sm btn-danger">X</a>
                                    <?php }?>
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
            <?php if (!empty($order['InformPayment'])) { ?>
                <div class="col-sm-12 no-print">
                    <hr class="spacer-30">
                    <h6>การแจ้งชำระเงิน</h6>
                    <?php foreach ($order['InformPayment'] as $inform) { ?>
                    <div class="row">
                        <p style="margin-left: 13px">เมื่อ <?php echo DateTimeThai($inform['payment_date']).' จำนาน '.number_format($inform['amount']).' บาท' ?> <a title="ดู" style="cursor: pointer" target="_blank" href="/<?php echo $inform['document_path'] ?>">ดูรูปภาพ <i class="fa fa-file"></i></a></p>
                    </div>
                    <?php }?>
                </div>
            <?php } ?>
            <div class="col-sm-12 no-print">
                <hr class="spacer-30">
                <h6>สถานะใบสั่งซื้อ</h6>
                <?php
                $step2 = 'disabled';
                $step3 = 'disabled';
                $step4 = 'disabled';
                if ($order['Order']['step'] == 2) {
                    $step2 = 'active';
                }
                if ($order['Order']['step'] == 3) {
                    $step3 = 'active';
                    $step2 = 'complete';
                }
                if ($order['Order']['step'] == 4) {
                    $step2 = 'complete';
                    $step3 = 'complete';
                    $step4 = 'active';
                }
                ?>
                <div class="row bs-wizard" style="border-bottom:0;">

                    <div class="col-xs-3 bs-wizard-step <?php if ($order['Order']['step'] == 1) { ?>active <?php } else { ?> complete <?php } ?>">
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-hourglass-start"></i> รอตรวจสอบ
                        </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <?php if ($order['Order']['step'] >= 1) { ?>
                            <div class="bs-wizard-info">
                                <div class="panel panel-default" style="margin-left: 5px; margin-right: 5px">
                                    <div class="panel-body">
                                        <ul>
                                            <?php if ($order['Order']['status'] == 'new_order') { ?>
                                                <li><i class="fa fa-spinner fa-spin"></i> ใบสั่งซื้อรอการตรวจสอบ</li>
                                            <?php } else { ?>
                                                <li><i class="fa fa-check"></i>
                                                    ตรวจสอบใบสั่งซื้อแล้ว
                                                </li>
                                            <?php } ?>
                                            <?php if ($order['Order']['status'] == 'wait_payment') { ?>
                                                <li><i class="fa fa-spinner fa-spin"></i> ใบสั่งซื้อรอชำระเงิน</li>
                                            <?php }
                                            if ($order['Order']['step'] > 1) { ?>
                                                <li><i class="fa fa-check"></i>
                                                    ชำระเงินเรียบร้อย
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-xs-3 bs-wizard-step <?php echo $step2 ?>"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-refresh"></i> จัดหาสินค้า</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <?php if ($order['Order']['step'] >= 2) { ?>
                            <div class="bs-wizard-info">
                                <div class="panel panel-default" style="margin-left: 5px; margin-right: 5px">
                                    <div class="panel-body">
                                        <ul>
                                            <?php if ($order['Order']['status'] == 'supplying') { ?>
                                                <li><i class="fa fa-spinner fa-spin"></i> กำลังดำเนินการจัดหาสินค้า</li>
                                            <?php } ?>
                                            <?php if ($order['Order']['step'] > 2) { ?>
                                                <li><i class="fa fa-check"></i>
                                                    สินค้าพร้อมส่ง
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--            <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat. Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique placerat</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step <?php echo $step3 ?>"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-truck"></i> ดำเนินการจัดส่ง
                        </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <?php if ($order['Order']['step'] >= 3) { ?>
                            <div class="bs-wizard-info">
                                <div class="panel panel-default" style="margin-left: 5px; margin-right: 5px">
                                    <div class="panel-body">
                                        <ul>
                                            <?php if ($order['Order']['step'] == 3) { ?>
                                                <li><i class="fa fa-spinner fa-spin"></i> กำลังดำเนินการจัดส่งสินค้า
                                                </li>
                                            <?php } ?>
                                            <?php if ($order['Order']['step'] > 3) { ?>
                                                <li><i class="fa fa-check"></i> ส่งสินค้าแล้ว</li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--            <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi bibendum bibendum</div>-->
                    </div>

                    <div class="col-xs-3 bs-wizard-step <?php echo $step4 ?>"><!-- active -->
                        <div class="text-center bs-wizard-stepnum"><i class="fa fa-check"></i> ส่งสินค้าแล้ว
                        </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <?php if ($order['Order']['step'] == 4) { ?>
                            <div class="bs-wizard-info">
                                <div class="panel panel-default" style="margin-left: 5px; margin-right: 5px">
                                    <div class="panel-body">
                                        <ul>
                                            <li><i class="fa fa-check"></i>
                                                สินค้าของท่านได้รับการจัดส่งแล้ว
                                                ขอบคุณสำหรับการสั่งผลไม้ออนไลน์กับทางเทศบาล
                                                และหวังว่าจะได้รับโอกาสบริการท่านอีกครั้ง!

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!--            <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</div>-->
                    </div>
                </div>
            </div>

        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->