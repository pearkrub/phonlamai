$(document).ready(function () {
    loadCart()
    $('.product_qty').on('change', function () {
        var id = $(this).attr('id')
        var price = $(this).attr('price')
        var qty = $(this).val()
        var in_stock = $(this).attr('qty')
        if (parseInt(qty) > parseInt(in_stock)) {
            swal("มีบางอย่างผิดพลาด!", "จำนวนสอนค้าในร้านไม่พอเหลือ " + in_stock + ' หน่วย', "error");
            $(this).val(1)
        }

        if (qty < 1) {
            removeProductInCartPage(id)
            $(this).val(1)
        }

        if (qty > 0 && qty <= parseInt(in_stock)) {
            var total = qty * price
            $.post('/products/addToCart', {id: id, qty: qty, update: 'Y'}, function (e) {
                if (e == 1) {
                    loadCart()
                    getSummary()
                }
            })
            $('#price_' + id).html(formatDollar(total))
        }
    })
})

function formatDollar(num) {
    var p = num.toFixed(2).split(".");
    return p[0].split("").reverse().reduce(function (acc, num, i, orig) {
        return num == "-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
    }, "");
}

function viewProduct(id, name) {

    $('.modal-header-text').html(name)
    $('.modal-body-product').html('<span class="lds-circle text-center"></span>กำลังโหลด...')

    $.post('/products/ajaxView', {id: id}, function (data) {
        $('.modal-body-product').html(data)
    })
}

function addToCart(id) {
    var count = $('#product-count').val()
    if (typeof count == 'undefined') {
        count = 1
    }

    if (count < 1) {
        swal("มีบางอย่างผิดพลาด!", "กรุณาใส่จำนวนสินค้าไม่ต่ำกว่า 1", "error");
        $('#product-count').val(1)
    }

    if (count >= 1) {

        $.post('/products/addToCart', {id: id, qty: count}, function (e) {
            if (e == 1) {
                // swal("เรียบร้อย!", "เพิ่มข้อมูลไปที่ตะกร้าแล้ว", "success");
                swal({
                        title: "เรียบร้อย !",
                        text: "เพิ่มข้อมูลไปที่ตะกร้าแล้ว",
                        type: "success",

                        confirmButtonClass: "btn-success fa fa-credit-card",
                        confirmButtonText: " ชำระเงิน",
                        showCancelButton: true,
                        cancelButtonClass: "btn-info fa fa-shopping-cart",
                        cancelButtonText: " เลือกซื้อสินค้าต่อ",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    },
                    function () {
                        window.location = '/cart/checkout'
                    });
                loadCart()
                $('.productQuickView').modal('hide')
            } else {
                swal("มีบางอย่างผิดพลาด!", "เพิ่มข้อมูลไปที่ตะกร้าล้มเหลว", "error");
            }
        })
    }

}

function removeProductInCart(id) {
    swal({
            title: "ยืนยัน ?",
            text: "ต้องการลบสินค้าออกจากตะกร้า",
            type: "warning",

            confirmButtonClass: "btn-danger",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/products/removeProductInCart', {id: id}, function (e) {
                if (e == 1) {
                    swal("เรียบร้อย!", "ลบสินค้าออกจากตะกร้าแล้ว", "success");
                    loadCart()
                    $('.productQuickView').modal('hide')
                } else {
                    swal("มีบางอย่างผิดพลาด!", "ลบสินค้าออกจากตะกร้าล้มเหลว", "error");
                }
            })
        });
}

function removeProductInCartPage(id) {
    swal({
            title: "ยืนยัน ?",
            text: "ต้องการลบสินค้าออกจากตะกร้า",
            type: "warning",

            confirmButtonClass: "btn-danger",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/products/removeProductInCart', {id: id}, function (e) {
                if (e == 1) {
                    swal("เรียบร้อย!", "ลบสินค้าออกจากตะกร้าแล้ว", "success");
                    location.reload()
                } else {
                    swal("มีบางอย่างผิดพลาด!", "ลบสินค้าออกจากตะกร้าล้มเหลว", "error");
                }
            })

        });
}

