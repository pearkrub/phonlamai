<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-0 clearfix">
                <i class="fa fa-money bg-primary p-4 px-5 font-2xl mr-3 float-left"></i>
                <div class="h5 mb-0 pt-3 text-center"><?php echo number_format($mounth) ?> บาท</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs text-center">ยอดขายเดือนนี้</div>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-0 clearfix">
                <i class="fa fa-laptop bg-danger p-4 px-5 font-2xl mr-3 float-left"></i>
                <div class="h5 mb-0 pt-3 text-center"><?php echo number_format($all) ?> บาท</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs text-center">ยอดขายทั้งหมด</div>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-0 clearfix">
                <i class="fa fa-shopping-cart bg-success p-4 px-5 font-2xl mr-3 float-left"></i>
                <div class="h5 mb-0 pt-3 text-center"><?php echo number_format($all_order) ?> รายการ</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs text-center">รายการสั่งซื้อ</div>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body p-0 clearfix">
                <i class="fa fa-product-hunt bg-info p-4 px-5 font-2xl mr-3 float-left"></i>
                <div class="h5 mb-0 pt-3 text-center"><?php echo number_format($product_count) ?> รายการ</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs text-center">สินค้าทั้งหมด</div>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!--/.row-->
                <br>
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                    <tr>
                        <!--                        <th class="text-center"><i class="icon-people"></i></th>-->
                        <th>ลูกค้า</th>
                        <th class="text-center">สินค้า</th>
                        <!--                        <th>Usage</th>-->
                        <th class="text-center">การชำระเงิน</th>
                        <th>สั่งซื้อเมื่อ</th>
                        <th class="text-center">ยอดสั่งซื้อ (บาท)</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order_details as $detail){ ?>
                    <tr>
                        <td>
                            <div><?php echo $detail['Customer']['first_name'].' '.$detail['Customer']['last_name'] ?></div>
                        </td>
                        <td>
                            <?php echo $detail['Product']['name'] ?>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-check"></i> <?php echo $detail['Order']['payment_method'] == 'bank'? 'โอนผ่านธนาคาร': 'จ่ายเงินที่เทศบาล' ?>
                        </td>
                        <td>
                            <div class="small text-muted"><?php echo $this->Phonlamai->DateTimeThai($detail['Order']['order_date']) ?></div>
                            <strong><?php echo $this->Phonlamai->timeAgo($detail['Order']['order_date']) ?></strong>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($detail['OrderDetail']['total_price']) ?>
                        </td>
                        <td class="text-center">
                            <a href="/orders/view/<?php echo $detail['Order']['id'] ?>" class="btn btn-primary btn-sm"><i class="icon-info"></i> ดูรายละเอียด</a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>
<!--/.row-->