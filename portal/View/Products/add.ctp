
<div class="col-md-12">
    <div class="card">
        <form action="/products/save" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-header">
                <strong>เพิ่มสินค้า</strong>
            </div>
            <div class="card-body">
                
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">ชื่อสินค้า</label>
                    <div class="col-md-6">
                    <input required type="text" id="text-input" name="name" class="form-control" placeholder="ชื่อสินค้า">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="textarea-input">รายละเอียด</label>
                    <div class="col-md-9">
                    <textarea required id="textarea-input" name="detail" rows="9" class="form-control" placeholder="รายละเอียด.."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">หน่วย</label>
                    <div class="col-md-6">
                    <input required type="text" id="text-input" name="price_per_key" class="form-control" placeholder="กก./ลูก">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">จำนวน</label>
                    <div class="col-md-6">
                    <input required type="text" id="text-input" name="quantity" class="form-control" placeholder="จำนวน">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">ราคาปกติ</label>
                    <div class="col-md-6">
                    <input required type="text" id="text-input" name="normal_price" class="form-control" placeholder="ราคาปกติ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label pull-right" for="text-input">ราคาขาย</label>
                    <div class="col-md-6">
                    <input required type="text" id="text-input" name="price" class="form-control" placeholder="ราคาขาย">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">ช่วงเวลาสั่งจอง</label>
                    <div class="col-md-6">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input required name="daterange" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="file-multiple-input">รูปภาพสินค้า (เลือกได้หลายรูป)</label>
                    <div class="col-md-6">
                    <input required type="file" id="file-multiple-input" name="image[]" multiple="true">
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $( document ).ready(function() {
        $('input[name="daterange"]').daterangepicker(
        {
            locale: {
            format: 'YYYY-MM-DD'
            },
            startDate: '<?php echo date('Y-m-d') ?>',
            endDate: '<?php echo date('Y-m-d') ?>'
        });
    });
</script>