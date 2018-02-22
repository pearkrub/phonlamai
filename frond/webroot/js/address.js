function addAddress() {
    $('.modal-header-address').html('<span class="glyphicon glyphicon-send"></span> เพิ่มข้อมูลที่อยู่')
    $('.modal-body-address').html('กำลังโหลด...')

    $.post('/Addresses/addAddress',{}, function (data) {
        $('.modal-body-address').html(data)
    })
}