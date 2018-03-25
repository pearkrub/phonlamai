<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">ข้อมูลลูกค้า</h2>
<!--            <div class="actions panel_actions pull-right">-->
<!--                <a class="box_toggle fa fa-chevron-down"></a>-->
<!--                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>-->
<!--                <a class="box_close fa fa-times"></a>-->
<!--            </div>-->
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>เบอร์โทร</th>
                                <th>อีเมล</th>
                                <th>สถานะ</th>
                                <!-- <th>จัดการ</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($customers as $key => $customer) { ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td>
                                        <?php echo $customer['Customer']['first_name'].' '.$customer['Customer']['last_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $customer['Customer']['phone'] ?>
                                    </td>
                                    <td>
                                        <?php echo $customer['Customer']['email'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $customer['Customer']['status'] == 'Y'? 'ปกติ': 'ระงับใช้งาน' ?>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a title="ดูรายละเอียด" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a title="ระงับการใช้งาน" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td> -->
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('.DTTT_button_text').hide()
    })
</script>