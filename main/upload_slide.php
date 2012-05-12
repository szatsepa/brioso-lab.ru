<?php

/*
 * created by arcady.1254@gmail.com 12/5/2012
 */
if(isset($attributes[cp]))$_SESSION[cp]=$attributes[cp];
$disp = "none";
$sid = 0;
if(isset($attributes[slide_id])){
    $sid=$attributes[slide_id];
    $disp = "block"; 
}
?>
<div class="downloader">
    <span class="download">
        <p align="center"> Загрузите слайд</p>
          <form enctype="multipart/form-data" action="index.php?act=ups" method="post">      
            <input type="hidden" name="MAX_FILE_SIZE" value="1248575"/>        
            <input name="imgfile" size="50" accept="image/*" type="file" required/>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="image" name="prelo" id="pld" style="display: none;" src="images/circle.gif" disabled/> 
            <input type="hidden" name="id" value="<?php echo $sid;?>"/>
            <input type="submit" value="Загрузить изображениe" onclick="javascript:preload('pld');"/>
      </form>
    </span>
    <span class="parmeters" style="display: <?php echo $disp;?>;">
        <p align="center"> Задайте параметры</p>
        <p>Количество параметров - <input name="count_params" size="4" value="<?php echo $_SESSION[cp];?>" onchange="javascript:document.location.href='index.php?act=addsu&cp='+this.value"/></p>
        <form id="params">
            <input type="hidden" name="slide_id" value="<?php echo $sid;?>"/>
            <div id="sl"></div>
            <br />
            <script type="text/javascript">
var mysl0 = new slider('sl', 420, 0, 15, 1);
</script>
            <?php
            if(isset($_SESSION[cp])){
               for($i=1;$i<($_SESSION[cp]);$i++){
                   if($i==9){
                       $_SESSION[cp]=$i;
                       break;                       
                       }
                   if($i==($_SESSION[cp]-1)){
                       ?>
                       <div id="sl<?php echo $i;?>"></div><br />
                       <?php
                       echo "<script type='text/javascript'>
                                var mysl$i = new slider('sl$i', 420, 0, 15, 1);
                             </script>";
                   }else{
                       echo "<div id='sl$i'></div><br />";
                       echo "<script type='text/javascript'>
                                var mysl$i = new slider('sl$i', 420, 0, 15, 1);
                             </script>";
                   }
                  
               }
            }
            ?>
         <input type="button" class="but" value=" Загрузить параметры " onclick="javascript:_getParams(<?php echo $_SESSION[cp];?>);" />   
        </form>
    </span>
<!--<br />зачения: <input type="text" size="3" id="info" class="txtfield" />

<script type="text/javascript">
eval($('#c1').text());
</script>

<br /><br />
Устанавливать и получать значения можно так:
<pre class="brush: js">
mysl1.setValue(8);	  // устанавливаемое значение должно попадать в диапазон slider'а
mysl2.getValue();
</pre>-->

<!--<input type="button" class="but" value=" mysl1.setValue(8) " onclick="mysl1.setValue(8)" />-->

<br /><br />
</div>
