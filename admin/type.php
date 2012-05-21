<?php

/*
 * create 18/5/2012
 * 
 */
$images_array = get_images(1);
//print_r($images_array);
?>
<div class="group" style="position: relative;margin-top: 12px;margin-left: 24px;padding-left: 36px;">
    
 <div class="add_g" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="add_group">
     <form id="form_group" action="index.php?act=addtype" method="post" required>
         <div style="position:relative;width: 480px;">
         
                 <p>Добавить</p>
        
                <br/>
                &nbsp;
                <br/>
                <input type="text" name="gname" size="46" placeholder="Наименование"/>
                <br/>
                &nbsp;
                <br/>
                <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
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
                <input type="submit" value="Запомнить"/>  
                <br/>
                &nbsp;
                <br/>
            </div>
            <div class="show" style="padding-top: 6px;background-color: #ccc;position:relative;bottom: 240px;left: 250px;width: 300px;height: 350px;margin: 24px auto;">  

                    <input type="hidden" name="img_id" value="" id="image_id"/>
                    <p style="text-align: center;color: black;font-size: 14px;font-weight: bold;">Прикрепить изображение</p>
                    <p style="text-align: center;">
                        <img style="cursor:pointer;" src = "" width = "240" height = "240"  id = "image_add" onClick="javascript:setImg();" title="Прикрепить изображение к ...."/> 
                    </p> 
                    <p style="text-align: center;">
                        <img style="cursor:pointer;" src = "http://brioso-lab.ru/images/left.gif"   onClick = "javascript: left_arrow()" alt="Left"/>
                        <img style="cursor:pointer;" src = "http://brioso-lab.ru/images/right.gif"  onClick = "javascript: right_arrow()" alt="Right"/>
                    </p>

            </div>
        </form>
    </div>
<div class="table" id="gtable">
        <table border="0">
            <thead style="font-weight: bold;font-size: 14px;color: black;text-align: center;">
                <tr>
                    <td>
                       № 
                    </td>
                    <td>
                       Наименование 
                    </td>
                    <td>
                       Описание 
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
                foreach ($type_array as $value) {
                    
             echo   "<tr>
                        <td>
                            $n
                        </td>
                        <td>
                            $value[name]
                        </td>
                        <td>
                            $value[description]
                        </td>";
             ?>
                    
                       <td>
                           <a style="text-decoration: underline;" name="" onClick="javascript:_groupEdit('gedit',<?php echo "'".$value[id]."','".$value[name]."','".$value[description]."'";?>);">Редактировать</a>
                        </td>
                        <td>
                            <a style="text-decoration: underline;" href="index.php?act=tdel&gid=<?php echo $value[id];?>"  >Удалить</a>
                        </td>
                    </tr> 
             <?php   
                $n++;
                }
                ?>
                    <tr>
                        <td colspan="5" align="right">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            <input type="button" value="Добавить" onclick="javascript:_addGroup();"/>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="add_g" style="display: none;font-size: 16px;font-weight: bold;color: black;" id="gedit">
        <p>Редактировать</p>
        <form id="edit_group" action="index.php?act=tedit" method="post" required>
            <input type="hidden" name="gid">
            <br/>
            &nbsp;
            <br/>
            <input type="text" name="gname" size="46" placeholder="Наименование"/>
            <br/>
            &nbsp;
            <br/>
            <textarea cols="44" rows="3" name="dscr" placeholder="Описание"></textarea>
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
</div>
<script type="text/javascript">
var mas = new Array(); // массив картинок

<?php
                foreach ($images_array as $value) {
                    ?>
                        var tmp_arr = new Array('http://brioso-lab.ru/images/items/<?php echo $value[name];?>','<?php echo $value[id];?>');
                        mas.push(tmp_arr);
                    <?
}
?>
    
var to = 0;  // Счетчик, указывающий на текущую картинки
var im_id = <?php echo $images_array[0][id];?>; 
//alert(mas);

</script>