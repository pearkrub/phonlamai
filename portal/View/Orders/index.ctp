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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> ข้อมูลการซื้อขาย
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ลูกค้า</th>
<!--                        <th>ราคา(บาท)</th>-->
                        <th>วันที่สั่งซื้อ</th>
                        <th>สถานะ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($orders as $key => $order) { ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td>
                                <a title="ดูรายละเอียดใบสั่งซื้อ"
                                   href="orders/view/<?php echo $order['Order']['id'] ?>"><?php echo $order['Order']['order_no'] ?></a>
                            </td>
                            <td>
                                <?php
                                $address = json_decode($order['Order']['shipping_address'], true);
                                if (!empty($address)) {
                                    ?>
                                    <p>
                                        คุณ: <?php echo $address['CustomerAddress']['full_name'] ?></p>
                                    <p> ที่อยู่: <?php echo $address['CustomerAddress']['address'] ?>
                                        ต.<?php echo $address['District']['district_name'] ?>
                                        อ.<?php echo $address['Amphure']['amphur_name'] ?>
                                        จ.<?php echo $address['Province']['province_name'] ?> <?php echo $address['CustomerAddress']['zipcode'] ?></p>
                                <?php } ?>
                            </td>
<!--                            <td>-->
<!--                                        <span>--><?php //echo number_format($order['Order']['summary'], 2, '.', ',') ?>
<!--                                            </span>-->
<!--                            </td>-->
                            <td>
                                <?php echo DateTimeThai($order['Order']['order_date']) ?>
                            </td>
                            <td>
                                <?php if ($order['Order']['step'] == 4) { ?>
                                    <span class="badge badge-success"><i class="fa fa-check"></i> ส่งสินค้าแล้ว</span>
                                <?php } ?>
                                <?php if ($order['Order']['step'] == 1) { ?>
                                    <span class="badge badge-primary"><i
                                                class="fa fa-spinner fa-spin"></i> รอตรวจสอบ</span>
                                <?php } ?>
                                <?php if ($order['Order']['step'] == 2) { ?>
                                    <span class="badge badge-primary"><i
                                                class="fa fa-refresh"></i> กำลังจัดหาสินค้า</span>
                                <?php } ?>
                                <?php if ($order['Order']['step'] == 3) { ?>
                                    <span class="badge badge-primary"><i class="fa fa-truck"></i> กำลังจัดส่ง</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
