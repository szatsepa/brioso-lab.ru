/* 
 * 6/6/2012
 */
$("#vrWrapper").hide();
$("#indicator").hide();
$("#signup").hide();
$("#signin").hide();
$("#remindPass").hide();
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


    $("#reg_l").mousedown(function(){
            $("#signin").hide(300, function(){
                $("#signup").show(300);
                $('#email').focus();
            });

    });

    $("#rem_l").mousedown(function(){
            $("#signin").hide(300, function(){
                $("#remindPass").show(300);
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
                $("#remindPass").show(300);
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
        $("#remindEmail").keydown(function(event){

        if(event.keyCode==13) {
            RemindPassword();
        }
    });
    var er = [];
    er[0] = "Неправильный формат email'a"; //0
    er[1] = "Пароли не совпадают"; //0
    er[2] = "Пользователь с таким email'ом уже зарегистрирован"; //0
    er[3] = "Не угадали пароль. Или email. Попробуйте еще раз"; //1
    er[4] = "Пользователя с таким email'oм у нас еще нету"; //2
    er[5] = "Неправильный формат email'a"; //2

    function HideError() {
        $('.error').hide();
    }
    function ShowError(code) {
        HideError();
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

    function SignIn() {
    var  code = $('#loginPass').val();
    var  email = $('#loginEmail').val();
        ShowIndicator();
        if ((email != "") && (CheckPassword(email, code))) {
            var where = document.location.search;
            document.write ('<form action="index.php?act=auth" method="post"><input type="hidden" name="srch" value="'+where+'"/><input type="hidden" name="email" value="'+email+'"/><input type="hidden" name="code" value="'+code+'"/></form>');
            document.forms[0].submit();

            HideIndicator();
            HideError();
        } else {
            ShowError(3);
            HideIndicator();
        }
    }

    function authUser(){
            var  code = $('#loginPass').val();
            var  email = $('#loginEmail').val();

            ShowIndicator();
            if ((email != "") && (CheckPassword(email, code))) {
                $.ajax({
                    url: 'http://brioso-lab.ru/query/jauth.php',
                    type: 'post',
                    dataType: 'json',
                    data: '&code='+code+'&email='+email,
                    success:function(data){
                        $("#vrWrapper").css({'display': 'none'});
                        $("#content").css({'display':'block'});
                        $("#my_cart").css({'display':'block'});
                        $("#amount").text('Товаров - '+data['cart']['summ_amount']);
                        $("#summ").text('На сумму - '+data['cart']['summ_cost']+' p.');
                        $("#customer").css({'display':'block'});
                        $("#a_user").text(data['user']['email']);

                    }
                });
                HideIndicator();
                HideError();
            } else {
                ShowError(3);
                HideIndicator();
            }
        }

    function RemindPassword() {
        var email = $('#remindEmail').val();
        if (!ValidEmail(email)) {
            ShowError(5);
        } else {
            ShowIndicator();
            if (SendRemind(email)) {
                ShowMessage(0);
                HideIndicator();
            }
            else {
                ShowError(4);
                HideIndicator();
            }
        }
    }

    function ShowIndicator() {
        $('#indicator').show();
        }

    function HideIndicator() {
        $('#indicator').hide();
        }

    function UserWithEmailExists(email) {
        //check if user with such email exists
        //if true, return true, otherwise false

        return false;
    }

    function CheckPassword(email, pass) {
        //check if email and pass match
        return true;
    }

    function SendRemind(email) {

        $.ajax({
                    url: 'http://brioso-lab.ru/index.php?act=data',             // указываем URL и
                    type : "post",                     // тип загружаемых данных
                    dataType: "text",
                    data: "email="+email+""
            });
        return true;
    }