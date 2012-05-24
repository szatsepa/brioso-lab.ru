<?php

/*
 * created by arcady.1254@gmail.com  7/5/2012
 */
//include './action/resize.php';
?>
<div style="position: relative;width: 1004px;height: 393px;">  
    <div id="_colorfield" style="position: relative;width: 600px;height: 190px;background-color: hsl(185,100%,50%);left: 12px;top: 12px;">
        
    </div>
    <form id="color_saturation">
        <div style="position: relative;width: 600px;top: 24px;left: 12px;display: none;">
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
        <div style="position: relative;left: 580px;">
            <input type="hidden" name="h" id="hue"/>
            <input type="hidden" name="str" id="saturation"/>
            <input type="hidden" name="brn" id="brightness"/>
            <div style="position: relative;">
<!--                <input type="text" name="clr_cod" size="42" placeholder="наименование"/>-->
            </div>
            <div style="position: relative;top: 12px;">
<!--                <input type="text" name="price" size="42" placeholder="цена"/>-->
            </div>
            <div style="position: relative;top: 24px;">
<!--                <input type="text" name="coef" size="42" placeholder="коефициент растворения"/>-->
            </div>
        </div>
        <div style="position: relative;left: 698px;top: 88px;">
<!--            <input type="button" value="Отправить" onclick="javascript:alert('AGGA!!');"/>-->
        </div>
   </form> 
</div>
<div class="wrapper">
    <div id="gallery">
        <div class="container">
            <ul>
                <li><img src="http://brioso-lab.ru/images/items/1.png"/></li>
                <li><img src="http://brioso-lab.ru/images/items/2.png"/></li>
                <li><img src="http://brioso-lab.ru/images/items/3.png"/></li>
                <li><img src="http://brioso-lab.ru/images/items/4.png"/></li>
                <li><img src="http://brioso-lab.ru/images/items/5.png"/></li>
                <li><img src="http://brioso-lab.ru/images/items/6.png"/></li>
                <li><img src="http://brioso-lab.ru/images/items/7.png"/></li>


            </ul>
        </div>
        <div class="nav prev"><a name="#" title="назад">назад</a></div>
        <div class="nav next"><a name="#" title="вперед">вперед</a></div>
    </div>
</div>
<div style="position: relative;width: 1009px;height: 47px;"></div>