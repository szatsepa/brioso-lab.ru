<?php

/*
 * created by arcady.1254@gmail.com  7/5/2012
 */
//print_r($items_array[3]); 
?>
<script type="text/javascript">
    
    var auth = parseInt(<?php echo $_SESSION[auth];?>);
    
    user_id = parseInt(<?php echo $_SESSION[id];?>);
   
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
<div class="block_colorfield">  
    <div id="_colorfield">
        
    </div>

        <div class="scroll_c" style="top: 48px;">
              <div id="sl0" style=""></div>
                <script type="text/javascript"> 
                var mysl0 = new slider('sl0', 360, 0, 360, 10, 'slider_1');
//                исходные установки цвета здесь и далее
                mysl0.setValue(0);
                </script>
        </div>
        <div class="scroll_c" style="top: 68px;">
                <div id="sl1" style=""></div>
                <script type="text/javascript"> 
                    var mysl1 = new slider('sl1', 360, 0, 100, 1, 'slider_2');
                    mysl1.setValue(100);
                </script>
        </div>
        <div class="scroll_c" style="top: 88px;">
                <div id="sl2" style=""></div>
                <script type="text/javascript"> 
                    var mysl2 = new slider('sl2', 360, 0, 100, 1, 'slider_3');

                    var elem_array = new Array(mysl0,mysl1,mysl2);

                    for(var i in elem_array){
                        eval(elem_array[i]).setArray(elem_array);
                    }

                    mysl2.setValue(50);
                </script>
        </div>
<!--    right pahel ====================================-->
        <div class="_right">
            <input type="hidden" name="h" id="hue" value="0"/>
            <input type="hidden" name="str" id="saturation" value="100"/>
            <input type="hidden" name="brn" id="brightness" value="50"/>
            <input type="hidden" name="item_id" id="item_id" value=""/>
            <input type="hidden" name="price_id" id="price_id" value="1"/>
            <input type="hidden" name="artikul" id="artikul" value=""/>
            <div class="item"> 
                <p id="price_name" style="font-size: 16px;font-weight: bold;"><?php echo $items_array[0][price_name];?></p>
            </div>
            <div  class="item" id="prop" style="width: 120px;">
                <p class="_item" id="prop_name"><?php echo $items_array[0]['property'];?></p> 
            </div>
            <div  class="item" style="width: 395px;"> 
                <p class="_item" id="item_name" style="font-size: 16px;"><?php echo $items_array[0][name];?></p> 
            </div>
            <div class="item" id="prop" style="width: 120px;">
                <p class="_item" id="stars" style="font-size: 14px;"> <?php  $stars = $items_array[0][degree];
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
            <div id="img_item">
                <p class="_item">
                    <img id="item_image" src="" width="135" alt="1"/>
                </p>
            </div>
            <div class="select">
                <div id="litres">
                    <p id="vol">
                        <input  id="volume" type="number" size="12" min="0" max="10000" step="1" value="1" price="<?php echo $items_array[0][price];?>"/>&nbsp;л
                    </p>
                </div>
                <div class="calk"> 
                    <p id="calk">Калькулятор</p>
                </div>
                <div id="cost">
                    <?php
                    for($i=4;$i>-1;$i--){
                        echo "<div style='float: left;'><img id='r_$i' src='http://brioso-lab.ru/images/p_0.png' alt='0'/></div>";
                    }
                    ?>  
                    <div id="_rub">  
                        <img id='rub' src='http://brioso-lab.ru/images/rub.png' alt='p.'/>   
                    </div>
                </div>
                <div id="cuestion">
                    <p id="how_meny" style="text-align: left;">Сколько краски мне нужно?</p>
                </div>
                <div id="oncart">
                    <p id="c_order" >В корзину</p>
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
<div class="any_f"></div>
</div>