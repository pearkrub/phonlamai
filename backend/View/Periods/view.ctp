<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">ข้อมูลงวด (<?php echo $period['Period']['month_year'] ?>)</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>เชื่อร้าน</th>
                                <th>จำนวนเงินรวม</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($details as $key => $detail) { ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td>
                                        <?php echo $detail['Merchant']['shop_name'] ?>
                                        <div id="bank_info_<?php echo $detail['OrderDetail']['merchant_id'] ?>"
                                             style="display: block">
                                            <ul>
                                                <li>ธนาคาร: <?php echo $detail['Merchant']['bank_name'] ?></li>
                                                <li>
                                                    ชื่อบัญชี: <?php echo $detail['Merchant']['bank_account_name'] ?></li>
                                                <li>
                                                    เลขที่บัญชี: <?php echo $detail['Merchant']['bank_account_number'] ?></li>
                                                <li>
                                                    ประเภท: <?php echo $detail['Merchant']['bank_type'] == 'saving' ? 'ออมทรัพย์' : 'ฝากประจำ' ?></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span><?php echo number_format($detail[0]['total'], 2, '.', ',') ?>
                                            </span>
                                    </td>
                                    <td>
                                        <?php echo $detail['OrderDetail']['transfer'] == 'wait_transfer' ? 'รอโอน' : '<label class="label label-success">โอนแล้ว</label>' ?>
                                    </td>
                                    <td>
                                        <?php if ($detail['OrderDetail']['transfer'] == 'wait_transfer') { ?>
                                            <a onclick="isTransfer(<?php echo $period['Period']['id'] ?>,<?php echo $detail['OrderDetail']['merchant_id'] ?>)"
                                               class="btn-sm btn btn-info">ยืนยันโอนเงิน</a>
                                        <?php } else { ?>
                                            <a class="btn-sm btn btn-success"><i class="fa fa-check"></i> โอนเงินแล้ว</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2" class="text-center">
                                    รวม
                                </td>
                                <td>
                                        <span><?php echo number_format($period['Period']['total'], 2, '.', ',') ?>
                                            </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
<script>
    function isTransfer(id,merchant_id) {
        swal({
            title: 'ยืนยัน',
            text: 'ยืนยันว่าโอนเงินแล้ว',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            var url = '/periods/confirmTransfer'
            $.post(url, {merchant_id: merchant_id, id: id}, function (e) {
                if (e == 1) {
                    swal(
                        'สำเร็จ!',
                        'บันทึกข้อมูลแล้ว',
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