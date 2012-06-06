<?php

/*
 * 1/6/2012
 */
$summ_list = 0.00;
?>
<script type="text/javascript">
    var user_id = <?php echo $_SESSION[id];?>;
    var my_cart = new Array();
</script>
<div id="content">
    <?php 
    $n = 0;
    foreach ($cart_array as $value) {
        ?>
    <script type="text/javascript">
    var tmp = <?php echo json_encode($value);?>;
    my_cart.push(tmp);
    </script>
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
    <div id="itogo">
        <p id="in_itogo">Итого:&nbsp;&nbsp;<?php $str_out = intval("$summ_list"); echo $str_out.".00 p.";?></p>
        <p><a name="" id="order">Оформить заказ</a></p>
    </div>
</div>
<div id="order_form">
    <div style="position:relative; width: 600px;height:27px;">
        <p id="order_title"></p>
    </div>
    <div class="order_header" style="font-size:16px;font-weight:bold;color: black;position:relative;margin:0 auto;width:92%;height:47px;">
            <div style="position:relative;float:left;width:43px;text-align:center;">
                <p style="">№</p>
            </div>
            <div style="position:relative;float:left;width:543px;text-align:center;">
                <p>Наименование</p>
            </div>
            <div style="position:relative;float:left;width:52px;text-align:center;">
                <p style="">Колич</p>
            </div>
            <div style="position:relative;float:left;width:143px;text-align:center;">
                <p style="">Цена</p>
            </div>
    </div>
    <div id="order_body">
        <?php 
        $n = 1;
        foreach ($cart_array as $value) {
            ?>
        <div id="order_row_<?php echo $n;?>" style="font-size:14px;color: black;position:relative;margin:0 auto;width:92%;height:47px;">
            <div style="position:relative;float:left;width:43px;text-align:center;">
                <p><?php echo $n;?></p>
            </div>
            <div style="position:relative;float:left;width:543px;text-align:left;">
                <p id="name_<?php echo $n;?>"><?php echo $value[name];?></p>
            </div>
            <div style="position:relative;float:left;width:52px;text-align:center;">
                <p id="amount_<?php echo $n;?>" style=""><?php echo $value[amount];?></p>
            </div>
            <div style="position:relative;float:left;width:143px;text-align:center;">
                <p id="cost_<?php echo $n;?>" style=""><?php echo $value[cost];?></p>
                 
            </div>
            <div style="visibility:hidden;" >
                <p id="artikul_<?php echo $n;?>"><?php echo $value[artikul];?></p>
            </div>
        </div>
        <?php
        $n++;
        }
        ?>
    </div>
    <div class="order_footer"  style="font-weight:normal;position:relative; width: 720px;height:270px;margin: 0 auto;text-align:left;">
        <div id="address">
            <p>
                <label>Адрес доставки:&nbsp;&nbsp;&nbsp;&nbsp;</label><input id="shipment" type="text" value="" size="72"/>
            </p>
        </div>
        <div id="o_email">
            <p><label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input id="act_email" type="text" value="" size="72"/></p>
        </div>
        <div id="o_phone">
            <p>
                <label>Телефон:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input id="phone" type="text" value="" size="72"/>
            </p>
        </div>
        <div id="o_comm">
            <p>
                <label>Пожелания:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><textarea id="act_comment" cols="72" rows="6"></textarea>
            </p>
        </div>
        <div id="o_order" style="width:520px;margin-top: 12px;">
            <p id="to_order" style="text-align: right;font-size: 18px;font-weght:bold;color: black;text-decoration:underline;cursor:pointer;">
                Заказать
            </p>
        </div>
     </div>
    <div id="o_order" style="width:100%;height:24px;">

        </div>
    
</div>