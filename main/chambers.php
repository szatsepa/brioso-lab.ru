<?php

/*
 * 1/6/2012
 */
$summ_list = 0.00;
?>
<script type="text/javascript">

</script>
<div id="content">
    <?php 
    foreach ($cart_array as $value) {
        ?>
    <div style="position: relative;width: 860px;height: 275px;margin: 0 auto;">
       
        <div style="position: relative;float: left;width: 215px;height: 220px">
            <img id="<?php echo $value[artikul];?>" src="http://brioso-lab.ru/images/items/<?php echo $value[img];?>" alt="<?php echo $value[id];?>"/>
        </div>
        <div style="position: relative;float: left;width: 555px;height: 32px;margin-left: 12px;text-align: center;">
            <p style="font-size: 16px;font-weight: bold;color: black;"><?php echo $value[name];?></p>
        </div>
        <div style="position: relative;float: left;width: 395px;height: 212px;margin-left: 12px;margin-top: 12px;text-align: left;" >
            <p style="font-size: 14px;font-weight: normal;color: black;"><?php echo $value[comment];?></p>
        </div>
        <div style="position: relative;float: left;width: 65px;height: 121px;margin-left: 4px;margin-top: 12px;padding-top: 89px;text-align: center;">
            <p style="font-size: 14px;font-weight: normal;color: black;"><?php echo $value[amount];?></p>
        </div>
        <div style="position: relative;float: left;width: 85px;height: 121px;margin-left: 4px;margin-top: 12px;padding-top: 89px;text-align: center;">
            <p style="font-size: 14px;font-weight: normal;color: black;"><?php echo $value[cost];$summ_list += $value[cost];?></p>
        </div>
    </div>
        <?php
    }
    ?>
    <div style="position: relative;width: 860px;height: 35px;margin: 6px auto;text-align: right;padding-right: 86px;">
        <p style="font-size: 16px;font-weight: bold;color: black;">Итого:&nbsp;&nbsp;<?php $str_out = intval("$summ_list"); echo $str_out.".00";?></p> 
    </div>
</div>