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
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12 text-left">
            <h2 class="title">รายการสั่งซื้อ</h2>
        </div><!-- end col -->
    </div><!-- end row -->

    <hr class="spacer-5">
    <hr class="spacer-20 no-border">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ที่อยู่</th>
                        <th>ราคา</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>สถานะ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($orders as $order) { ?>
                        <tr>
                            <td>
                                <a title="ดูรายละเอียดใบสั่งซื้อ" href="orders/view/<?php echo $order['Order']['id'] ?>"><?php echo $order['Order']['order_no'] ?></a>
                            </td>
                            <td>
                                <?php
                                $address = json_decode($order['Order']['shipping_address'], true);
                                ?>
<!--                                <h6 class="regular"><a href="shop-single-product-v1.html">--><?php //echo $address['CustomerAddress']['title'] ?><!--</a></h6>-->
                                <p><?php echo $address['CustomerAddress']['address'] ?>
                                    ต.<?php echo $address['District']['district_name'] ?></p><p> อ.<?php echo $address['Amphure']['amphur_name'] ?>
                                จ.<?php echo $address['Province']['province_name'] ?> <?php echo $address['CustomerAddress']['zipcode'] ?></p>
                            </td>
                            <td>
                                <span><?php echo number_format($order['Order']['summary'],2, '.',',') ?> บาท</span>
                            </td>
                            <td>
                                <?php echo DateTimeThai($order['Order']['order_date']) ?>
                            </td>
                            <td>
                                <span class="label label-primary">รอตรวจสอบ</span>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table><!-- end table -->
            </div><!-- end table-responsive -->

            <hr class="spacer-10 no-border">

            <a href="/" class="btn btn-light semi-circle btn-md">
                <i class="fa fa-arrow-left mr-5"></i> เลือกซื้อสินค้าต่อ
            </a>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->