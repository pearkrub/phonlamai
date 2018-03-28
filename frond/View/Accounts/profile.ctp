<div class="row">
    <div class="col-sm-12">
        <?php if (!empty($this->request->query['status'])) {
            $status = $this->request->query['status'];
            ?>
            <?php if ($status == 'success') { ?>
                <div class="alert alert-success">บันทึกข้อมูลสำเร็จ <i class="fa fa-check"></i></div>
            <?php } ?>
            <?php if ($status == 'failPassword') { ?>
                <div class="alert alert-warning">รหัสผ่านเดิมไม่ถูกต้อง <i class="fa fa-warning"></i></div>
            <?php } ?>
            <?php if ($status == 'failPasswordSame') { ?>
                <div class="alert alert-warning">รหัสผ่านใหม่ไม่ไม่ตรงกัน <i class="fa fa-warning"></i></div>
            <?php } ?>
            <?php if ($status == 'failPasswordEmpty') { ?>
                <div class="alert alert-warning">กรุณากรอกรหัสผ่านใหม่อย่างน้อย 6 ตัวอักษร <i class="fa fa-warning"></i>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="row">
            <div class="col-sm-12 text-left">
                <h2 class="title">โปรไฟล์</h2>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-5">
        <hr class="spacer-20 no-border">
        <form method="post" action="/accounts/save">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">ชื่อ <span class="text-danger">*</span></label>
                        <input required id="firstname" type="text" placeholder="First Name"
                               value="<?php echo $customer['Customer']['first_name'] ?>" name="first_name"
                               class="form-control input-sm required">
                    </div><!-- end form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">นามสกุล <span class="text-danger">*</span></label>
                        <input required id="lastname" type="text" placeholder="Last Name"
                               value="<?php echo $customer['Customer']['last_name'] ?>" name="last_name"
                               class="form-control input-sm required">
                    </div><!-- end form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">อีเมล <span class="text-danger">*</span></label>
                        <input required id="email" type="email" placeholder="Email Address"
                               value="<?php echo $customer['Customer']['email'] ?>" name="email"
                               class="form-control input-sm required email">
                    </div><!-- end form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">เบอร์โทร <span class="text-danger">*</span></label>
                        <input required id="phone" type="text" placeholder="Phone" name="phone"
                               value="<?php echo $customer['Customer']['phone'] ?>"
                               class="form-control input-sm required email">
                    </div><!-- end form-group -->
                </div>

            </div><!-- end row -->
            <hr class="spacer-20 no-border">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <h6 class="title">แก้ไขรหัสผ่าน</h6>
                </div><!-- end col -->
            </div><!-- end row -->
            <hr class="spacer-5">
            <hr class="spacer-20 no-border">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="oldPassword">รหัสผ่านเดิม</label>
                        <input id="oldPassword" type="password" placeholder="Password" name="oldPassword"
                               class="form-control input-sm required">
                    </div><!-- end form-group -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="newPassword">รหัสผ่านใหม่</label>
                        <input minlength="6" id="newPassword" type="password" placeholder="New Password"
                               name="newPassword"
                               class="form-control input-sm required">
                    </div><!-- end form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirmPassword">ยืนยันรหัสผ่านใหม่</label>
                        <input minlength="6" id="confirmPassword" type="password" placeholder="Confirm Password"
                               name="confirmPassword"
                               class="form-control input-sm required">
                    </div><!-- end form-group -->
                </div><!-- end col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <button href="javascript:void(0);" type="submit" class="btn btn-default round btn-md"><i
                                    class="fa fa-save mr-5"></i>
                            บันทึก
                        </button>
                    </div><!-- end form-group -->
                </div><!-- end col -->
            </div>
        </form>
    </div><!-- end col -->
</div>