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