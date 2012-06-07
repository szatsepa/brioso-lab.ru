/* 
 * 6/6/2012
 */
$("#vrWrapper").hide();
$("#indicator").hide();
$("#signup").hide();
$("#signin").hide();
$("#remindPass").hide();
$("div.error").hide();

    $('#entry').mousedown(function(e) {
        e.preventDefault();
        $("#entry").css({'visibility': 'hidden'});
        $("#content").slideUp(500, function(){
            $("#vrWrapper").slideDown(500,function(){
                $("#signin").show(300);
                $('#loginEmail').focus();
            });
        });
    });
    
    $("#a_user").mousedown(function(){
        if(confirm("Действительно выйти?")){
            document.location.href = "?act=logout";
        }
    });


    $("#reg_l").mousedown(function(){
            $("#signin").hide(300, function(){
                $("#signup").show(300);
                $('#email').focus();
            });

    });

    $("#rem_l").mousedown(function(){
            $("#signin").hide(300, function(){
                $("#message0").hide();
                $("#remindPass").show(300,function(){});
                $('#remindEmail').focus();
            });

    });
    $("#log_rm").mousedown(function(){
            $("#remindPass").hide(300, function(){
                $("#signin").show(300);
                $('#loginEmail').focus();
            });

    });
    $("#reg_rm").mousedown(function(){
            $("#signin").hide(300, function(){
                $("#signup").show(300);
                $('#email').focus();
            });

    });
    $("#rem_r").mousedown(function(){
            $("#signup").hide(300, function(){
                $("#message0").hide();
                $("#remindPass").show(300,function(){});
                $('#remindEmail').focus();
            });

    });
    $("#log_r").mousedown(function(){
            $("#signup").hide(300, function(){
                $("#signin").show(300);
                $('#loginEmail').focus();
            });

    });
    $("#loginPass").keydown(function(event){

        if(event.keyCode==13) {
            authUser();
        }
    });
    $("#password").keydown(function(event){

        if(event.keyCode==13) {
            SignUp();
        }
    });
    $("#remindButton").keydown(function(event){

        if(event.keyCode==13) {
            RemindPassword();
        }
    });
    $("#remindButton").mousedown(function(event){
            RemindPassword();
    });
    
    var er = [];
    er[0] = "Неправильный формат email'a"; //0
    er[1] = "Пароли не совпадают"; //0
    er[2] = "Пользователь с таким email'ом уже зарегистрирован"; //0
    er[3] = "Не угадали пароль. Или email. Попробуйте еще раз"; //1
    er[4] = "Пользователя с таким email'oм у нас еще нету"; //2
    er[5] = "Неправильный формат email'a, или забыли вписать пароль"; //2

    function HideError() {
        $('.error').hide();
    }
    function ShowError(code) {

        switch (code) {
            case 0:
                $('#error0').html(er[0]).slideDown();
                $('#email').select().focus();
                            break;
            case 1:
                $('#error0').html(er[1]).slideDown();
                            break;
            case 2:
                $('#error0').html(er[2]).slideDown();
                            break;
            case 3:
                $('#error1').html(er[3]).slideDown();
                break;
            case 4:
                $('#error2').html(er[4]).slideDown();
                break;
            case 5:
                $('#error2').html(er[5]).slideDown();
                break;
        }
    }



    function SignUp() {
    var  email = $('#email').val();
    var code = $('#password').val();
    var passAgain = $('#passwordAgain').val();
        if (!ValidEmail(email)) {
            ShowError(0);
        } else {
            if ((code != "") && (code == passAgain)) {
                ShowIndicator();
                if (!UserWithEmailExists(email)) { 
                    HideIndicator();
                    document.write ('<form action="index.php?act=reg" method="post"><input type="hidden" name="email" value="'+email+'"/><input type="hidden" name="code" value="'+code+'"/></form>');
                    document.forms[0].submit();
                    HideError();
                }
            } else {
                HideIndicator();
                ShowError(1);
            }
        }
    }

    function authUser(){
        
            $("#indicator").show();
            var  code = $('#loginPass').val();
            var  email = $('#loginEmail').val();

//            ShowIndicator();
            if ((email != "") && ValidEmail(email)) {
                $.ajax({
                    url: 'http://brioso-lab.ru/query/jauth.php',
                    type: 'post',
                    dataType: 'json',
                    data: '&code='+code+'&email='+email,
                    success:function(data){
                        if(!data['error']){
                            $("#vrWrapper").hide(200);
                            $("#indicator").hide();
                            $("#content").show(200);
                            $("#my_cart").show(100);
                            $("#customer").show();
                            $("#a_user").text(data['user']['email']);
                            $("#amount").text('Товаров - '+data['cart']['summ_amount']);
                            $("#summ").text('На сумму - '+data['cart']['summ_cost']+' p.');
                        }else{
                             $('#error1').html(er[3]).slideDown();
                        }                      
                    }
                });

            } else {
                $('#error1').html(er[5]).slideDown(); 
                $("#indicator").hide();
            }
        }

    function RemindPassword() {
        
        var email = $('#remindEmail').val();
        if (!ValidEmail(email)) {
            ShowError(5);
        } else {
            $("#indicator").show();
            if (SendRemind(email)) {
                ShowMessage(0);
                $("#indicator").hide();
            }
            else {
                ShowError(4);
                $("#indicator").hide();
            }
        }
    }

//
//    function UserWithEmailExists(email) {
//        //check if user with such email exists
//        //if true, return true, otherwise false
//
//        return false;
//    }

//    function CheckPassword(email, pass) {
//        //check if email and pass match
//        return true;
//    }

    function SendRemind(email) {
        var eml = email;
        $.ajax({

            });
        return true;
    }
    
    // ----------
    //  MESSAGES
    // ----------

    var m = [];
    m[0] = "Письмо с напоминанием пароля выслано вам на email";

    function ShowMessage(code) {
        HideError();
        $('.message').fadeOut();
        switch (code) {
            case 0:
                $('#message0').html(m[0]).slideDown();
                break;
            }
    }

    function ValidEmail(email) {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        return reg.test(email)
    }