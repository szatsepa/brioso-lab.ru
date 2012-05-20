<?php

/*
 * 20/5/2012 
 */
?>
<div style="position: relative;width: 1004px;height: 643px;">
    <div class="add_img" style="position: relative;width: 800px;height: 45px;margin: 24px auto;">
        <form action="index.php?act=addimg"  enctype="multipart/form-data" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="1248575"/>        
            <input name="imgfile" size="50" accept="image/*" type="file" required/>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="image" name="prelo" id="pld" style="display: none;" src="http://brioso-lab.ru/images/circle.gif" disabled/>     
            <input type="submit" value="Загрузить изображениe" onclick="javascript:preload('pld');"/>
        </form>
    </div>
<!--    <div id="wrapper">
	<div id="container">
		<div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
		<div id="slider">
			<ul>
                            <?php 
                            foreach ($imgs_array as $value) {
                                ?>
                                <li>
                                    <input type="image" src="http://brioso-lab.ru/images/items/<?php echo $value[name];?>" width="240" height="240" alt="Image" onClick="javascript:alert('ID image is <?php echo $value[id];?>');"/>
                                    <img src="http://brioso-lab.ru/images/items/<?php echo $value[name];?>" width="240" height="240" alt="Image" />
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
		</div>
		<div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
		<ul id="pagination" class="pagination">
                    <?php 
                    $n = 0;
                            foreach ($imgs_array as $value) {
                                ?>
                                <li onclick="slideshow.pos(<?php echo $n;?>)"></li>
                                <?php
                                $n++;
                            }
                            ?>
		</ul>
	</div>
</div>-->
</div>
<script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
	id:'slider',
	auto:0,
	resume:true,
	vertical:false,
	navid:'pagination',
	activeclass:'current',
	position:0,
	rewind:false,
	elastic:true,
	left:'slideleft',
	right:'slideright'
});
</script>