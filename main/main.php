<?php

/*
 * created by arcady.1254@gmail.com  7/5/2012
 */
//print_r($items_array[0]); 
?>
<div style="position: relative;width: 1004px;height: 493px;">  
    <div id="_colorfield" style="position: relative;width: 1004px;height: 190px;background-color: hsl(185,100%,50%);left: 12px;top: 12px;">
        
    </div>
    <form id="color_saturation">
        <div style="position: relative;width: 460px;top: 24px;left: 12px;display: none;">
            <input type="text" size="46" name="clr_name" placeholder="Название" id="_info"/>
        </div>
        <div style="position: relative;top: 48px;left: 12px;">
                <div id="sl0" style=""></div>
                <script type="text/javascript"> 
                var mysl0 = new slider('sl0', 360, 0, 360, 10, 'slider_1',0);
                </script>
        </div>
        <div style="position: relative;top: 68px;left: 12px;">
                <div id="sl1" style=""></div>
                <script type="text/javascript"> 
                    var mysl1 = new slider('sl1', 360, 0, 100, 1, 'slider_2',100);
                    mysl1.setValue(100);
                </script>
        </div>
        <div style="position: relative;top: 88px;left: 12px;">
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
        <div style="font-size: 16px;color: black;position: relative;left: 530px;width: 400px;height: 200px;bottom: 22px;">
            <input type="hidden" name="h" id="hue"/>
            <input type="hidden" name="str" id="saturation"/>
            <input type="hidden" name="brn" id="brightness"/>
            <div style="position: relative;width: 400px;height: 40px;"> 
                <p id="paint">
                    
                    <?php echo "<strong>".$items_array[0][price_name]."</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;".$items_array[0]['property']."<br/>".$items_array[0][name]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    
                    $stars = $items_array[0][degree];
                    for ($i = 0; $i < 5;$i++) {
                        
                    if($stars>$i){  
                           echo '<img src="http://brioso-lab.ru/images/star_y.png"/>';
                        }else{
                           echo '<img src="http://brioso-lab.ru/images/star_w.png"/>'; 
                        }
                        
                    }
                    ?>
                </p>
            </div>
            <div style="position: relative;top: 12px;width: 400px;height: 160px;">
                <div style="position: relative;float: left;">
                    <img src="http://brioso-lab.ru/images/items/b_1.jpg" width="135" alt="1"/>
                </div>
                <div id="litres" style="position: relative;float: left;top: 8px;">
                    <input type="number" size="6" min="0" max="100" step="1" value="1" id="addliters"/>            
                </div>
                <div style="height: 20px;width: 16px;padding-left: 5px;padding-top: 9px;position: relative;float: left;top: 8px;font-size: 12px;font-weight: bold;">
                    л
                </div>
                <div id="cost" style="position: relative;width: 122px;height: 18px;left: 130px;top: -60px;">
                    <img src="http://brioso-lab.ru/images/p_0.png" alt="0"/>
                    <img src="http://brioso-lab.ru/images/p_0.png" alt="0"/>
                    <img src="http://brioso-lab.ru/images/p_0.png" alt="0"/>
                    <img src="http://brioso-lab.ru/images/p_0.png" alt="0"/>
                    <img src="http://brioso-lab.ru/images/p_0.png" alt="0"/>
                    <img src="http://brioso-lab.ru/images/p_0.png" alt="0"/>
                </div>
            </div>
        
   </form> 
    </div>
</div>
<div class="wrapper">
    <div id="gallery">
        <div class="container">
            <ul>
                <?php
                foreach ($items_array as $value) {
                    $img = $value[img];
                    echo "<li><img src='http://brioso-lab.ru/images/items/$img'/></li>";
                    
                }
                ?>
            </ul>
        </div>
        <div class="nav prev"><a name="#" title="назад">назад</a></div>
        <div class="nav next"><a name="#" title="вперед">вперед</a></div>
    </div>
</div>
<div style="position: relative;width: 1009px;height: 47px;"></div>