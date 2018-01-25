<div class="col-md-12">
    <div class="card">
        <form action="/products/save" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-header">
                <?php if (!empty($product['Product']['id'])) { ?>
                    <strong>แก้ไขสินค้า</strong>
                <?php } else { ?>
                    <strong>เพิ่มสินค้า</strong>
                <?php } ?>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">ชื่อสินค้า</label>
                    <div class="col-md-6">
                        <input required type="text" id="text-input"
                               value="<?php echo empty($product['Product']['name']) ? '' : $product['Product']['name'] ?>"
                               name="name" class="form-control" placeholder="ชื่อสินค้า">
                        <?php if (!empty($product['Product']['id'])) { ?>
                            <input required type="hidden"
                                   value="<?php echo empty($product['Product']['id']) ? '' : $product['Product']['id'] ?>"
                                   name="id">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="textarea-input">รายละเอียด</label>
                    <div class="col-md-9">
                        <textarea required id="textarea-input" name="detail" rows="9" class="form-control"
                                  placeholder="รายละเอียด.."><?php echo empty($product['Product']['detail']) ? '' : $product['Product']['detail'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">หน่วย</label>
                    <div class="col-md-6">
                        <input required type="text" id="text-input"
                               value="<?php echo empty($product['Product']['price_per_key']) ? '' : $product['Product']['price_per_key'] ?>"
                               name="price_per_key" class="form-control" placeholder="กก./ลูก">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">จำนวน</label>
                    <div class="col-md-6">
                        <input required type="text" id="text-input"
                               value="<?php echo empty($product['Product']['quantity']) ? '' : $product['Product']['quantity'] ?>"
                               name="quantity" class="form-control" placeholder="จำนวน">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">ราคาปกติ</label>
                    <div class="col-md-6">
                        <input required type="text" id="text-input"
                               value="<?php echo empty($product['Product']['normal_price']) ? '' : $product['Product']['normal_price'] ?>"
                               name="normal_price" class="form-control" placeholder="ราคาปกติ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label pull-right" for="text-input">ราคาขาย</label>
                    <div class="col-md-6">
                        <input required type="text" id="text-input"
                               value="<?php echo empty($product['Product']['price']) ? '' : $product['Product']['price'] ?>"
                               name="price" class="form-control" placeholder="ราคาขาย">
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
                    <label class="col-md-3 col-form-label" for="file-multiple-input">รูปภาพสินค้า
                        (เลือกได้หลายรูป)</label>
                    <div class="col-md-6">
                        <input <?php if (empty($product['Product']['id'])){ ?>required<?php } ?> type="file"
                               id="file-multiple-input" name="image[]" multiple="true">
                    </div>
                </div>
                <?php if (!empty($product['ProductImage'])) { ?>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-8">
                            <div class="row">
                                <?php
                                foreach ($product['ProductImage'] as $image) {
                                    ?>
                                    <div class="col-md-4 product-image-<?php echo $image['id'] ?>">
                                        <div class="thumbnail">
                                            <a href="/<?php echo $image['path'] ?>" target="_blank">
                                                <img src="/<?php echo $image['path'] ?>" alt="Fjords"
                                                     style="width:300px; height: 400px">
                                            </a>
                                            <div class="caption">
                                                <a onclick="removeProductImage(<?php echo $image['id'] ?>)" style="cursor: pointer" title="ลบรูปภาพ" class="btn btn-danger"> <i
                                                            class="fa fa-trash "></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    $(document).ready(function () {
        $('input[name="daterange"]').daterangepicker(
            {
                locale: {
                    format: 'YYYY-MM-DD'
                },
                startDate: '<?php echo empty($product['Product']['start_date']) ? date('Y-m-d') : $product['Product']['start_date'] ?>',
                endDate: '<?php echo empty($product['Product']['end_date']) ? date('Y-m-d') : $product['Product']['end_date'] ?>'
            });


    });
</script>