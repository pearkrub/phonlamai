<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Invoice
            <strong>#<?php echo $order['Order']['order_no'] ?></strong>
            <a href="#" class="btn btn-sm btn-info float-right no-print" onclick="javascript:window.print();"><i
                        class="fa fa-print"></i> Print</a>
        </div>
        <div class="card-body">
            <div class="row mb-4">

                <div class="col-sm-4">
                    <h6 class="mb-3">จาก:</h6>
                    <div>
                        <strong><?php echo $merchant['Merchant']['shop_name'] ?></strong>
                    </div>
                    <div><?php echo $merchant['Merchant']['address'] ?></div>
                    <div>
                        <?php echo $merchant['District']['district_name'] ?>
                        <?php echo $merchant['Amphure']['amphur_name'] ?><br>
                        <?php echo $merchant['Province']['province_name'] ?>
                        <?php echo $merchant['Merchant']['zipcode'] ?>
                    </div>
                    <div>อีเมล: <?php echo $merchant['Merchant']['email'] ?></div>
                    <div>โทร: <?php echo $merchant['Merchant']['phone'] ?></div>
                </div>
                <!--/.col-->
                <?php $address = json_decode($order['Order']['shipping_address'], true); ?>
                <div class="col-sm-4">
                    <h6 class="mb-3">ถึง:</h6>
                    <div>
                        <strong>คุณ <?php echo $address['CustomerAddress']['full_name'] ?></strong>
                    </div>
                    <div><?php echo $address['CustomerAddress']['address'] ?></div>
                    <div>
                        <?php echo $address['District']['district_name'] ?>
                        <?php echo $address['Amphure']['amphur_name'] ?><br>
                        <?php echo $address['Province']['province_name'] ?>
                        <?php echo $address['CustomerAddress']['zipcode'] ?>
                    </div>
                    <div>อีเมล: <?php echo $order['Customer']['email'] ?></div>
                    <div>โทร: <?php echo $order['Customer']['phone'] ?></div>
                </div>
                <!--/.col-->

                <div class="col-sm-4">
                    <h6 class="mb-3">ใบเสร็จ:</h6>
                    <div>Invoice
                        <strong>#<?php echo $order['Order']['order_no'] ?></strong>
                    </div>
                    <div><?php echo $this->Phonlamai->DateTimeThai($order['Order']['order_date']) ?></div>
                    <div>สถานะ: ชำระเงินแล้ว <i class="fa fa-check"></i></div>
                    <!--                    <div>ชื่อผู้เสียภาษี: เทศบาลตำบลปลายบาง</div>-->
                    <!--                    <div>-->
                    <!--                        <strong>SWIFT code: 99 8888 7777 6666 5555</strong>-->
                    <!--                    </div>-->
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>สินค้า</th>
                        <th>ประเภท</th>
                        <th class="center">จำนวน</th>
                        <th class="right">ราคา</th>
                        <th class="right">รวม</th>
                        <th class="right no-print">สถานะ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0;
                    foreach ($order['OrderDetail'] as $detail) {
                        if ($detail['merchant_id'] == $merchant['Merchant']['id']) {
                            ?>
                            <tr>
                                <td class="center">1</td>
                                <td class="left"><?php echo $detail['Product']['name'] ?></td>
                                <td class="left">สั่งซื้อล่วงหน้า <?php echo $detail['category_id'] ?> เดือน</td>
                                <td class="center"><?php echo number_format($detail['count']) . ' ' . $detail['Product']['price_per_key'] ?></td>
                                <td class="right"><?php echo number_format($detail['price']) ?></td>
                                <td class="right"><?php echo number_format($detail['total_price']) ?></td>
                                <td class="right no-print">
                                    <?php if($detail['status'] == 'received'){
                                        echo 'รับสินค้าแล้ว';
                                    }else if($detail['status'] == 'refunded'){
                                        echo 'ลูกค้าแจ้งคืนสินค้า';
                                    }else{ ?>
                                    <select class="form-control col-md-6 changeStatus" onchange="changeStatus(event,<?php echo $detail['id'] ?>)">
                                        <option <?php if($detail['status'] == '') echo 'selected'?> value="">รอจัดส่ง</option>
                                        <option <?php if($detail['status'] == 'shipping') echo 'selected'?> value="shipping">กำลังจัดส่ง</option>
                                        <option <?php if($detail['status'] == 'delivered') echo 'selected'?> value="delivered">ส่งสินค้าแล้ว</option>
                                    </select>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
                            $total = $total + $detail['total_price'];
                        }
                    } ?>
                    </tbody>
                </table>
            </div>

            <div class="row">

                <!--                <div class="col-lg-4 col-sm-5">-->
                <!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor-->
                <!--                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.-->
                <!--                </div>-->
                <!--/.col-->

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>รวมทั้งหมด</strong>
                            </td>
                            <td class="right">
                                <strong><?php echo number_format($total) ?> บาท</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
<!--                    <a href="#" class="btn btn-success no-print"><i class="fa fa-check"></i> ชำระเงินแล้ว</a>-->
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->
        </div>
    </div>


    <?php if (!empty($order['InformPayment'])) { ?>
        <div class="row no-print">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> ข้อมูลการชำระเงิน
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm">
                            <thead>
                            <tr>
                            <tr>
                                <td>วันที่แจ้งโอน</td>
                                <td>ธนาคารที่แจ้ง</td>
                                <td>จำนวนเงิน</td>
                                <td>ตรวจสอบ</td>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($order['InformPayment'] as $inform) { ?>
                                <tr>
                                    <td><?php echo $this->Phonlamai->DateTimeThai($inform['payment_date']) ?></td>
                                    <td><?php echo $inform['bank_name'] ?></td>
                                    <td><?php echo number_format($inform['amount']) ?></td>
                                    <td><a target="_blank" class="btn btn-info btn-sm"
                                           href="<?php echo Configure::read('App.Domain') . $inform['document_path'] ?>"><i
                                                    class="fa fa-info"></i> ดูหลักฐาน</a></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
    <?php } ?>
</div>
<script>
    function changeStatus(event,id) {
        console.log(event.target.value)
        console.log(id)
        var url = '/orders/changeStatus'
        $.post(url, {id: id, status: event.target.value}, function (e) {
            if (e == 1) {
                swal(
                    'สำเร็จ!',
                    'อับเดทสถานะเรียบร้อย',
                    'success'
                )
            } else {
                swal(
                    'ผิดพลาด!',
                    'ไม่สามารถดำเนินการได้',
                    'error'
                )
            }
        })

    }
</script>