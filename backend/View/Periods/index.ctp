<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">ข้อมูลงวด</h2>
            <?php if ($createPeriod == 'y') { ?>
                <div class="pull-right">
                    <a onclick="createPeriod()" class="btn btn-primary">ปิดงวดประจำเดือน</a>
                </div>
            <?php } ?>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>เดือน-ปี</th>
                                <th>รวม</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($periods as $key => $period) { ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td>
                                        <?php echo $period['Period']['month_year'] ?>
                                    </td>
                                    <td>
                                        <span><?php echo number_format($period['Period']['total'], 2, '.', ',') ?>
                                            </span>
                                    </td>
                                    <td>
                                        <?php echo $period['Period']['status']== 'pending'? 'รอโอน' : 'โอนเงินแล้ว' ?>
                                    </td>
                                    <td><a href="periods/view/<?php echo $period['Period']['id'] ?>" class="btn-sm btn btn-info">ดูรายละเอียด</a></td>
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
    function createPeriod() {
        swal({
            title: 'ยืนยัน',
            text: 'หากปิดยอดแล้ว เดือนนี้จะไม่สามารถปิดได้อีกครั้ง',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            var url = '/periods/create'
            $.post(url, {type: 'create'}, function (e) {
                if (e == 1) {
                    swal(
                        'สำเร็จ!',
                        'ปิดยอดเดือนนี้แล้ว',
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
        }).catch(
            function () {

            }
        )
    }
</script>