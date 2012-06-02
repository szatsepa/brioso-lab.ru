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
    <div style="position: relative;width: 860px;height: 275px;margin: 0 auto;">
       <form id="<?php echo "form_$n";?>">
            <div style="position: relative;float: left;width: 215px;height: 220px">
                <img id="<?php echo $value[artikul];?>" src="http://brioso-lab.ru/images/items/<?php echo $value[img];?>" alt="<?php echo $value[id];?>"/>
            </div>
            <div style="position: relative;float: left;width: 555px;height: 32px;margin-left: 12px;text-align: center;">
                <p style="font-size: 16px;font-weight: bold;color: black;"><?php echo $value[name];?></p>
            </div>
            <div style="position: relative;float: left;width: 395px;height: 212px;margin-left: 12px;margin-top: 12px;text-align: left;" >
                <p style="font-size: 14px;font-weight: normal;color: black;"><?php echo $value[comment];?></p>
            <div id="<?php echo "chng_$n";?>" style="display: none;position: relative;width: 320px;height: 100px;margin: 40px auto;text-align: right;">

                    <input type="hidden" name="cart_id" value="<?php echo $value[id];?>" id="cart_id"/>
                    <p id="vol"><input name="volume" style="font-size:14px;color: black;" type="number" size="12" min="0" max="10000" step="1" value="<?php echo $value[amount];?>" price="" id="volume"/>&nbsp;л</p> 
                    <p id="chng_vol"><input style="font-size:14px;color: black;font-weight: bold;" type="button" value="Сохранить" id="change" name="<?php echo $value[id];?>" onClick="javascript:saveChange('<?php echo "$n";?>')"/></p> 

            </div>
            </div>
            <div style="position: relative;float: left;width: 45px;height: 121px;margin-left: 4px;margin-top: 12px;padding-top: 89px;text-align: center;">
                <p id="<?php echo "vol_$n";?>" style="font-size: 14px;font-weight: normal;color: black;"><?php echo $value[amount];?></p>
            </div>
            <div style="position: relative;float: left;width: 85px;height: 121px;margin-left: 4px;margin-top: 12px;padding-top: 89px;text-align: center;">
                <p id="<?php echo "cost_$n";?>" style="font-size: 14px;font-weight: normal;color: black;"><?php echo $value[cost];$summ_list += $value[cost];?></p>
            </div>
            <div style="position: relative;float: left;width: 75px;height: 121px;margin-left: 4px;margin-top: 12px;padding-top: 89px;text-align: center;">
                <p><a name="" style="font-size: 14px;font-weight: normal;color: black;text-decoration: underline;cursor: pointer;" onClick="javascript:toChange('<?php echo "chng_$n";?>');">Изменить</a></p>
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