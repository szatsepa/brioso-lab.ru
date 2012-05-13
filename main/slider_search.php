<?php

/*
 * 13/5/2012
 */
if(isset($attributes[cp]))$_SESSION[cp]=$attributes[cp];

$max = count($slide_array)-1;

if($max < 0)$max = 0;

$num = rand(0, $max);

$img = "http://".$host."/images/slides/".$slide_array[$num][name];
?>
<div class="downloader" style="position: relative;width: 100%;"> 
    <div style="position: relative;float: left;width: 600px;">
        <p>
            <img src="<?php echo $img;?>" alt="Slide"/>
        </p>
        
    </div>
    
    <div style="position: relative;float: left;margin: 0 auto;">
        
        <p align="center">Выберите параметры</p>
        
        <p>Количество параметров - <input name="count_params" size="4" value="<?php echo $_SESSION[cp];?>" onchange="javascript:document.location.href='index.php?act=searchn&cp='+this.value"/></p>
        <form id="params">
            <div style="position: relative;">
            <div id="sl0" style="float: left;"></div>
            <script type="text/javascript"> 
                var slider_array = new Array();
                var mysl0 = new slider('sl0', 420, 0, 15, 1, 'srchn', false);
                slider_array.push(mysl0);
            </script>
            <div style="position:relative;float: right;">
                <input class="search" placeholder="0" type="text" size="2" id="sl0_info"/>
            </div>
            &nbsp;<br /><br/>
            </div>
            
            <?php
            if(isset($_SESSION[cp])){
               for($i=1;$i<($_SESSION[cp]);$i++){
                   if($i==9){
                       $_SESSION[cp]=$i;
                       break;                       
                       }
                   if($i==($_SESSION[cp]-1)){ 
                       ?>
                    <div style="position: relative; ">  
                       <div id="sl<?php echo $i;?>"  style="float: left;"></div>  
                       <?php
                       echo "<script type='text/javascript'>
                                var mysl$i = new slider('sl$i', 420, 0, 15, 1, 'srchn', true);
                               slider_array.push(mysl$i);
                               mysl$i.setArray(slider_array); 
                             </script>
                           <div style='position:relative;float: right;'>
                                <input class='search' placeholder='0' type='text'  size='2' id='sl".$i."_info'/>
                            </div>
                            &nbsp;<br /><br/>
                            </div>";
                   }else{
                       echo "<div style='position: relative; '>
                       <div id='sl$i'  style='float: left;'></div>";
                       echo "<script type='text/javascript'>
                                var mysl$i = new slider('sl$i', 420, 0, 15, 1, 'srchn', false);
                               slider_array.push(mysl$i);
                             </script>
                           <div style='position:relative;float: right;'>
                                <input class='search' placeholder='0' type='text'  size='2' id='sl".$i."_info'/>
                            </div>
                            &nbsp;<br /><br/>
                            </div>";
                   }
                  
               }
            }
            ?>
<!--         <input type="button" class="but" value=" Искать " onclick="javascript:_searchParams(<?php echo $_SESSION[cp];?>);" />   -->
        </form>

     </div>
</div>