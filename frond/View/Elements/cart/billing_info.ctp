<?php if (!empty($CustomerAddresses)) { ?>

    <div class="row">
        <?php foreach ($CustomerAddresses as $address) { ?>
            <div class="col-md-6 panel panel-default" style="margin-left: 5px; margin-right: 5px">
                <div class="panel-body">

                    <label class="thin subtitle">
                        <input required type="radio" name="address_id" value="<?php echo $address['CustomerAddress']['id'] ?>"/>
                        <b><?php echo $address['CustomerAddress']['title'] ?></b>
                    </label>
                    <p>
                        <?php echo $address['CustomerAddress']['address'] ?>
                        ต. <?php echo $address['District']['district_name'] ?>
                    </p>
                    <p>
                        อ.<?php echo $address['Amphure']['amphur_name'] ?>
                        จ.<?php echo $address['Province']['province_name'] ?>
                    </p>
                    <p>
                        <?php echo $address['CustomerAddress']['zipcode'] ?>
                    </p>
                    <a onclick="addAddress(<?php echo $address['CustomerAddress']['id'] ?>)" data-toggle="modal" data-target=".addressModal" class="card-link label label-info">แก้ไข</a>
                    <a onclick="removeAddress(<?php echo $address['CustomerAddress']['id'] ?>)" class="card-link label label-danger">ลบ</a>
                </div><!-- end col -->
            </div>
        <?php } ?>
    </div><!-- end row -->
    <div class="row text-center">
        <button class="btn btn-primary" onclick="addAddress()" data-toggle="modal" data-target=".addressModal"><i
                    class="fa fa-plus"></i> เพิ่มที่อยู่
        </button>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3><span class="fa fa-file-text"></span></h3>
            <h6>คุณยังไม่มีที่อยู่สำหรับจัดส่ง</h6><br>
            <button class="btn btn-primary" onclick="addAddress()" data-toggle="modal" data-target=".addressModal"><i
                        class="fa fa-plus"></i> เพิ่มที่อยู่
            </button>
        </div>
    </div><!-- end row -->
<?php } ?>
