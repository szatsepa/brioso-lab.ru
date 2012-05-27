/* 
 * created by arcady.1254@gmail.com 10/2/2012
 */

function preload(id){
    
        var obj = document.getElementById(id);

        obj.style.display = "inline-block";
        
}   
function _goSearch(ID){
    
    var obj = document.getElementById(ID);
    
    for(var i = 0;i < obj.p1.length;i++){

        if(obj.p1[i].checked == true) var param1 = obj.p1[i].value;  

    }
    for(var i = 0;i < obj.p2.length;i++){

        if(obj.p2[i].checked == true) var param2 = obj.p2[i].value;  

    }
    for(var i = 0;i < obj.p3.length;i++){

        if(obj.p3[i].checked == true) var param3 = obj.p3[i].value;  

    } 
    
    document.write("<form action='index.php?act=search' method='post'><input type='hidden' name='p3' value='"+param3+"'/><input type='hidden' name='p2' value='"+param2+"'/><input type='hidden' name='p1' value='"+param1+"'/></form>");
    document.forms[0].submit();

}
function _addParams(ID){
    
    var obj = document.getElementById(ID);
    
    for(var i = 0;i < obj.p1.length;i++){

        if(obj.p1[i].checked == true) var param1 = obj.p1[i].value;  

    }
    for(var i = 0;i < obj.p2.length;i++){

        if(obj.p2[i].checked == true) var param2 = obj.p2[i].value;  

    }
    for(var i = 0;i < obj.p3.length;i++){

        if(obj.p3[i].checked == true) var param3 = obj.p3[i].value;  

    }
     
    document.write("<form action='index.php?act=upp' method='post'><input type='hidden' name='slide_id' value='"+obj.slide_id.value+"'/><input type='hidden' name='p3' value='"+param3+"'/><input type='hidden' name='p2' value='"+param2+"'/><input type='hidden' name='p1' value='"+param1+"'/></form>");
    document.forms[0].submit();
}
function _getParams(i){ 
    
    var out = "";
    
    var hid = document.getElementById('params');
    
    for(var n = 0;n < (i);n++){
        var val = 'mysl'+n;
        var obj = eval(val);
        out += obj.getValue();
        if(n<(i-1))out += '^'; 

    }
//    alert("<form action='index.php?act=uppn' method='post'><input type='hidden' name='slide_id' value='"+hid.slide_id.value+"'/><input type='hidden' name='params' value='"+out+"'/></form>");
    document.write("<form action='index.php?act=uppn' method='post'><input type='hidden' name='slide_id' value='"+hid.slide_id.value+"'/><input type='hidden' name='params' value='"+out+"'/></form>");
    document.forms[0].submit();
}
function _searchParams(i){
    
//    alert(i);
    
    var out = "";
    
    for(var n = 0;n < (i);n++){
        var val = 'mysl'+n;
        var obj = eval(val);
        out += obj.getValue();
        if(n<(i-1))out += '^'; 

    }
//    alert("<form action='index.php?act=srchn' method='post'><input type='hidden' name='params' value='"+out+"'/></form>");
    document.write("<form action='index.php?act=srchn' method='post'><input type='hidden' name='params' value='"+out+"'/></form>");
    document.forms[0].submit();
    
}
function _addColor(ID){
    
    var obj = document.getElementById(ID);
    
    var h = obj.h.value;
    
    var str = obj.str.value;
    
    var brn = obj.brn.value;
    
    var cod = obj.clr_cod.value;
    
    var price = obj.price.value;
    
    var coef = obj.coef.value; 
    
    document.write("<form action='index.php?act=color' method='post'><input type='hidden' name='c' value='"+coef+"'/><input type='hidden' name='price' value='"+price+"'/><input type='hidden' name='cod' value='"+cod+"'/><input type='hidden' name='b' value='"+brn+"'/><input type='hidden' name='s' value='"+str+"'/><input type='hidden' name='h' value='"+h+"'/></form>");
    
    document.forms[0].submit();
}
function _addGroup(){
    
    _imgtypeLoad();
    
    var obj = document.getElementById('add_group');
    
    obj.style.display = "block";
    
    document.getElementById('gtable').style.display = 'none';
    
    document.getElementById('gedit').style.display = 'none';
    }
