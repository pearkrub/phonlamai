<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">ข้อมูลการแจ้งชำระเงิน</h2>
<!--            <div class="actions panel_actions pull-right">-->
<!--                <a class="box_toggle fa fa-chevron-down"></a>-->
<!--                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>-->
<!--                <a class="box_close fa fa-times"></a>-->
<!--            </div>-->
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>เลขที่ใบเสร็จ</th>
                                <th>เวลาโอน</th>
                                <th>จำนวนเงิน</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($informs as $key => $inform) { ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td>
                                        <?php echo $inform['Order']['order_no'] ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Phonlamai->DateTimeThai($inform['InformPayment']['payment_date']) ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($inform['InformPayment']['amount']) ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $inform['InformPayment']['status'] == 'new'? 'แจ้งใหม่': 'ตรวจสอบแล้ว' ?>
                                    </td>
                                    <td class="text-center">
                                        <a title="ดูรายละเอียด" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a title="ยืนยันการตรวจสอบ" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
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
    $(document).ready(function () {
        $('.DTTT_button_text').hide()
    })
</script>