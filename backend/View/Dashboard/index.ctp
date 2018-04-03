
        <div class="col-xs-12">
            <div class="page-title">

                <div class="pull-left">
                    <!-- PAGE HEADING TAG - START --><h1 class="title">Dashboard</h1><!-- PAGE HEADING TAG - END -->                            </div>


            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-md-12">
            <div class="row">
                <div class="col-xs-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">ลูกค้า</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="width:60%">ชื่อ</th>
                                    <th style="width:30%">สมัครเมื่อ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($customers as $customer){ ?>
                                <tr>
                                    <td><?php echo $customer['Customer']['first_name'].' '.$customer['Customer']['last_name'] ?></td>
                                    <td><?php echo $this->Phonlamai->DateTimeThai($customer['Customer']['created']) ?></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>


                        </div>
                    </section>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">เกษตกร</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="width:60%">ชื่อ</th>
                                    <th style="width:30%">สมัครเมื่อ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($merchants as $merchant){ ?>
                                    <tr>
                                        <td><?php echo $merchant['Merchant']['first_name'].' '.$merchant['Merchant']['last_name'] ?></td>
                                        <td><?php echo $this->Phonlamai->DateTimeThai($merchant['Merchant']['created']) ?></td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>


                        </div>
                    </section>

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-12">
            <div class="row">
                <div class="col-xs-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">รายการสั่งซื้อใหม่</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ลูกค้า</th>
                                    <th>เลขที่ใบเสร็จ</th>
                                    <th>ยอดสั่งซื้อ</th>
                                    <th>สั่งซื้อเมื่อ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($newOrders as $newOrder) { ?>
                                <tr>

                                    <td>คุณ <?php echo $newOrder['Customer']['first_name'].' '.$newOrder['Customer']['last_name'] ?></td>
                                    <td><a href="/orders/view/<?php echo $newOrder['Order']['id'] ?>"><?php echo $newOrder['Order']['order_no'] ?></a></td>
                                    <td><?php echo number_format($newOrder['Order']['summary']) ?> บาท</td>
                                    <td><?php echo $this->Phonlamai->timeAgo($newOrder['Order']['order_date']) ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>


                        </div>
                    </section>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">รายการแจ้งชำระใหม่</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>เลขที่ใบเสร็จ</th>
                                    <th>เวลาโอน</th>
                                    <th>จำนวนเงิน</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($newInforms as $key => $inform) { ?>
                                    <tr>
                                        <!--                                    <td>--><?php //echo ++$key ?><!--</td>-->
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
                                            <a href="/orders/view/<?php echo $inform['InformPayment']['order_id'] ?>" title="ดูรายละเอียด" class="btn btn-info btn-sm">ดูรายละเอียด</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>


                        </div>
                    </section>

                </div>
            </div>
        </div>