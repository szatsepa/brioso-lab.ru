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
    
//    alert("<form action='index.php?act=color' method='post'><input type='hidden' name='c' value='"+coef+"'/><input type='hidden' name='price' value='"+price+"'/><input type='hidden' name='cod' value='"+cod+"'/><input type='hidden' name='b' value='"+brn+"'/><input type='hidden' name='s' value='"+str+"'/><input type='hidden' name='h' value='"+h+"'/></form>");
    
    document.write("<form action='index.php?act=color' method='post'><input type='hidden' name='c' value='"+coef+"'/><input type='hidden' name='price' value='"+price+"'/><input type='hidden' name='cod' value='"+cod+"'/><input type='hidden' name='b' value='"+brn+"'/><input type='hidden' name='s' value='"+str+"'/><input type='hidden' name='h' value='"+h+"'/></form>");
    
    document.forms[0].submit();
}
function _addGroup(ID){
    
    var obj = document.getElementById(ID);
    
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
function _priselistEdit(arr){
    
    document.getElementById('pedit').style.display = "block";
    
    document.getElementById('ptable').style.display = 'none';
    
    document.getElementById('add_prod').style.display = 'none';
    
    var form = document.getElementById('edit_row');
    
    var group_select = form.pgroup;
    
    var type_select = form.ptype;
    
    var quality_select = form.pqlty;
    
    var n = group_select.options.length;
     
    for(var i = 0; i <  n;i++){
        if(arr[4]==group_select.options[i].text){
            group_select.options[i].selected = true;
        }else{
            group_select.options[i].selected = false;
        }
    }
    
    n = type_select.options.length;
    
    for(i = 0; i <  n;i++){
        if(arr[5]==type_select.options[i].text){
            type_select.options[i].selected = true;
        }else{
            type_select.options[i].selected = false;
        }
    }
        
    n = quality_select.options.length;

    for(i = 0; i <  n;i++){
        if(arr[1]==quality_select.options[i].text){
            quality_select.options[i].selected = true;
        }else{
            quality_select.options[i].selected = false;
        }
    }
//    alert(arr[0]);
    
    form.pid.value = arr[0];
    
    form.pname.value = arr[2];
    
    form.dscr.value = arr[3];
    
    form.pweight.value = arr[6];
    
    form.pprice.value = arr[7];
    
    form.stars.value = arr[8];
}
function _addProduct(){
    document.getElementById('pedit').style.display = "none";
    
    document.getElementById('ptable').style.display = 'none';
    
    document.getElementById('add_prod').style.display = 'block';
}