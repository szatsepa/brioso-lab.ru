<?php

/*
 * created by arcady.1254@gmail.com  7/5/2012
 */
foreach ($slide_array as $value){
    ?>
<div class="slide">
    <img src="http://<?php echo $host;?>/images/<?php echo $value[name];?>" alt="Изображение"/>
</div>
<?php
}
?>
