<!-- <div class="col-xs-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">เพิ่มสินค้า</h2>
            <div class="actions panel_actions pull-right">
                <a class="box_toggle fa fa-chevron-down"></a>
                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                <a class="box_close fa fa-times"></a>
            </div>
        </header>
        <div class="content-body">
            <div class="row">
                <form action="/products/save"  enctype="multipart/form-data" method="post" class="form-horizontal">
                <div class="col-md-8 col-sm-9 col-xs-10">

                    <div class="form-group">
                        <label class="form-label" for="field-1">ชื่อสินค้า</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <input required name="name" type="text" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-6">รายละเอียด</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <textarea required name="detail" class="form-control" cols="10" id="field-6"></textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="form-label" for="field-2">ประเภทสินค้า</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <select name="category_id" class="form-control m-bot15">
                                <option value="1">สั่งล่วงหน้า 1 เดือน</option>
                                <option value="2">สั่งล่วงหน้า 2 เดือน</option>
                                <option value="3">สั่งล่วงหน้า 3 เดือน</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">จำนวน</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <input required name="quantity" type="text" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">หน่วย</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <input required name="price_per_key" type="text" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">ราคา</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <input required name="normal_price" type="text" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">ราคาขาย</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <input required name="price" type="text" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">รูปภาพสินค้า</label>
                        <span class="desc"></span>
                        <div class="controls">
                            <input required name="image[]" type="file" multiple="true" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1"></label>
                        <span class="desc"></span>
                        <div class="controls">
                            <button class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>


        </div>
    </section>
</div> -->
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