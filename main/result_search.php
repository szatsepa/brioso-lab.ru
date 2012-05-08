<?php

/*
 * creatted by arcady.1254@gmail.com 8/5/2012
 */
if(!$search_array){
    ?>
<script type="text/javascript">
    alert("Запрос поиска возвратил пустой результат.\n\t\t\tВернутся?");
    document.location.href = "index.php?act=search";
</script>
<?php
}
?>
<div class="downloader">
    <?php
    foreach ($search_array as $value){
    ?>
        <div class="slide">
            <img src="http://<?php echo $host;?>/images/<?php echo $value[name];?>" alt="Изображение"/>
        </div>
    <?php
    }
    ?>
</div>
