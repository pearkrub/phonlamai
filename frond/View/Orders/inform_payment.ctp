<?php
$Auth = $this->Session->read('Auth');
if (!empty($Auth)) { ?>
<div class="row">
    <?php if (!empty($response)) { ?>
        <?php if ($response == 'success') { ?>
            <div class="alert alert-success"><strong>แจ้งชำระเงินสำเร็จ <i class="fa fa-check"></i></strong> <br>
                กรุณารอการตรวจสอบทางเทศบาล
            </div>
        <?php } ?>
        <?php if ($response == 'emptyOrder') { ?>
            <div class="alert alert-warning"><strong>ผิดพลาด <i class="fa fa-warning"></i></strong> <br>
                ไม่พบข้อมูลใบสั่งซื้อ
            </div>
        <?php } ?>
        <?php if ($response == 'errorUpload') { ?>
            <div class="alert alert-warning"><strong>ผิดพลาด <i class="fa fa-warning"></i></strong> <br>
                ไม่สามารถอัปโหลดใบสั่งซื้อได้
            </div>
        <?php }
    } ?>
    <div class="col-md-6">
        <div class="panel-group accordion style2 panel-bank" id="accordionPayment" role="tablist"
             aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingPayment1">
                    <h4 class="panel-title">
                        <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1"
                           aria-expanded="true" aria-controls="collapsePayment1">
                            <i class="fa fa-credit-card mr-10"></i>โอนผ่านธนาคาร
                        </a>
                    </h4><!-- end panel-title -->
                </div><!-- end panel-heading -->
                <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingPayment1">
                    <div class="panel-body">
                        <div class="row col-md-6">
                            <div class="text-center"><img src="/img/bank/krb.png" style="width: 150px;height: 150px;">
                            </div>
                            <div class="text-center">ธนาคารกรุงไทย</div>
                            <div class="text-center">ชื่อบัญชี เทศบาลปลายบาง</div>
                            <div class="text-center">เลขที่ 132-4-54446-9</div>
                        </div>
                        <div class="row col-md-6">
                            <div class="text-center"><img src="/img/bank/kbank.png" style="width: 150px;height: 150px;">
                            </div>
                            <div class="text-center">ธนาคารกสิกรไทย</div>
                            <div class="text-center">ชื่อบัญชี เทศบาลปลายบาง</div>
                            <div class="text-center">เลขที่ 546-4-23423-3</div>
                        </div>
                        <div class="row col-md-6">
                            <br>
                            <div class="text-center"><img src="/img/bank/BBL.png" style="width: 150px;height: 150px;">
                            </div>
                            <div class="text-center">ธนาคารกรุงเทพ</div>
                            <div class="text-center">ชื่อบัญชี เทศบาลปลายบาง</div>
                            <div class="text-center">เลขที่ 343-4-36784-1</div>
                        </div>
                        <div class="row col-md-6">
                            <br>
                            <div class="text-center"><img src="/img/bank/scb.png" style="width: 150px;height: 150px;">
                            </div>
                            <div class="text-center">ธนาคารไทยพานิชย์</div>
                            <div class="text-center">ชื่อบัญชี เทศบาลปลายบาง</div>
                            <div class="text-center">เลขที่ 895-4-45332-7</div>
                        </div>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->
        </div><!-- end panel-group -->
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12 text-left">
                <h2 class="title">แจ้งชำระเงิน</h2>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-5">
        <hr class="spacer-20 no-border">

        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-12">
                <form class="form-horizontal inform-payment-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="order_no" class="col-sm-3 control-label">เลขที่ใบเสร็จ <span
                                    class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input required type="text" value="<?php echo empty($order['Order']['order_no'])? '': $order['Order']['order_no'] ?>" name="order_no" class="form-control input-md" id="order_no"
                                   placeholder="INV2018xxxxxx">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="bank" class="col-sm-3 control-label">ธนาคารที่โอน <span
                                    class="text-danger">*</span>
                        </label>
                        <div class="col-sm-9">
                           <select required name="bank" class="form-control input-md">
                               <option value="">- - -เลือกธนาคาร- - -</option>
                               <option value="krb">ธนาคารกรุงไทย</option>
                               <option value="kbank">ธนาคารกสิกรไทย</option>
                               <option value="bbl">ธนาคารกรุงเทพ</option>
                               <option value="scb">ธนาคารไทยพานิชย์</option>
                           </select>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="payment_date" class="col-sm-3 control-label">วัน-เวลา ที่โอนเงิน <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class='input-group date' id='datetimepicker2'>
                                <input required type="text" name="payment_date" value="<?php echo date('Y-m-d H:i') ?>"
                                       class="form-control input-md"
                                       id="payment_date"
                                       placeholder="YYYY-MM-DD 00:00:00">
                                <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label ">จำนานเงินที่โอน(บาท)<span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input required type="text" name="amount" value="<?php echo empty($order['Order']['summary'])? '': $order['Order']['summary'] ?>" class="form-control input-md" id="amount"
                                   placeholder="0">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="document" class="col-sm-3 control-label">หลักฐานการโอน <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input required type="file" accept="image/*" name="document" class="form-control input-md" id="document"/>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <a onclick="saveInformPayment()" class="btn btn-default round btn-md"><i
                                        class="fa fa-check mr-5"></i> แจ้งชำระเงิน
                            </a>
                        </div>
                    </div><!-- end form-group -->
                    <input type="hidden" id="error_count_inform">
                </form>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div>
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker();
    });
</script>

<?php } else { ?>
    <div class="row">
        <!-- start sidebar -->
        <div class="col-sm-3">
            <div class="widget">
                <h6 class="subtitle"></h6>
                <figure>
                    <a href="javascript:void(0);">
                        <img src="/img/products/regis.png" alt="collection">
                    </a>
                </figure>
            </div><!-- end widget -->
        </div><!-- end col -->
        <!-- end sidebar -->
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <h2 class="title">คุณยังไม่ได้เข้าสู่ระบบ</h2>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-5">
            <hr class="spacer-20 no-border">

            <a class="btn btn-primary" data-toggle="modal" data-target=".loginModal"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</a>
        </div><!-- end col -->
    </div>
<?php } ?>
