<?php

/*
 * created by arcady.1254@gmail.com  7/5/2012
 */
//print_r($items_array[3]); 
?>
<script type="text/javascript">
    
    var auth = parseInt(<?php echo $_SESSION[auth];?>);
   
    var items_array = new Array();
    <?php
    foreach ($items_array as $value) {
        ?>
            items_array.push({price_id:"<?php echo "$value[price_id]";?>",price_name:"<?php echo "$value[price_name]";?>",item:"<?php echo "$value[item]";?>",name:"<?php echo "$value[name]";?>",volume:"<?php echo "$value[volume]";?>",price:"<?php echo "$value[price]";?>",img:"<?php echo "$value[img]";?>",prop:"<?php echo "$value[property]";?>",degree:"<?php echo "$value[degree]";?>",top:"<?php echo "$value[top]";?>",artikul:"<?php echo "$value[artikul]";?>",barcode:"<?php echo "$value[barcode]";?>",img_item:"<?php echo "$value[img_item]";?>"});

        <?php
    }
    ?>
        
</script>
<div id="content">
<div style="position: relative;width: 1004px;height: 493px;">  
    <div id="_colorfield" style="position: relative;width: 1004px;height: 190px;background-color: hsl(185,100%,50%);left: 12px;top: 12px;">
        
    </div>

        <div style="position: relative;width: 460px;top: 24px;left: 12px;display: none;">
            <input type="text" size="46" name="clr_name" placeholder="Название" id="_info"/>
        </div>
        <div style="position: relative;width: 380px;top: 48px;left: 12px;">
                <div id="sl0" style=""></div>
                <script type="text/javascript"> 
                var mysl0 = new slider('sl0', 360, 0, 360, 10, 'slider_1',0);
                </script>
        </div>
        <div style="position: relative;width: 380px;top: 68px;left: 12px;">
                <div id="sl1" style=""></div>
                <script type="text/javascript"> 
                    var mysl1 = new slider('sl1', 360, 0, 100, 1, 'slider_2',100);
                    mysl1.setValue(100);
                </script>
        </div>
        <div style="position: relative;width: 380px;top: 88px;left: 12px;">
                <div id="sl2" style=""></div>
                <script type="text/javascript"> 
                    var mysl2 = new slider('sl2', 360, 0, 100, 1, 'slider_3',50);

                    var elem_array = new Array(mysl0,mysl1,mysl2);

                    for(var i in elem_array){
                        eval(elem_array[i]).setArray(elem_array);
                    }

                    mysl2.setValue(50);
                </script>
        </div>
<!--    right pahel ====================================-->
        <div style="font-size: 16px;color: black;position: relative;left: 465px;width: 520px;height: 240px;bottom: 22px;">
            <input type="hidden" name="h" id="hue" value="0"/>
            <input type="hidden" name="str" id="saturation" value="100"/>
            <input type="hidden" name="brn" id="brightness" value="50"/>
            <input type="hidden" name="item_id" id="item_id" value=""/>
            <input type="hidden" name="price_id" id="price_id" value=""/>
            <input type="hidden" name="artikul" id="artikul" value=""/>
            <div style="position: relative;float: left;width: 395px;height: 28px;"> 
                <p id="price_name" style="font-size: 16px;font-weight: bold;"><?php echo $items_array[0][price_name];?></p>
            </div>
            <div id="prop" style="position: relative;float: left;width: 120px;height: 28px;">
                <p id="prop_name" style="text-align: center;font-size: 14px;font-weight: normal"><?php echo $items_array[0]['property'];?></p> 
            </div>
            <div style="position: relative;float: left;width: 395px;height: 28px;"> 
                <p id="item_name" style="font-size: 16px;font-weight: normal;"><?php echo $items_array[0][name];?></p> 
            </div>
            <div id="prop" style="position: relative;float: left;width: 120px;height: 28px;">
                <p id="stars" style="font-size: 14px;font-weight: normal;text-align: center;"> <?php  $stars = $items_array[0][degree];
                   for ($i = 0; $i < 5;$i++) {
                        
                   if($stars>$i){  
                          echo '<img id="i_'.$i.'" src="http://brioso-lab.ru/images/star_y.png"/>';
                       }else{
                          echo '<img id="i_'.$i.'" src="http://brioso-lab.ru/images/star_w.png"/>'; 
                       }
                        
                   }
                    ?> 
                </p>   
            </div> 
            <div style="position: relative;float: left;width: 150px;height: 150px;">
                <p style="text-align: center;"><img id="item_image" src="" width="135" alt="1"/></p>
            </div>
            <div style="position: relative;float: left;width: 370px;height: 150px;">
                <div id="litres" style="position: relative;float: left;width: 130px;height: 30px;text-align: center">
                    <p id="vol"><input style="font-size:14px;color: black;" type="number" size="12" min="0" max="10000" step="1" value="1" price="<?php echo $items_array[0][price];?>" id="volume"/>&nbsp;л</p>
                </div>
                <div style="float: left;width: 120px;margin-left: 52px;margin-top: 8px;"> 
                    <p id="calk" style="text-align: center;font-size: 16px;font-weight: bold;cursor: pointer;color: black;">Калькулятор</p>
                </div>
                <div id="cost" style="position: relative;width: 132px;height: 28px;margin-top: 52px;padding-left: 22px;">
                    <?php
                    for($i=4;$i>-1;$i--){
                        echo "<div style='float: left;'><img id='r_$i' src='http://brioso-lab.ru/images/p_0.png' alt='0'/></div>";
                    }
                    ?>  
                    <div style='float: left;margin-top: 6px;margin-left: 4px;'>  
                        <img id='rub' src='http://brioso-lab.ru/images/rub.png' alt='0'/>
                    </div>
                </div>
                <div style="float: left;width: 210px; margin-left: 42px">
                    <p id="how_meny" style="text-align: center;font-size: 14px;font-weight: normal;cursor: pointer;color: black;">Сколько краски мне нужно?</p>
                </div>
                <div style="position: relative;margin: 22px 22px auto;width: 132px;height: 22px;">
                    <p style="text-align: center">
                        <input style="font-size: 14px;font-weight: bold;color: black;" type="button" id="c_order" value="В корзину"/>
                    </p>
                </div>
            </div>
     </div>
</div>
<!--    tnd right panel ==================================-->
<div class="wrapper">
    <div id="gallery">
        <div class="container"> 
            <ul>
                <?php
                foreach ($items_array as $key => $value) {
                    $img = $value[img];
                    
                    echo "<li id='$key'><img src='http://brioso-lab.ru/images/items/$img' alt='$key' value='$key'/></li>";
                    
                }
                ?>
                
            </ul>
        </div>
        <div class="nav prev"><a name="#" title="назад">назад</a></div>
        <div class="nav next"><a name="#" title="вперед">вперед</a></div>
    </div>
</div>
<div style="position: relative;width: 1009px;height: 47px;"></div>
</div>