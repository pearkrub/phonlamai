<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-edit"></i> ข้อมูลรายการสินค้า
            <!-- <div class="card-actions">
            <a href="https://datatables.net/">
                <small class="text-muted">docs</small>
            </a>
            </div> -->
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>หน่วย</th>
                <th>รูป</th>
                <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $key => $product){ 
                        ?>
                <tr>
                <th scope="row"><?php echo $key+1 ?></th>
                <td><?php echo $product['Product']['name'] ?></td>
                <td><?php echo $product['Product']['price'] ?></td>
                <td><?php echo $product['Product']['price_per_key'] ?></td>
                <td><?php if(!empty($product['ProductImage'][0]['path'])){ ?><a href="<?php echo Configure::read('Portal.Domain').$product['ProductImage'][0]['path']; ?>"><i class="fa fa-image"></i></a><?php }?></td>
                    <td>
                        <a class="btn btn-success" href="#">
                            <i class="fa fa-search-plus "></i>
                        </a>
                                <a class="btn btn-info" href="#">
                            <i class="fa fa-edit "></i>
                        </a>
                                <a class="btn btn-danger" href="#">
                            <i class="fa fa-trash-o "></i>
                        </a>
                </td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

