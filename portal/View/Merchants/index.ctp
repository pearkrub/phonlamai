<div class="row">
    <?php if (!empty($this->request->query['status'])) {
        $status = $this->request->query['status'];
        ?>
        <?php if ($status == 'success') { ?>
            <div class="col-md-12">
                <div class="alert alert-success"><strong><i class="fa fa-check"></i></strong> บันทึกข้อมูลสำเร็จ</div>
            </div>
        <?php } ?>
        <?php if ($status == 'error_old_password') { ?>
            <div class="col-md-12">
                <div class="alert alert-danger"><strong><i class="fa fa-warning"></i></strong> รหัสผ่านเดิมไม่ถูกต้อง</div>
            </div>
        <?php } ?>
        <?php if ($status == 'error_new_password') { ?>
            <div class="col-md-12">
                <div class="alert alert-danger"><strong><i class="fa fa-warning"></i></strong> รหัสผ่านใหม่ไม่ตรงกันหรือส่างเปล่า</div>
            </div>
        <?php } ?>
        <?php if ($status == 'fail') { ?>
            <div class="col-md-12">
                <div class="alert alert-danger"><strong><i class="fa fa-warning"></i></strong> มีบางอย่างผิดพลาด</div>
            </div>
        <?php } ?>
    <?php } ?>
    <div class="col-md-12">
        <div class="card">
            <form action="/merchants/save" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-header">
                    <strong>ข้อมูลร้านค้า</strong>
                    ( <?php echo $profile['Merchant']['status'] == 'Y' ? 'เป็นทางการ' : 'ไม่เป็นทางการ' ?> )
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="shop_name" class="col-sm-2 control-label">ชื่อร้านค้า</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['shop_name'] ?>" name="shop_name"
                                   class="form-control input-md" id="shop_name"
                                   placeholder="Shop name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 control-label">ชื่อ</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['first_name'] ?>"
                                   name="first_name" class="form-control input-md" id="name"
                                   placeholder="Name">
                        </div>
                        <label for="last_name" class="col-sm-2 control-label">นามสกุล</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['last_name'] ?>" name="last_name"
                                   class="form-control input-md" id="last_name"
                                   placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_cart" class="col-sm-2 control-label">เลขที่บัตรประชาชน</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['id_cart'] ?>" name="id_cart"
                                   class="form-control input-md" id="id_cart"
                                   placeholder="x-xxxx-xxxxx-xx-x">
                        </div>
                        <label for="email" class="col-sm-2 control-label">อีเมล <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required="" value="<?php echo $profile['Merchant']['email'] ?>" type="email"
                                   name="email" class="form-control input-md" id="email"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 control-label">เบอร์โทร <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required="" value="<?php echo $profile['Merchant']['phone'] ?>" type="text"
                                   name="phone" class="form-control input-md" id="phone"
                                   placeholder="Mobile">
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <strong>ข้อมูลที่อยู่</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 control-label">ที่อยู่ <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required="" value="<?php echo $profile['Merchant']['address'] ?>" type="text"
                                   name="address" class="form-control input-md" id="address"
                                   placeholder="Address">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="province_id" class="col-sm-2 control-label">จังหวัด <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="province_id" id="province_id" required="">
                                <option value="">- - - เลือกจังหวัด - - -</option>
                                <?php foreach ($province_list as $key => $province) { ?>
                                    <option <?php if ($key == $profile['Merchant']['province_id']) echo 'selected' ?>
                                            value="<?php echo $key ?>"><?php echo $province ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="amphur_id" class="col-sm-2 control-label">อำเภอ <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4 amphur_div">
                            <select class="form-control" required="" name="amphur_id" id="amphur_id">
                                <option value="">- - - เลือกอำเภอ - - -</option>
                                <?php foreach ($amphurs as $key => $amphur) { ?>
                                    <option <?php if ($key == $profile['Merchant']['amphur_id']) echo 'selected' ?>
                                            value="<?php echo $key ?>"><?php echo $amphur ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="district_id" class="col-sm-2 control-label">ตำบล <span class="text-danger">*</span></label>
                        <div class="col-sm-4 district_div">
                            <select class="form-control" required="" name="district_id" id="district_id">
                                <option value="">- - - เลือกตำบล - - -</option>
                                <?php foreach ($districts as $key => $district) { ?>
                                    <option <?php if ($key == $profile['Merchant']['district_id']) echo 'selected' ?>
                                            value="<?php echo $key ?>"><?php echo $district ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="zipcode" class="col-sm-2 control-label">รหัสไปรษณีย์ <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required="" value="<?php echo $profile['Merchant']['zipcode'] ?>" type="text"
                                   name="zipcode" class="form-control input-md" id="zipcode"
                                   placeholder="xxxxx">
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <strong>ข้อมูลบัญชีธนาคาร</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="bank_name" class="col-sm-2 control-label">ชื่อธนาคาร <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['bank_name'] ?>" name="bank_name"
                                   required class="form-control input-md" id="bank_name"
                                   placeholder="ชื่อธนาคารที่รับโอนเงิน เช่น กรุงไทย เป็นต้น">
                        </div>
                        <label for="bank_account_name" class="col-sm-2 control-label">ชื่อเจ้าของบัญชี <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['bank_account_name'] ?>" required
                                   name="bank_account_name" class="form-control input-md" id="bank_account_name"
                                   placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bank_account_number" class="col-sm-2 control-label">เลขที่บัญชี <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $profile['Merchant']['bank_account_number'] ?>"
                                   required name="bank_account_number" class="form-control input-md"
                                   id="bank_account_number"
                                   placeholder="xxx-x-xxxxx-x">
                        </div>
                        <label for="bank_type" class="col-sm-2 control-label">ประเภทบัญชี <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select name="bank_type" class="form-control" required="" id="bank_type">
                                <option value="">--เลือกประเภทบัญชี--</option>
                                <option <?php if ($profile['Merchant']['bank_type'] == 'saving') echo 'selected' ?>
                                        value="saving">ออมทรัพย์
                                </option>
                                <option <?php if ($profile['Merchant']['bank_type'] == 'fixed') echo 'selected' ?>
                                        value="fixed">ฝากประจำ
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <strong>รหัสผ่าน</strong>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 control-label">รหัสผ่านเดิม</label>
                        <div class="col-sm-4">
                            <input type="password" name="old_password" class="form-control input-md"
                                   id="old_password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 control-label">รหัสผ่านใหม่</label>
                        <div class="col-sm-4">
                            <input minlength="6" type="password" name="new_password" class="form-control input-md"
                                   id="password" placeholder="Password">
                        </div>
                        <label for="confirm_password" class="col-sm-2 control-label">ยืนยันรหัสผ่านใหม่</label>
                        <div class="col-sm-4">
                            <input minlength="6" type="password" name="confirm_new_password"
                                   class="form-control input-md"
                                   id="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> บันทึก</button>
        </div>
        </form>
    </div>
</div>
<!--/.col-->
</div>
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script>
    $('#province_id').on('change', function () {
        var province_id = $(this).val();
        loadAmphure(province_id);
        loadDistrict('');
        loadZipcode()
    })

    $('#amphur_id').on('change', function () {
        var amphur_id = $(this).val();
        loadDistrict(amphur_id)
        loadZipcode()
    })

    function loadAmphure(province_id) {
        var html_amphur = '<option value="">- - - กำลังโหลดอำเภอ... </option>';
        var html_district = '<option value="">- - - เลือกอำเภอ - - -</option>';
        $('#amphur_id').html(html_amphur);
        $('#district_id').html(html_district);
        $('#zipcode').val('')
        $.post('/merchants/getAmphur/', {province_id: province_id}, function (data) {
            $('.amphur_div').html(data)
            $('#amphur_id').on('change', function () {
                var amphur_id = $(this).val();
                loadDistrict(amphur_id)
                loadZipcode();
            })
        });


    }

    function loadDistrict(amphur_id) {
        var html_district = '<option value="">- - - กำลังโหลดอำเภอ - - -</option>';
        $('#district_id').html(html_district);
        $('#zipcode').val('')
        $.post('/merchants/getDistrict/', {amphur_id: amphur_id}, function (data) {
            $('.district_div').html(data)
            $('#district_id').on('change', function () {
                var district_id = $(this).val();
                loadZipcode(district_id)
            })
        });
    }

    function loadZipcode(district_id) {
        $.post('/merchants/getZipcode/', {district_id: district_id}, function (data) {
            $('#zipcode').val(data)
        });
    }
</script>