function deleteProduct(id, name) {
    swal({
            title: "ต้องการลบข้อมูล ?",
            text: "ข้อมูลสินค้า " + name + " จะถูกลบออกจากระบบ",
            type: "warning",

            confirmButtonClass: "btn-danger",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/products/remove', {id: id}, function (e) {
                if (e == 1) {
                    swal("เรียบร้อย!", "ลบข้อมูลสินค้าแล้ว.", "success");
                } else {
                    swal("Error!", "ไม่สามารถลบข้อมูลได้.", "error");
                }
            })

            location.reload()

        });


}

function removeProductImage(id) {
    swal({
            title: "ต้องการลบรูปภาพ ?",
            text: "ข้อมูลรูปภาพนี้จะถูกลบออกจากระบบ",
            type: "warning",

            confirmButtonClass: "btn-danger",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/products/remveProductImage', {id: id}, function (e) {
                if (e == 1) {
                    swal("เรียบร้อย!", "ลบข้อมูลรูปภาพแล้ว.", "success");
                    $('.product-image-' + id).remove()
                } else {
                    swal("Error!", "ไม่สามารถลบข้อมูลได้.", "error");
                }
            })

        });
}

