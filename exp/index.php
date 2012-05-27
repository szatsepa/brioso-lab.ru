<?php

/*
 * To change this template, choose Tools |
 * * and open the template in the editor.
 * 
 */

include '../query/connect.php';

$query = "SELECT id, name FROM image_items"; 

$imgs_array = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($imgs_array, $var);
}

mysql_free_result($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TinySlider - JavaScript Slideshow</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="script.js"></script>
</head>
    <body onload="javascript:loadImage();">
        <p align="center"><input type="text" id="img_id" value="" name="imid"/></p>
    <div align="center" style="width: 800px;margin: 44px auto;">
        
    <img style="cursor:pointer;" id="myimgs" src="" alt="image" onclick='javascript:_nextImg(this);'/> 
</div> 

 <SCRIPT language="JavaScript">
     
     var imgs_arr = new Array(); // массив картинок

<?php
                foreach ($imgs_array as $value) { 
                    ?>
                        var tmp_arr = new Array('http://brioso-lab.ru/images/items/<?php echo $value[name];?>','<?php echo $value[id];?>');
                        imgs_arr.push(tmp_arr);
                    <?
}
?>
    
//var img_sh = new show();
//test = new show();
//
//alert(test.out);
// 
// show = function(){
//    
//    out:'img_sh';
//    
//}



var i;
var str = '';
var pic = new Array();
if (document.images)
{
    for(var ii = 0;ii < imgs_arr.length;ii++){
        pic[ii] = new Image();
        pic[ii].src=imgs_arr[ii][0];
        pic[ii].alt = imgs_arr[ii][1];

    }
  

}



function loadImage(){ 
    var n = imgs_arr.length;
    var out = imgs_arr[n-1][0]; 
    document.getElementById('myimgs').src = out;
    document.getElementById('img_id').value=imgs_arr[n-1][1];
}

function _nextImg(obj){
    i=(i<imgs_arr.length)?i:0;
    eval("obj.src=pic[i].src");
    eval("document.getElementById('img_id').value=pic[i].alt");
    i++;
}

</SCRIPT>

</body>
</html>
<?php
mysql_close($link);
?>