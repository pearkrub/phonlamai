
<div class="row">
                    <!-- start sidebar -->
    <!-- <div class="col-sm-3">
        <div class="widget">
            <h6 class="subtitle">รูปโปรไฟล์</h6>
            <figure>
                <input type="file">
            </figure>
        </div><!-- end widget 
    </div>end col -->
    <!-- end sidebar -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12 text-left">
                <h2 class="title">สมัครขายสินค้า</h2>
            </div><!-- end col -->
        </div><!-- end row -->
        
        <hr class="spacer-5"><hr class="spacer-20 no-border">
        
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-12">
                <form class="form-horizontal" action="<?php echo Configure::read('App.Domain') ?>merchants/save" enctype="multipart/form-data" method="post">
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">ชื่อ</label>
                        <div class="col-sm-4">
                            <input type="text" name="first_name" class="form-control input-md" id="name" placeholder="Name">
                        </div>
                        <label for="last_name" class="col-sm-2 control-label">นามสกุล</label>
                        <div class="col-sm-4">
                            <input type="text" name="last_name" class="form-control input-md" id="last_name" placeholder="Last name">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="id_cart" class="col-sm-2 control-label">เลขที่บัตรประชาชน</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_cart" class="form-control input-md" id="id_cart" placeholder="x-xxxx-xxxxx-xx-x">
                        </div>
                        <label for="email" class="col-sm-2 control-label">อีเมล <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="email" name="email" class="form-control input-md" id="email" placeholder="Email">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="shop_name" class="col-sm-2 control-label">ชื่อร้านค้า</label>
                        <div class="col-sm-4">
                            <input type="text" name="shop_name" class="form-control input-md" id="shop_name" placeholder="Shop name">
                        </div>
                        <label for="phone" class="col-sm-2 control-label">เบอร์โทร <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="text" name="phone" class="form-control input-md" id="phone" placeholder="Mobile">
                        </div>
                    </div><!-- end form-group -->
                    <hr class="spacer-5"><hr class="spacer-20 no-border">
                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">ที่อยู่ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="text" name="address" class="form-control input-md" id="address" placeholder="Address">
                        </div>
                        <label for="province_id" class="col-sm-2 control-label">จังหวัด <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="province_id" id="province_id" required>
                                <option value="">- - - เลือกจังหวัด - - -</option>
                                <?php foreach($province_list as $key => $province){  ?>
                                <option value="<?php echo $key ?>"><?php echo $province ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="amphur_id" class="col-sm-2 control-label">อำเภอ <span class="text-danger">*</span></label>
                        <div class="col-sm-4 amphur_div">
                            <select class="form-control" name="amphur_id" id="amphur_id">
                                <option value="">- - - เลือกอำเภอ - - -</option>
                            </select>
                        </div>
                        <label for="district_id" class="col-sm-2 control-label">ตำบล <span class="text-danger">*</span></label>
                        <div class="col-sm-4 district_div">
                            <select class="form-control" name="district_id" id="district_id">
                                <option value="">- - - เลือกตำบล - - -</option>
                            </select>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="zipcode" class="col-sm-2 control-label">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="text" name="zipcode" class="form-control input-md" id="zipcode" placeholder="xxxxx">
                        </div>
                        <label for="document" class="col-sm-2 control-label">ไฟล์เอกสารแนบ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="file" name="document" class="form-control input-md" id="document" placeholder="document">
                        </div>
                    </div><!-- end form-group -->
                    <hr class="spacer-5"><hr class="spacer-20 no-border">
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">รหัสผ่าน <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="password" name="password" class="form-control input-md" id="password" placeholder="Password">
                        </div>
                        <label for="password" class="col-sm-2 control-label">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="password" name="confirm_password" class="form-control input-md" id="password" placeholder="Confirm Password">
                        </div>
                    </div><!-- end form-group -->
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <button class="btn btn-default round btn-md"><i class="fa fa-user mr-5"></i> ลงทะเบียน</button>
                        </div>
                    </div><!-- end form-group -->
                </form>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div>
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script>
    $('#province_id').on('change',function(){
        var province_id = $(this).val();
        loadAmphure(province_id);
        loadDistrict('');
        loadZipcode()
    })

    $('#amphur_id').on('change',function(){
        var amphur_id = $(this).val();
        loadDistrict(amphur_id)
        loadZipcode()
    })

    function loadAmphure(province_id){
        var html_amphur = '<option value="">- - - กำลังโหลดอำเภอ... </option>';
        var html_district = '<option value="">- - - เลือกอำเภอ - - -</option>';
        $('#amphur_id').html(html_amphur);
        $('#district_id').html(html_district);
        $('#zipcode').val('')
        $.post('/merchants/getAmphur/',{province_id:province_id},function(data){
            $('.amphur_div').html(data)
                $('#amphur_id').on('change',function(){
                var amphur_id = $(this).val();
                loadDistrict(amphur_id)
                loadZipcode();
            })
        });

        
    }

    function loadDistrict(amphur_id){
        var html_district = '<option value="">- - - กำลังโหลดอำเภอ - - -</option>';
        $('#district_id').html(html_district);
        $('#zipcode').val('')
        $.post('/merchants/getDistrict/',{amphur_id:amphur_id},function(data){
            $('.district_div').html(data)
            $('#district_id').on('change',function(){
                var district_id = $(this).val();
                loadZipcode(district_id)
            })
        });
    }

    function loadZipcode(district_id){
        $.post('/merchants/getZipcode/',{district_id:district_id},function(data){
            $('#zipcode').val(data)
        });
    }
</script>