function addToWishlist(id) {

}

function loadCart() {
    loadCount()
    $('.cart-product').load('/products/loadCart')
}

function loadCount() {
    $('.count-product-of-cart').load('/products/cartCount')
}

function getSummary() {
    $('#cart-summary').load('/cart/getSummary')
}

function login() {
    var validator = $(".login-form").validate({
        showErrors: function (errorMap, errorList) {
            $('#error_count_login').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        messages: {
            email: {
                required: 'กรุณากรอกอีเมล',
                email: 'รูปแบบอีเมลไม่ถูกต้อง'
            },
            password: {
                required: 'กรุณากรอกรหัสผ่าน'
            }
        }
    });
    validator.form();

    if ($('#error_count_login').val() == 0) {
        $.post('/login/authen', $('.login-form').serialize(), function (data) {
            console.log(data)
            if (data == 'fail') {
                swal("ผิดพลาด!", "ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง", "error");
            } else if (data == 'success') {
                swal("สำเร็จ!", "ข้อมูลผู้ใช้งานถูกต้อง", "success");
                window.location.reload()
            } else {
                swal("ผิดพลาด!", "ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง", "error");
            }
        })
    }
}

function register() {
    var validator = $(".register-form").validate({
        showErrors: function (errorMap, errorList) {
            $('#error_count_regis').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        rules: {
            email: {
                email: true,
                required: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirm_password: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#password"
            },
            phone: {
                required: true,
                digits: true,
                maxlength: 20
            }
        },
        messages: {
            email: {
                required: 'กรุณากรอกอีเมล',
                email: 'รูปแบบอีเมลไม่ถูกต้อง'
            },
            password: {
                required: 'กรุณากรอกรหัสผ่าน',
                minlength: 'ความยาวรหัสผ่านต้องไม่น้อยกว่า 6 ตัวอักษร',
                maxlength: 'ความยาวรหัสผ่านต้องไม่เกิน 20 ตัวอักษร'
            },
            confirm_password: {
                required: 'กรุณายืนยันรหัสผ่าน',
                minlength: 'ความยาวรหัสผ่านต้องไม่น้อยกว่า 6 ตัวอักษร',
                maxlength: 'ความยาวรหัสผ่านต้องไม่เกิน 20 ตัวอักษร',
                equalTo: 'รหัสผ่านไม่ตรงกัน'
            },
            phone: {
                required: 'กรุณากรอก เบอร์โทร',
                digits: 'กรอกได้เฉพาะตัวเลขเท่านั้น'
            }
        }
    });
    validator.form();

    if ($('#error_count_regis').val() == 0) {
        $.post('/register/save', $('.register-form').serialize(), function (data) {
            console.log(data)
            if (data == 'error_email') {
                swal("ผิดพลาด!", "email นี้มีในระบบแล้ว ไม่สามารถใช้งานได้", "error");
            } else if (data == 'success') {
                swal("สำเร็จ!", "ลงทะเบียนเรียบร้อย สามารถเข้าใช้งานได้", "success");
                window.location = '/register/success'
            } else {
                swal("ผิดพลาด!", "มีบางอย่างผิดพลาด", "error");
            }
        })
    }
}

function saveMerchant() {
    var validator = $(".merchant-register-form").validate({
        showErrors: function (errorMap, errorList) {
            $('#error_count_regis').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        rules: {
            email: {
                email: true,
                required: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirm_password: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#password"
            },
            phone: {
                required: true,
                digits: true,
                maxlength: 20
            }
        },
        messages: {
            email: {
                required: 'กรุณากรอกอีเมล',
                email: 'รูปแบบอีเมลไม่ถูกต้อง'
            },
            password: {
                required: 'กรุณากรอกรหัสผ่าน',
                minlength: 'ความยาวรหัสผ่านต้องไม่น้อยกว่า 6 ตัวอักษร',
                maxlength: 'ความยาวรหัสผ่านต้องไม่เกิน 20 ตัวอักษร'
            },
            confirm_password: {
                required: 'กรุณายืนยันรหัสผ่าน',
                minlength: 'ความยาวรหัสผ่านต้องไม่น้อยกว่า 6 ตัวอักษร',
                maxlength: 'ความยาวรหัสผ่านต้องไม่เกิน 20 ตัวอักษร',
                equalTo: 'รหัสผ่านไม่ตรงกัน'
            },
            phone: {
                required: 'กรุณากรอก เบอร์โทร',
                digits: 'กรอกได้เฉพาะตัวเลขเท่านั้น'
            },
            address: {
                required: 'กรุณากรอกที่อยู่'
            },
            province_id: {
                required: 'กรุณาเลือกจังหวัด'
            },
            amphur_id: {
                required: 'กรุณาเลือกอำเภอ'
            },
            district_id: {
                required: 'กรุณาเลือกตำบล'
            },
            zipcode: {
                required: 'กรุณากรอกรหัสไปรษณีย์',
                digits: 'กรอกได้เฉพาะตัวเลขเท่านั้น',
                minlength: 5,
                maxlength: 5
            },
            document: {
                required: 'กรุณาแนบไฟล์เพื่อยืนยันตัวตน'
            }
        }
    });
    validator.form();
    if ($('#error_count_regis').val() == 0) {
        $('.merchant-register-form').submit()
    }
}

function saveInformPayment() {
    var validator = $(".inform-payment-form").validate({
        showErrors: function (errorMap, errorList) {
            $('#error_count_inform').val(this.numberOfInvalids())
            this.defaultShowErrors();
        },
        rules: {
            order_no: {
                required: true
            },
            bank: {
                required: true
            },
            payment_date: {
                required: true
            },
            document: {
                required: true,
            },
            amount: {
                required: true,
                digits: true,
                maxlength: 10
            }
        }
    });
    validator.form();
    if ($('#error_count_inform').val() == 0) {
        $('.inform-payment-form').submit()
    }
}

function receiveOrder(id) {
    swal({
            title: "รับสินค้า ?",
            text: "ยืนยันว่าได้รับสินค้าแล้ว",
            type: "warning",

            confirmButtonClass: "btn-success",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/orders/receiveOrder', {id: id}, function (e) {
            //     if (e == 1) {
                    swal("เรียบร้อย!", "รับสินค้าเรียบร้อย", "success");
                    location.reload()
            //     } else {
            //         swal("มีบางอย่างผิดพลาด!", "ลบสินค้าออกจากตะกร้าล้มเหลว", "error");
            //     }
            })

        });
}

function receivedItem(id) {
    swal({
            title: "รับสินค้า ?",
            text: "ยืนยันว่าได้รับสินค้าแล้ว",
            type: "warning",

            confirmButtonClass: "btn-success",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/orders/receiveItem', {id: id}, function (e) {
            //     if (e == 1) {
                    swal("เรียบร้อย!", "รับสินค้าเรียบร้อย", "success");
                    location.reload()
            //     } else {
            //         swal("มีบางอย่างผิดพลาด!", "ลบสินค้าออกจากตะกร้าล้มเหลว", "error");
            //     }
            })

        });
}

function refundItem(id) {
    swal({
            title: "แจ้งคืนสินค้า ?",
            text: "หากแจ้งคืนสินค้า เทศบาลผู้ดูแลการซื้อขายจะติดต่อกลับ เพื่อยืนยันและคืนเงินให้ภายใน 7 วัน",
            type: "warning",

            confirmButtonClass: "btn-success",
            confirmButtonText: "ยืนยัน",
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function () {
            $.post('/orders/refundItem', {id: id}, function (e) {
                //     if (e == 1) {
                swal("เรียบร้อย!", "แจ้งสินค้าเรียบร้อย", "success");
                location.reload()
                //     } else {
                //         swal("มีบางอย่างผิดพลาด!", "ลบสินค้าออกจากตะกร้าล้มเหลว", "error");
                //     }
            })

        });
}