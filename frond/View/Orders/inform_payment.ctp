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
    <div class="col-sm-9">
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
                            <input required type="text" name="order_no" class="form-control input-md" id="order_no"
                                   placeholder="INV2018xxxxxx">
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
                            <input required type="text" name="amount" class="form-control input-md" id="amount"
                                   placeholder="0">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="document" class="col-sm-3 control-label">หลักฐานการโอน <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input required type="file" name="document" class="form-control input-md" id="document"/>
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