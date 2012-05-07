<?php

/*
 * created by arcady.1254@gmail.com 7/5/2012
 */

$disp = "none";

if(isset($attributes[slide_id])){
    $id=$attributes[slide_id];
    $disp = "block";
}
?>
<div class="downloader">
    <span class="download">
        <p align="center"> Загрузите слайд</p>
          <form enctype="multipart/form-data" action="index.php?act=ups" method="post">      
            <input type="hidden" name="MAX_FILE_SIZE" value="1248575"/>        
            <input name="imgfile" size="50" accept="image/*" type="file" size="20" required/>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="image" name="prelo" id="pld" style="display: none;" src="images/circle.gif" disabled/> 
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <input type="submit" value="Загрузить изображениe" onclick="javascript:preload('pld');"/>
      </form>
    </span>
    <span class="parmeters" style="display: <?php echo $disp;?>;">
        <p align="center"> Задайте параметры</p>
        <form action="index.php?act=upp" method="post" id="f_param">
            <input type="hidden" name="slide_id" value="<?php echo $id;?>"/>
            <table>
                <tr>
                    <td colspan="2">
                        <input name="param_1" placeholder="Параметр 1"/>
                        <br/>
            
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="param_2" placeholder="Параметр 2"/>
                        <br/>
            
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="param_3" placeholder="Параметр 3"/>
                        <br/>
            
                        <br/>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="Добавить"/>
                    </td>
                </tr>
            </table>
        
            
            
            
            <br/>
            
        </form>
    </span>
</div>
