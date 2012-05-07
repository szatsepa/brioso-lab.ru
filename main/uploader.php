<?php

/*
 * created by arcady.1254@gmail.com 7/5/2012
 */
?>
<div class="downloader">
    <span class="download">
        <p align="center"> Загрузите слайд</p>
          <form enctype="multipart/form-data" action="index.php?act=ups" method="post">      
            <input type="hidden" name="MAX_FILE_SIZE" value="1248575"/>        
            <input name="imgfile" size="50" accept="image/*" type="file" size="20" required/>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="image" name="prelo" id="pld" style="display: none;" src="images/circle.gif" disabled/> 
            <input type="hidden" name="id" value="<?php echo $image[id];?>"/>
            <input type="submit" value="Загрузить изображениe" onclick="javascript:preload('pld');"/>
      </form>
    </span>
    
</div>
