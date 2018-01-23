$(document).ready(function () {
    loadCart()
})

function viewProduct(id, name) {

    $('.modal-header-text').html(name)
    $('.modal-body-product').html('กำลังโหลด...')

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
            if(e == 1){
                swal("เรียบร้อย!", "เพิ่มข้อมูลไปที่ตะกร้าแล้ว", "success");
                loadCart()
                $('.productQuickView').modal('hide')
            }else{
                swal("มีบางอย่างผิดพลาด!", "เพิ่มข้อมูลไปที่ตะกร้าล้มเหลว", "error");
            }
        })
    }

}

function removeProductInCart(id) {
    $.post('/products/removeProductInCart', {id: id}, function (e) {
        if(e == 1){
            swal("เรียบร้อย!", "ลบสินค้าออกจากตะกร้าแล้ว", "success");
            loadCart()
            $('.productQuickView').modal('hide')
        }else{
            swal("มีบางอย่างผิดพลาด!", "ลบสินค้าออกจากตะกร้าล้มเหลว", "error");
        }
    })
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