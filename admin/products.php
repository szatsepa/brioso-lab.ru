<?php

/*
 * create 18/5/2012
 * 
 */
?>
<script type="text/javascript">
    var price_list = new Array();
</script> 
<div class="group" style="position: relative;margin-top: 12px;margin-left: 14px;padding-left: 36px;">
    
 <div class="add_product" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="add_prod">
     <div style="position:relative;width: 480px;">
         <p>Добавить</p>
        <form id="form_group" action="index.php?act=addproduct" method="post" required> 
            <input type="hidden" name="pid" value=""/>
            <br/>
            &nbsp;
            <br/>
            <select name="pgroup" required >
                <?php
                                foreach ($group_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
            <br/>
            &nbsp;
            <br/>
            <select name="ptype" required >
                <?php
                                foreach ($type_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
             <select name="pqlty" required >
                <?php
                                foreach ($quality_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            &nbsp;&nbsp;
            <input type="text" size="5" name="stars" placeholder="Оценка(0/5)"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pweight" size="46" placeholder="Вес/объем"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pprice" size="46" placeholder="Цена"/>
            <br/>
            &nbsp;
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Добавить"/>  
            <br/>
            &nbsp;
            <br/>
        </form>
 </div>
<!--    <div class="show" style="padding-top: 6px;background-color: #ccc;position:relative;bottom: 410px;left: 250px;width: 300px;height: 350px;margin: 24px auto;">
    <p style="text-align: center;color: black;font-size: 14px;font-weight: bold;">Прикрепить изображение</p>
    <p style="text-align: center;">
        <input type="image"  src = "" width = "240" height = "240"  id = "image" value="" onClick="javascript:alert('index.php?act=bind&item=<?php echo $value[id];?>&img='+this.value);"/> 
    </p> 
    <p style="text-align: center;">
        <img style="cursor:pointer;" src = "http://brioso-lab.ru/images/left.gif"   onClick = "javascript: left_arrow()" alt="Left"/>
	<img style="cursor:pointer;" src = "http://brioso-lab.ru/images/right.gif"  onClick = "javascript: right_arrow()" alt="Right"/>
    </p>
</div>-->
    </div>
<div class="table" id="ptable">
        <table border="0">
            <thead style="font-weight: bold;font-size: 14px;color: black;text-align: center;">
                <tr>
                    <td>
                       № 
                    </td>
                    <td>
                       Группа 
                    </td>
                    <td>
                       Наименование 
                    </td>
                    <td>
                       Описание 
                    </td>
                    <td>
                       Тип
                    </td>
                    <td>
                       Качество 
                    </td>
                    <td>
                       Оценка 
                    </td>
                    <td>
                       Вес\объем 
                    </td>
                    <td>
                       Цена
                    </td>
                    <td>
                       Изобр.
                    </td>
                    <td>
                       Редактировать 
                    </td>
                    <td>
                        Удалить
                    </td>
                </tr>
            </thead>
            <tbody style="font-size: 14px;">   
                <?php
                $n = 1; 
                foreach ($price_list_array as $value) {
                                            ?>
<script type="text/javascript">
    var price_rows = new Array(<?php echo "'".$value[id]."','".$value[group]."','".$value[name]."','".$value[description]."','".$value[type]."','".$value[quality]."','".$value[weight]."','".$value[price]."','".$value[stars]."'";?>);
</script> 
             <?php

                    
             echo   "<tr>
                        <td>
                            $n
                        </td>
                        <td>
                            $value[group]
                        </td>
                        <td>
                            $value[name]
                        </td>
                        <td>
                            $value[description]
                        </td>
                        <td>  
                            $value[type] 
                        </td>
                        <td>
                            $value[quality]
                        </td>
                         <td>
                            $value[stars]
                        </td>
                        <td>
                            $value[weight]
                        </td>
                        <td>
                            $value[price]
                        </td>
                         <td>
                            $value[image]
                        </td>";
             ?>
                   
                       <td>
                           <a style="text-decoration: underline;" name="" onClick="javascript:_priselistEdit(price_rows);">Редактировать</a>
                        </td>
                        <td>
                            <a style="text-decoration: underline;" href="index.php?act=prdel&pid=<?php echo $value[id];?>"  >Удалить</a> 
                        </td>
                    </tr> 

                    
             <?php   
                $n++;
                }
                ?>
                    <tr>
                        <td colspan="10" align="right">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10" align="right">
                            <input type="button" value="Добавить" onclick="javascript:_addProduct();"/>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="row_visio" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="pedit">
        
        <div style="position:relative;width: 480px;">
        <p>Редактировать</p>
        <form id="edit_row" action="index.php?act=pedit" method="post">
            <input type="hidden" name="pid" value=""/>
            <br/>
            &nbsp;
            <br/>
            <select name="pgroup" required >
                <?php
                                foreach ($group_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
            <br/>
            &nbsp;
            <br/>
            <select name="ptype" required >
                <?php
                                foreach ($type_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            <br/>
            &nbsp;
            <br/>
             <select name="pqlty" required >
                <?php
                                foreach ($quality_array as $value) {
                                   ?>
                <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                                    <?php
                                }
                ?>
            </select>
            &nbsp;&nbsp;
            <input type="text" size="5" name="stars" placeholder="Оценка(0-5)"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pweight" size="46" placeholder="Вес/объем"/>
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="pprice" size="46" placeholder="Цена"/>
            <br/>
            &nbsp;
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Изменить"/>  
            <br/>
            &nbsp; 
            <br/>
        </form> 
        </div> 
<div class="show" style="padding-top: 6px;background-color: #ccc;position:relative;bottom: 410px;left: 250px;width: 300px;height: 350px;margin: 24px auto;"> 
    <form id="img_show">
        <input type="hidden" name="pid" value=""/>
        <p style="text-align: center;color: black;font-size: 14px;font-weight: bold;">Прикрепить изображение</p>
        <p style="text-align: center;">
            <input type="image"  src = "" width = "240" height = "240"  id = "image" value="" onClick="javascript:alert();"/> 
        </p> 
        <p style="text-align: center;">
            <img style="cursor:pointer;" src = "http://brioso-lab.ru/images/left.gif"   onClick = "javascript: left_arrow()" alt="Left"/>
            <img style="cursor:pointer;" src = "http://brioso-lab.ru/images/right.gif"  onClick = "javascript: right_arrow()" alt="Right"/>
        </p>
    </form>
</div>
    </div>

		</div>



<script type="text/javascript">
var mas = new Array(); // массив картинок

<?php
                foreach ($imgs_array as $value) {
                    ?>
                        var tmp_arr = new Array('http://brioso-lab.ru/images/items/<?php echo $value[name];?>','<?php echo $value[id];?>');
                        mas.push(tmp_arr);
                    <?
}
?>
    
var to = 0;  // Счетчик, указывающий на текущую картинки

function right_arrow() // Открытие следующей картинки(движение вправо)
{
     var obj = document.getElementById("image");
     var product = document.getElementById("img_show").pid.value;
     var out = 'index.php?act=bind&item='+product+'&img=';
    if (to < mas.length-1) { 
        to++;
    }else{
        to = 0;
        }
    obj.src = mas[to][0];
    obj.value = mas[to][1];
    
}

function left_arrow() // Открытие предыдущей картинки(движение влево)
{
     var obj = document.getElementById("image");
     var product = document.getElementById("img_show").pid.value;
      var out = 'index.php?act=bind&item='+product+'&img=';
    if (to > 0){ 
        to--;
    }else{
        to = mas.length-1;
        }
   obj.src = mas[to][0];
   obj.value = mas[to][1];
}
function Load()   // Ф-ция загрузки "сохраненной" картинки
{
    var obj = document.getElementById("image");
    var product = document.getElementById("img_show").pid.value;
     obj.src = mas[0][0];
     obj.value = mas[0][1];
}
</script>