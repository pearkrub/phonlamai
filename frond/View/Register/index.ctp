<div class="row">
    <!-- start sidebar -->
    <div class="col-sm-3">
        <div class="widget">
            <h6 class="subtitle"></h6>
            <figure>
                <a href="javascript:void(0);">
                    <img src="img/products/regis.png" alt="collection">
                </a>
            </figure>
        </div><!-- end widget -->
    </div><!-- end col -->
    <!-- end sidebar -->
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12 text-left">
                <h2 class="title">สมัครสมาชิก</h2>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-5">
        <hr class="spacer-20 no-border">

        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-12">
                <form class="form-horizontal register-form"
                      method="post">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">ชื่อ</label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" class="form-control input-md" id="name"
                                   placeholder="Name">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">นามสกุล</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" class="form-control input-md" id="last_name"
                                   placeholder="Name">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">อีเมล <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input required type="email" name="email" class="form-control input-md" id="email"
                                   placeholder="Email">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">เบอร์โทร <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input required type="text" name="phone" class="form-control input-md" id="phone"
                                   placeholder="Mobile">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">รหัสผ่าน <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input required type="password" name="password" class="form-control input-md" id="password"
                                   placeholder="Password">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label for="confirm_password" class="col-sm-2 control-label">ยืนยันรหัสผ่าน <span
                                    class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input required type="password" name="confirm_password" class="form-control input-md"
                                   id="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a onclick="register()" class="btn btn-default round btn-md"><i class="fa fa-user mr-5"></i> ลงทะเบียน
                            </a>
                        </div>
                    </div><!-- end form-group -->
                    <input type="hidden" id="error_count_regis"/>
                </form>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div>