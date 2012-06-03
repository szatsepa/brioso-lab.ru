<?php

/*
 * 1/6/2012
 */
$summ_list = 0.00;
?>
<script type="text/javascript">
    user_id = <?php echo $_SESSION[id];?>;
</script>
<div id="content">
    <?php 
    $n = 0;
    foreach ($cart_array as $value) {
        ?>
    <div class="cart">
       <form id="<?php echo "form_$n";?>">
            <div class="cart_img">
                <img id="<?php echo $value[artikul];?>" src="http://brioso-lab.ru/images/items/<?php echo $value[img];?>" alt="<?php echo $value[id];?>"/>
            </div>
            <div class="c_name">
                <p class="c_name"><?php echo $value[name];?></p>
            </div>
            <div class="c_com" >
                <p class="c_com"><?php echo $value[comment];?></p>
            <div id="<?php echo "chng_$n";?>" class="c_hidden">

                    <input type="hidden" name="cart_id" value="<?php echo $value[id];?>" id="cart_id"/>
                    <p id="vol"><input class="c_hidden" name="volume" type="number" size="12" min="0" max="10000" step="1" value="<?php echo $value[amount];?>" price="" id="volume"/>&nbsp;л</p> 
                    <p id="chng_vol"><input class="c_hidden" style="font-weight: bold;" type="button" value="Сохранить" id="change" name="<?php echo $value[id];?>" onClick="javascript:saveChange('<?php echo "$n";?>')"/></p> 

            </div>
            <div id="<?php echo "color_$n";?>" class="c_hsb" style="background-color: hsl(<?php echo "$value[h],$value[s]%,$value[b]%";?>);">
            </div>    
            </div>
            <div class="amount">
                <p id="<?php echo "vol_$n";?>" class="amount"><?php echo $value[amount];?></p>
            </div>
            <div class="count">
                <p class="amount" id="<?php echo "cost_$n";?>"><?php echo $value[cost];$summ_list += $value[cost];?></p>
            </div>
            <div class="c_change">
                <p><a class="c_change" name="" onClick="javascript:toChange('<?php echo "$n";?>');">Изменить</a></p>
            </div>
       </form>
    </div>
        <?php
        $n++;
    }
    ?>
    <div style="position: relative;width: 860px;height: 35px;margin: 6px auto;text-align: right;padding-right: 86px;">
        <p style="font-size: 16px;font-weight: bold;color: black;">Итого:&nbsp;&nbsp;<?php $str_out = intval("$summ_list"); echo $str_out.".00";?></p> 
    </div>
</div>