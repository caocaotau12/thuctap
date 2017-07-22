$(document).ready(function () {
    function ajax() {
        $.ajax({
            url: 'lakita/save_c2.php',
            type: 'POST',
            data: $('#fr_save_c2').serialize(),
            success: function (data) {

            },
            error: function () {

            },
            complete: function () {

            }
        });
        return false;
    }
    ajax();

    $(document).on("submit", ".e_form_submit", function (e) {
        e.preventDefault();
        var obj = $(this);
        check_lienhe(obj);
    });
});

function check_lienhe(obj) {
    var button = obj.find('.e_btn_submit');
    var email = obj.find('input[name="email"]').val();
    var name = obj.find('input[name="name"]').val();
    var aCong = email.indexOf("@");
    var dauCham = email.lastIndexOf(".");
    var sdttext = obj.find('input[name="phone"]').val();
    var dodaisdt = sdttext.length;
    if (name.trim() === "") {
        alert("Vui lòng nhập họ và tên của bạn");
        obj.find('input[name="name"]').focus();
        return false;
    }
    if (email === "") {
        alert("Vui lòng nhập email của bạn");
        obj.find('input[name="email"]').focus();
        return false;
    }
    if ((aCong < 1) || (dauCham < aCong + 2) || (dauCham + 2 > email.length)) {
        alert("Email có dạng: email@example.com");
        obj.find('input[name="email"]').focus();
        return false;
    }
    if (sdttext === "") {
        alert("Vui lòng nhập số Điện thoại");
        obj.find('input[name="phone"]').focus();
        return (false);
    }
    if (d = sdttext.match(/^09/i)) {
        if ((dodaisdt < 10) || (dodaisdt > 11)) {
            alert("Vui lòng kiểm tra lại số điện thoại");
            obj.find('input[name="phone"]').focus();
            return (false);
        }
    } else if (d = sdttext.match(/^01/i)) {
        if ((dodaisdt < 11) || (dodaisdt > 11)) {
            alert("Vui lòng kiểm tra lại số điện thoại");
            obj.find('input[name="phone"]').focus();
            return (false);
        }
    } else {
        alert("Vui lòng kiểm tra lại số điện thoại");
        obj.find('input[name="phone"]').focus();
        return false;
    }
    button.attr('disabled', 'disabled');

    var url = obj.attr("action");
            
    $.ajax({
        url: url,
        type: "POST",
        data: $('#fr_save_c3').serialize(),
      
        success: function (data) {
           // console.log(data);

            $.ajax({
                url: 'lakita/SendEmail.php',
                type: "POST",
                data: $('#fr_save_c3').serialize(),
                beforeSend: function () {
                        $(".popup-wrapper").show();
                    },
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log('Không gửi được Email!');
                    // Trả thông tin về phía server được thì tốt
                },
                complete: function (data) {
                    
                }
            });
            
            window.location.assign('popup_dangky.html');
        },
        error: function (data) {
            alert('Lỗi không đăng ký được. Bạn vui lòng đăng ký lại!');
        },
        complete: function (data) {

        }
    });

    //test
    // $.ajax({
    //     url : 'lakita/test.php',
    //     type : 'post',
    //     dataType : 'text',
    //     success : function(data) {
    //         console.log(data);
    //     },
    //     error : function(data) {
    //         console.log('error!');
    //     }
    // });

    
}