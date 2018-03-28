<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">ข้อมูลใบสั่งซื้อ</h2>
            <div class="actions panel_actions pull-right no-print">
                <a class="box_toggle fa fa-chevron-down"></a>
                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                <a class="box_close fa fa-times"></a>
            </div>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">


                    <!-- start -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="invoice-head">
                                <div class="col-xs-12 col-md-2 invoice-title">
                                    <h2 class="text-center bg-primary ">Invoice</h2>
                                </div>
                                <div class="col-xs-12 col-md-3 invoice-head-info">
                            <span class="text-muted">
                            เทศบาลตำบลปลายบาง <br>อำเภอบางกรวย <br> จังหวัดนนทบุรี
                            </span>
                                </div>
                                <div class="col-xs-12 col-md-3 invoice-head-info"><span
                                            class="text-muted">Invoice No # <?php echo $order['Order']['order_no'] ?>
                                        <br><?php echo $this->Phonlamai->DateTimeThai($order['Order']['order_date']) ?></span>
                                </div>
                                <div class="col-xs-12 col-md-3 invoice-logo col-md-offset-1">
                                    <!-- <img src="../data/invoice/invoice-logo.png" class="img-reponsive"> -->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <div class="col-xs-6 invoice-infoblock pull-left">
                            <h4>ที่อยู่สำหรับจัดส่ง :</h4>
                            <address>
                                <?php $address = json_decode($order['Order']['shipping_address'], true); ?>
                                <h3>คุณ <?php echo $address['CustomerAddress']['full_name'] ?></h3>
                                <span class="text-muted">
                            <?php echo $address['CustomerAddress']['address'] ?><br>
                            ต.<?php echo $address['District']['district_name'] ?>
                                    อ.<?php echo $address['Amphure']['amphur_name'] ?><br>
                            จ.<?php echo $address['Province']['province_name'] ?>
                                    <br><?php echo $address['CustomerAddress']['zipcode'] ?></span>
                            </address>
                        </div>

                        <div class="col-xs-6 invoice-infoblock text-right">
                            <h4>ช่องทางการชำระเงิน :</h4>
                            <address>
                                <span class="text-muted"><?php echo $order['Order']['payment_method'] == 'bank' ? 'โอนผ่านธนาคาร' : 'จ่ายที่เทศบาล' ?></span>
                            </address>

                            <div class="invoice-due">
                                <h3 class="text-muted">ยอดรวม:</h3> &nbsp; <h2
                                        class="text-primary"><?php echo number_format($order['Order']['summary']) ?>
                                    บาท</h2>
                            </div>

                        </div>


                        <div class="clearfix"></div>
                        <br>

                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <h3>รายการสินค้า</h3><br>
                            <div class="table-responsive">
                                <table class="table table-hover invoice-table">
                                    <thead>
                                    <tr>
                                        <td><h4>สินค้า</h4></td>
                                        <td class="text-center"><h4>ราคา</h4></td>
                                        <td class="text-center"><h4>จำนวน</h4></td>
                                        <td class="text-right"><h4>รวม</h4></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($order['OrderDetail'] as $detail) { ?>
                                        <tr>
                                            <td><?php echo $detail['product_name'] ?></td>
                                            <td class="text-center"><?php echo number_format($detail['price']) ?></td>
                                            <td class="text-center"><?php echo $detail['count'] ?></td>
                                            <td class="text-right"><?php echo number_format($detail['total_price']) ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center">
                                            <h4>ราคารวม</h4></td>
                                        <td class="thick-line text-right">
                                            <h4><?php echo number_format($order['Order']['summary']) ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center">
                                            <h4>ค่าขนส่ง</h4></td>
                                        <td class="no-line text-right">
                                            <h4>ฟรี</h4></td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center">
                                            <h4>รวมทั้งหมด</h4></td>
                                        <td class="no-line text-right">
                                            <h3 style="margin:0px;"
                                                class="text-primary"><?php echo number_format($order['Order']['summary']) ?></h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <br>

                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <a href="#" onclick="window.print()" class="btn btn-purple btn-md no-print"><i
                                        class="fa fa-print"></i> &nbsp; พิมพ์ </a>
                        </div>
                    </div>


                    <!-- end -->


                </div>
            </div>
        </div>
    </section>
</div>
<?php if (!empty($order['InformPayment'])) { ?>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">ข้อมูลการชำระเงิน</h2>
                <div class="actions panel_actions pull-right no-print">
                    <a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3>รายการแจ้งชำระ</h3><br>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <td><h4>วันที่แจ้งโอน</h4></td>
                                            <td><h4>ธนาคารที่แจ้ง</h4></td>
                                            <td class="text-center"><h4>จำนวนเงิน</h4></td>
                                            <!-- <td class="text-center"><h4>หลักฐานการโอนเงิน</h4></td> -->
                                            <td class="text-center"><h4>ตรวจสอบ</h4></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($order['InformPayment'] as $inform) { ?>
                                            <tr>
                                                <td><?php echo $this->Phonlamai->DateTimeThai($inform['payment_date']) ?></td>
                                                <td><?php echo $inform['bank_name'] ?></td>
                                                <td class="text-center"><?php echo number_format($inform['amount']) ?></td>
                                                <td class="text-center"><a target="_blank" class="btn btn-info btn-sm"
                                                                           href="<?php echo Configure::read('App.Domain') . $inform['document_path'] ?>"><i
                                                                class="fa fa-info"></i> ดูหลักฐาน</a></td>
                                                <!-- <td class="text-center"><a class="btn btn-info"><i class="fa fa-info"></i></a></td> -->
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                    </div>
        </section>

    </div>
<?php } ?>
<div class="row">
    <div class="col-xs-12 text-left">
        <?php if ($order['Order']['step'] == 1) { ?>
            <a onclick="approveOrder(<?php echo $order['Order']['id'] ?>)" class="btn btn-primary btn-md no-print"><i
                        class="fa fa-check"></i> &nbsp; ยืนยันการตรวจสอบ </a>
        <?php } else { ?>
            <a class="btn btn-success btn-md no-print"><i class="fa fa-check"></i> &nbsp; ชำระเงินแล้ว </a>
        <?php } ?>
    </div>
</div>
<script>
    function approveOrder(id) {
        swal({
            title: 'ยืนยัน',
            text: 'ยืนยันว่าชำระเงินแล้ว',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            var url = '/orders/approve'
            $.post(url, {id: id}, function (e) {
                if (e == 1) {
                    swal(
                        'สำเร็จ!',
                        'ยืนยันว่าตรวจสอบแล้ว',
                        'success'
                    )
                    location.reload()
                } else {
                    swal(
                        'ผิดพลาด!',
                        'ไม่สามารถดำเนินการได้',
                        'error'
                    )
                }
            })
        }).catch(
            function () {

            }
        )
    }
</script>