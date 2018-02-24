<div class="row">
    <div class="col-md-6">
        <h5 class="thin subtitle">เลือกช่องทางการชำระเงิน</h5>

        <label class="thin subtitle">
            <input required type="radio" name="payment_method" value="pay_at_store"/>
             <i class="fa fa-home mr-10"></i><b>จ่ายเงินที่เทศบาล</b>
        </label><br>
        <label class="thin subtitle">
            <input required type="radio" name="payment_method" value="bank"/>
             <i class="fa fa-credit-card mr-10"></i><b>โอนผ่านธนาคาร</b>
        </label>
        <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingPayment1">
                    <h4 class="panel-title">
                        <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                            <i class="fa fa-credit-card mr-10"></i>โอนผ่านธนาคาร
                        </a>
                    </h4><!-- end panel-title -->
                </div><!-- end panel-heading -->
                <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                    <div class="panel-body">
                        
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->
        </div><!-- end panel-group -->
    </div><!-- end col -->
    <div class="col-md-6">
        <h5 class="thin subtitle">เกี่ยวกับการชำระเงิน</h5>
        <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="questionOne">
                    <h4 class="panel-title">
                        <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                            ฉันจะชำระผ่านธนาคารอย่างไร ?
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                    <div class="panel-body">
                        <ul>
                            <li>โอนเข้าบัญชีตามธนาคารที่เทศบาลแจ้งไว้ทางซ้ายมือ</li>
                            <li>เมื่อโอนเสร็จ ถ่ายรูปหลักฐานการโอนเงินไว้</li>
                        </ul>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="questionTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                            การแจ้งชำระเงิน (โอนผ่านธนาคาร)
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                    <div class="panel-body">
                        <ul>
                            <li>เข้าเมนู แจ้งชำระเงิน ที่เมนูด้านบน</li>
                            <li>กรอกข้อมูลการโอนเงิน วัน/เวลา/ยอกที่โอน</li>
                            <li>อัปโหลดรูปภาพหลักฐานการโอนเงิน</li>
                        </ul>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="questionThree">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                        การชำระเงิน (จ่ายเงินที่เทศบาล)
                        </a>
                    </h4>
                </div><!-- end panel-heading -->
                <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                    <div class="panel-body">
                    <ul>
                            <li>เมื่อทำการสั่งซื้อสำเร็จให้ปริ้นใบสั่งซื้อ</li>
                            <li>นำใบสั่งซื้อไปชำระเงินที่เทศบาล</li>
                            <li>ติดตามสถานะใบสั่งซื้อ</li>
                        </ul>
                    </div><!-- end panel-body -->
                </div><!-- end collapse -->
            </div><!-- end panel -->
        </div><!-- end panel-group -->
    </div><!-- end col -->
</div><!-- end row -->
<div class="text-right">
    <button type="submit" class="btn btn-default semi-circle btn-md">
        <i class="fa fa-check mr-5"></i> ยืนยันการสั่งซื้อ
    </button>
</div>