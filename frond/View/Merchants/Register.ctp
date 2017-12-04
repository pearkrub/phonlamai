
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
                <form class="form-horizontal" action="<?php echo Configure::read('App.Domain') ?>register/save" method="post">
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">ชื่อ</label>
                        <div class="col-sm-4">
                            <input type="text" name="first_name" class="form-control input-md" id="name" placeholder="Name">
                        </div>
                        <label for="name" class="col-sm-2 control-label">นามสกุล</label>
                        <div class="col-sm-4">
                            <input type="text" name="last_name" class="form-control input-md" id="name" placeholder="Last name">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">เลขที่บัตรประชาชน</label>
                        <div class="col-sm-4">
                            <input type="text" name="last_name" class="form-control input-md" id="name" placeholder="x-xxxx-xxxxx-xx-x">
                        </div>
                        <label for="email" class="col-sm-2 control-label">อีเมล <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="email" name="email" class="form-control input-md" id="email" placeholder="Email">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">ชื่อร้านค้า</label>
                        <div class="col-sm-4">
                            <input type="text" name="first_name" class="form-control input-md" id="name" placeholder="Shop name">
                        </div>
                        <label for="email" class="col-sm-2 control-label">เบอร์โทร <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="text" name="phone" class="form-control input-md" id="email" placeholder="Mobile">
                        </div>
                    </div><!-- end form-group -->
                    <hr class="spacer-5"><hr class="spacer-20 no-border">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">ที่อยู่ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="text" name="phone" class="form-control input-md" id="email" placeholder="Address">
                        </div>
                        <label for="email" class="col-sm-2 control-label">จังหวัด <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                        <select class="form-control" name="" id="">
                                <option value="">- - - เลือกจังหวัด - - -</option>
                            </select>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">อำเภอ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                        <select class="form-control" name="" id="">
                                <option value="">- - - เลือกอำเภอ - - -</option>
                            </select>
                        </div>
                        <label for="email" class="col-sm-2 control-label">ตำบล <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="" id="">
                                <option value="">- - - เลือกตำบล - - -</option>
                            </select>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="text" name="phone" class="form-control input-md" id="email" placeholder="xxxxx">
                        </div>
                        <label for="password" class="col-sm-2 control-label">ไฟล์เอกสารแนบ <span class="text-danger">*</span></label>
                        <div class="col-sm-4">
                            <input required type="file" name="confirm_password" class="form-control input-md" id="password" placeholder="Confirm Password">
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