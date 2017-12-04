
<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">ข้อมูลพ่อค้า</h2>
            <div class="actions panel_actions pull-right">
                <a class="box_toggle fa fa-chevron-down"></a>
                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                <a class="box_close fa fa-times"></a>
            </div>
        </header>
        <div class="content-body">    <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อร้าน</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เบอร์โทร</th>
                                    <th>อีเมล</th>
                                    <th>เอกสารแนบ</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($merchants as $key => $merchant) {
                                    $status = 'รออนุมัติ';
                                    if ($merchant['Merchant']['status'] == 'Y') {
                                        $status = 'อนุมัติ';
                                    }
                                    ?>

                                    <tr>
                                        <th scope="row"><?php echo $key + 1 ?></th>
                                        <td><?php echo $merchant['Merchant']['shop_name'] ?></td>
                                        <td><?php echo $merchant['Merchant']['first_name'] . ' ' . $merchant['Merchant']['last_name'] ?></td>
                                        <td><?php echo $merchant['Merchant']['phone'] ?></td>
                                        <td><?php echo $merchant['Merchant']['email'] ?></td>
                                        <td>
                                            <a target="_blank" href="<?php echo Configure::read('Portal.Domain') ?>files/merchant/<?php echo $merchant['Merchant']['document_file'] ?>">
                                                <?php echo $merchant['Merchant']['document_file'] ?></a>

                                        </td>
                                        <td> <?php echo $status ?> </td>
                                        <td>
                                            <!--<a href="/merchants/view/<?php echo $merchant ['Merchant']['id'] ?>"><i class="fa fa-pencil"></i></a>-->
                                            <?php if($merchant['Merchant']['status'] == 'N'){ ?>
                                <a class="btn btn-success btn-sm" onclick="approveMerchant(<?php echo $merchant['Merchant']['id'] ?>)">
                                     อนุมัติ
                                </a>
                                <?php }else{ ?>
                                <a class="btn btn-info btn-sm">
                                    <i class="fa fa-check"></i> อนุมัติแล้ว
                                </a>
                                <?php }?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section></div>
<script>
    function approveMerchant(id) {
        swal({
            title: 'ยืนยันการอนุมัติพ่อค้า?',
            text: "เมื่ออนุมัติแล้ว พ่อค้าสามารถโพสขายสอนค้าในเว็บไซต์ได้",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then(function () {
            var url = '/merchants/approve'
            $.post(url, {id: id}, function (e) {
                if (e == 1) {
                    swal(
                            'สำเร็จ!',
                            'ช้อมูลพ่อค้าได้รับการอนุมัติแล้ว',
                            'success'
                            )
                    location.reload()
                } else {
                    swal(
                            'ผิดพลาด!',
                            'ไม่สามารถดำเนินการได้',
                            'error'
                            )
                }
            })
        })
    }
</script>


