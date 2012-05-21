<?php

/*
 * 20/5/2012 
 */
?>
<div style="position: relative;width: 1004px;height: 643px;">
    <div class="add_img" style="position: relative;width: 900px;height: 45px;margin: 32px auto;">
        <form action="index.php?act=addimg"  enctype="multipart/form-data" method="post">
            <select name="type">
                <option value="0">Основное</option>
                <option value="1">Вид</option>
                <option value="2">Вес</option>
            </select>
            <input type="hidden" name="MAX_FILE_SIZE" value="1248575"/>        
            <input name="imgfile" size="50" accept="image/*" type="file" required/>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="image" name="prelo" id="pld" style="display: none;" src="http://brioso-lab.ru/images/circle.gif" disabled/>     
            <input type="submit" value="Загрузить" onclick="javascript:preload('pld');"/>
        </form>
    </div>

</div>
