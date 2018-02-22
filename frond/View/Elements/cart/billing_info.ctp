<?php if (!empty($memberAddress)) { ?>
    <div class="row">
        <div class="col-md-6 panel panel-default">
            <div class="panel-body">
                <label class="thin subtitle"><input type="radio" name="address" value="1"/>
                    ที่อยู่สำหรับจัดส่งสินค้า</label>
                <p>
                    15/5 ต. ในเมือง อ.เมือง จ.มุกดาหาร 36598
                </p>

            </div><!-- end col -->
        </div>
    </div><!-- end row -->
<?php } else { ?>
    <div class="row">
        <div class="col-md-12 text-center">
                <h3><span class="fa fa-file-text"></span></h3>
                <h5>คุณยังไม่มีที่อยู่สำหรับจัดส่ง</h5><br>
                <button class="btn btn-primary" onclick="addAddress()" data-toggle="modal" data-target=".addressModal"><i class="fa fa-plus"></i> เพิ่มที่อยู่</button>
        </div>
    </div><!-- end row -->
<?php } ?>
