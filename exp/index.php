<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

include '../query/connect.php';

$query = "SELECT * FROM br_images";

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
<!--    i=(i<imgs_arr.length)?i:1;eval("this.src=pic"+i+".src");i++;alert(this.src)-->
        <p align="center"><input type="text" id="img_id" value="" name="imid"/></p>
    <div align="center" style="outline: 1px solid red;width: 800px;margin: 44px auto;">
        
    <img style="cursor:pointer;" id="myimgs" src="" alt="image" onclick='javascript:_nextImg(this);'/> 
</div> 
<!--        <div align="center" id="second_show" style="outline: 1px solid red;width: 800px;margin: 44px auto;">
            
        </div> -->
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
//var sl_show = function(id,imgs_arr){
//    createElem(id, imgs_arr[0][0]);
//    function loadImage(){
//        
//    }
//    function createElem(ID, img) {
//        var parent = document.getElementsById(ID);
//        var newP = document.createElement('img');
//        newP.className = 'elemClass';
//        newP.id = 'myImg';
//        newP.src = img;
//        newP.alt = 'Images';
////        var textNode = document.createTextNode(text);
////        newP.appendChild(textNode);
////        parent.appendChild(newP); 
//    }
//    
//}
//var show = new sl_show("second_show",imgs_arr);

var i;
var str = '';
var pic = new Array();
if (document.images)
{
    for(var ii = 0;ii < imgs_arr.length;ii++){
        pic[ii] = new Image();
        pic[ii].src=imgs_arr[ii][0];
        pic[ii].alt = imgs_arr[ii][1];
//        str += imgs_arr[ii][1]+"; ";
    }
//    alert(str);  

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
<!--     onclick='i=(i<imgs_arr.length)?i:1;eval("this.src=pic"+i+".src");i++'-->
  
    
<!--<div id="wrapper">
	<div id="container">
		<div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
		<div id="slider">
                    <ul>
                    <?php
                    foreach ($imgs_array as $value) {
                        
                    ?>
			
				<li><img src="http://brioso-lab.ru/images/items/<?php echo $value[name];?>" width="558" height="235" alt="Image" /></li>
				
                    <?php
                    }
                    ?>
                    </ul>
		</div>
		<div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
		<ul id="pagination" class="pagination">
                     <?php
                     $n = 0;
                    foreach ($imgs_array as $value) {
                        
                    ?>
			<li onclick="slideshow.pos(<?php echo $n;?>)"></li>
		<?php
                         $n++;
                    }
                    ?>
		</ul> 
	</div>
</div>
<script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
	id:'slider',
	auto:0,
	resume:true,
	vertical:true,
	navid:'pagination',
	activeclass:'current',
	position:0,
	rewind:false,
	elastic:false,
	left:'slideleft',
	right:'slideright'
});
</script> -->
</body>
</html>
<?php
mysql_close($link);
?>