function _groupEdit(ID, gid, nm, ds){ 
    
    document.getElementById('gtable').style.display = 'none';
    
    document.getElementById('add_group').style.display = 'none'; 
    
    document.getElementById(ID).style.display = "block";
    
    var obj = document.getElementById('edit_group');
    
    obj.gid.value = gid;
    
    obj.gname.value = nm;
    
    obj.dscr.value = ds;
}
function _priselistEdit(id,gr,nm,dsc,tp,qlt,wt,prc,st,im){
    
//    alert(arr);
    
    document.getElementById('pedit').style.display = "block";
    
    document.getElementById('ptable').style.display = 'none';
    
    document.getElementById('add_prod').style.display = 'none';
    
    document.getElementById('product_id').value = id;
    
//    alert(document.getElementById('img_show').pid.value);
    
    _imgLoad();
    
    var form = document.getElementById('edit_row'); 
    
    var group_select = form.pgroup;
    
    var type_select = form.ptype;
    
    var quality_select = form.pqlty;
    
    var n = group_select.options.length;
     
    for(var i = 0; i <  n;i++){
        if(tp==group_select.options[i].text){
            group_select.options[i].selected = true;
        }else{
            group_select.options[i].selected = false;
        }
    }
    
    n = type_select.options.length;
    
    for(i = 0; i <  n;i++){
        if(qlt==type_select.options[i].text){
            type_select.options[i].selected = true;
        }else{
            type_select.options[i].selected = false;
        }
    }
        
    n = quality_select.options.length;

    for(i = 0; i <  n;i++){
        if(gr==quality_select.options[i].text){
            quality_select.options[i].selected = true;
        }else{
            quality_select.options[i].selected = false;
        }
    }

    form.pid.value = id;
    
    form.pname.value = nm;
    
    form.dscr.value = dsc;
    
    form.pweight.value = wt;
    
    form.pprice.value = prc;
    
    form.stars.value = st;
}
function _addProduct(){
    
    _imgLoad();
    
    document.getElementById('pedit').style.display = "none";
    
    document.getElementById('ptable').style.display = 'none';
    
    document.getElementById('add_prod').style.display = 'block';
}
function right_arrow() // Открытие следующей картинки(движение вправо)
{
     var obj = document.getElementById("image");
     var product = document.getElementById("product_id").value;
     var out = '&item='+product+'&img=';
    if (to < mas.length-1) { 
        to++;
    }else{
        to = 0;
        }
    obj.src = mas[to][0];
    obj.value = out+mas[to][1];
    im_id = mas[to][1];
    document.getElementById("image_id").value = im_id;
    document.getElementById("image_add").src = mas[to][0];
    
}

function left_arrow() // Открытие предыдущей картинки(движение влево)
{
     var obj = document.getElementById("image");
     var product = document.getElementById("product_id").value;
      var out = '&item='+product+'&img=';
    if (to > 0){ 
        to--;
    }else{
        to = mas.length-1;
        }
   obj.src = mas[to][0];
  obj.value = out+mas[to][1];
  im_id = mas[to][1];
  document.getElementById("image_id").value = im_id;
  document.getElementById("image_add").src = mas[to][0];
}
function _imgLoad()   // Ф-ция загрузки "сохраненной" картинки
{
//    alert(mas[0][0]);
    var obj = document.getElementById("image");
    var item = document.getElementById("product_id").value;
    var out = '&item='+item+'&img=';
     obj.src = mas[0][0];
     obj.value = out+mas[0][1];
     im_id = mas[0][1];
     document.getElementById("image_id").value = im_id;
     document.getElementById("image_add").src = mas[0][0];
//     alert(document.getElementById("image_add"));
}
function setImg(){
    document.getElementById("image_id").value = im_id;
}
function _imgtypeLoad()   // Ф-ция загрузки "сохраненной" картинки
{

     im_id = mas[0][1];
     document.getElementById("image_id").value = im_id;
     document.getElementById("image_add").src = mas[0][0];
return false;
}
//block entry================



// --------
//  ERRORS
// --------
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
    email = $('#email').val();
    pass = $('#password').val();
    passAgain = $('#passwordAgain').val();
    if (!ValidEmail(email)) {
        ShowError(0);
    }
    else {
        if ((pass != "") && (pass == passAgain)) {
            ShowIndicator();
            if (!UserWithEmailExists(email)) {
                HideIndicator();
                //Register User
                HideError();
            }
        } else {
            HideIndicator();
            ShowError(1);
        }
    }
}

function SignIn() {
    pass = $('#loginPass').val();
    email = $('#loginEmail').val();
    ShowIndicator();
    if ((email != "") && (CheckPassword(email, pass))) {
        //Sign User In
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
        if (SendRemind()) {
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

    //check if email exists, send email
    //return true if it goes okay, false otherwise

    return true;
}
