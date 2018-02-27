function addAddress(id) {
    $('.modal-header-address').html('<span class="glyphicon glyphicon-send"></span> เพิ่มข้อมูลที่อยู่')
    $('.modal-body-address').html('กำลังโหลด...')
    $('#save-address-btn').attr('onclick', 'saveAddress()')

    $.post('/Addresses/addAddress',{id:id}, function (data) {
        $('.modal-body-address').html(data)
    })
}

function saveAddress() {
    var validator = $( ".address-form" ).validate({
        showErrors: function(errorMap, errorList) {
            $('#error_count').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        rules: {
            zipcode: {
                required: true,
                digits: true
            }
        }
    });
    validator.form();

    if($('#error_count').val() == 0) {
        $.post('/addresses/save', $('.address-form').serialize(), function (data) {
            location.reload()
        })
    }
}

function removeAddress(id) {
    swal({
            title: "ยืนยัน ?",
            text: "คุณต้องการลบที่อยู่นี้หรือไม่",
            type: "warning",

            confirmButtonClass: "btn-danger",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/addresses/removeAddress', {id: id}, function (e) {
                if (e == 1) {
                    swal("เรียบร้อย!", "ลบข้อมูลที่อยู่แล้ว", "success");
                    location.reload()
                } else {
                    swal("มีบางอย่างผิดพลาด!", "ลบข้อมูลที่อยู่ล้มเหลว", "error");
                }
            })
        });
}

function saveShipping() {
    var validator = $( ".shipping-form" ).validate({
        showErrors: function(errorMap, errorList) {
            $('#error_count').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        messages: {
            address_id: {
                required: 'กรุณาเลือกที่อยู่'
            }
        }
    });
    validator.form();

    if($('#error_count').val() == 0) {
        $.post('/cart/saveAddress', $('.shipping-form').serialize(), function (data) {
            console.log(data)
            window.location = '/cart/payment'
        })
    }else{
        swal("แจ้งเตือน!", "กรุณาเลือกที่อยู่จัดส่งสินค้า", "warning");
    }
}

$('.payment_method').on('change', function () {
    if($(this).val() === 'bank') {
        $('.panel-bank').show()
    }else {
        $('.panel-bank').hide()
    }
})

function checkout() {
    var validator = $( ".payment-form" ).validate({
        showErrors: function(errorMap, errorList) {
            $('#error_count').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        messages: {
            payment_method: {
                required: 'กรุณาเลือกช่องทางการชำระเงิน'
            }
        }
    });
    validator.form();

    if($('#error_count').val() == 0) {
        $.post('/orders/create', $('.payment-form').serialize(), function (data) {
            var rs = JSON.parse(data)
            if(rs.error){
                swal("ผิดพลาด!", "สินค้าไม่พอ\n"+rs.error, "error");
            }else {
                swal("สำเร็จ!", "ขอขอบคุณสำหรับการสั่งซื้อของคุณ\n", "success");
                 window.location = '/orders/success/'+rs.id
            }


        })
    }else{
        swal("แจ้งเตือน!", "กรุณาเลือกช่องทางการชำระเงิน", "warning");
    }
}