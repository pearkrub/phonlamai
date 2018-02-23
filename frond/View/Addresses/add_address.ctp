<style>
    .error {
        color: #fb181c;
    }
</style>
<div class="row">
    <div class="col-sm-12 col-md-10 col-lg-10">
        <br>
        <form class="form-horizontal address-form" method="post">
            <input type="hidden" value="<?php echo empty($default['id']) ? '' : $default['id'] ?>" name="id"/>
            <div class="form-group">
                <label for="title" class="col-sm-4 control-label">หัวข้อที่อยู่ <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input value="<?php echo empty($default['title']) ? '' : $default['title'] ?>" type="text" name="title" class="form-control input-md" id="title"
                           placeholder="บ้าน ที่ทำงาน" required>
                </div>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="full_name" class="col-sm-4 control-label">ชื่อ-นามสกุล <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input value="<?php echo empty($default['full_name']) ? '' : $default['full_name'] ?>" type="text" name="full_name" class="form-control input-md" id="full_name"
                           placeholder="ชื่อ-นามสกุล" required>
                </div>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="address" class="col-sm-4 control-label">ที่อยู่ <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <textarea rows="3" type="text" name="address" class="form-control input-md" id="address" required
                              placeholder="หมู่บ้าน บ้านเลขที่ หมู่ ซอย ถนน"><?php echo empty($default['address']) ? '' : $default['address'] ?></textarea>
                </div>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="province_id" class="col-sm-4 control-label">จังหวัด <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" name="province_id" id="province_id" required>
                        <option value="">- - - เลือกจังหวัด - - -</option>
                        <?php foreach ($province_list as $key => $province) { ?>
                            <option <?php echo $key == $default['province_id']? 'selected="selected"': '' ?> value="<?php echo $key ?>"><?php echo $province ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="amphur_id" class="col-sm-4 control-label">อำเภอ <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8 amphur_div">
                    <select class="form-control" name="amphur_id" id="amphur_id" required>
                        <option value="">- - - เลือกอำเภอ - - -</option>
                        <?php foreach($amphures as $key => $amphur_name){ ?>
                            <option <?php echo $key == $default['amphure_id']? 'selected="selected"': '' ?> value="<?php echo $key ?>"><?php echo $amphur_name ?></option>
                        <?php }?>
                    </select>
                </div>
            </div><!-- end form-group -->
            <div class="form-group">
                <label for="district_id" class="col-sm-4 control-label">ตำบล <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8 district_div">
                    <select class="form-control" name="district_id" id="district_id" required>
                        <option value="">- - - เลือกตำบล - - -</option>
                        <?php foreach($districts as $key => $district_name){ ?>
                            <option <?php echo $key == $default['district_id']? 'selected="selected"': '' ?> value="<?php echo $key ?>"><?php echo $district_name ?></option>
                        <?php }?>
                    </select>
                </div>
            </div><!-- end form-group -->

            <div class="form-group">
                <label for="zipcode" class="col-sm-4 control-label">รหัสไปรษณีย์ <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input value="<?php echo empty($default['zipcode']) ? '' : $default['zipcode'] ?>" type="text" name="zipcode" class="form-control input-md" id="zipcode" required
                           placeholder="รหัสไปรษณีย์">
                </div>
            </div><!-- end form-group -->
        </form>
        <div>
            <input id="error_count" type="hidden">
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
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