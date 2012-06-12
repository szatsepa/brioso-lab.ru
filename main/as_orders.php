<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="content">
<div align="center">
    
<table border="1">
    <tr>
        <td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="430">
                <tr>
                	<td><div class="kab">Новые заказы</div></td>
                </tr>
				<tr><td><?php
         
				 foreach ($orders as $row) {
                                     
                                     if ($row["status"] == 1) {
						echo "<p>N".$row["id"]."&nbsp;".$row["order_date"];
						
						// Отсроченный заказ?
						if ($row["exe_date"] != '') {
						
							echo "<br /><strong><small>Исполнить ".$row["exe_date"]."</small></strong>";
						
						}
						
						echo "<br /><a class='new_order' id='no_".$row["id"]."' name='".$row["id"]."'>".$row["name"]."</a></p>";
					}
				}
                                
				 ?>
                        </td>
                    </tr>				
            </table>
        </td>
                    
                    
		<td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="430">
                <tr>
                    
                	<td><div class="kab">Текущие заказы</div></td>
                </tr>
				<tr><td>
                                <?php
                                
//                                $arhorder_array = array_merge($users_array, $customers_array);
                                
                                rsort($orders);
                                
                                
                                                                 
				foreach ($orders as $row) { 
                                    
                                    switch ($row[report]){
                                        case 0:
                                            $color = "blue";
                                            break;
                                        
                                        case 1:
                                            $color = "green";
                                            break;
                                    }          
                                    
				if(($row["status"])== 5)$color = "brown";
                                
                                if($row[report] == 1)$label = "doc";
                                
					// Выводим только подтвержденные и отгруженные заказы
					if ($row["status"] == 2 or $row["status"] == 5) {
						echo "<p style='color: ".$color.";'>N".$row["id"]."&nbsp;".$row["order_date"];
						
						// Отсроченный заказ?
						if ($row["exe_date"] != '') {
						
							echo "<br /><strong><small>Исполнить ".$row["exe_date"]."</small></strong><br/>";
						
						}
						
                        switch ($row["status"]) {
                            case 2:
                                echo " (Подтвержден)";
                                $dsp = "accepted";
                            break;
                                
                            case 3:
                                echo " (Отменен)";
                                $dsp = "no";
                            break;
                            
                            case 5:
                                echo " (Отгружен)";
                                $dsp = "shipped";
                            break;
                            
                            case 6:
                                echo " (Выполнен)";
                                $dsp = "no";
                            break;
                        }
                        
                        echo " $label.";

						echo "<br /><a href='index.php?act=view_archzakaz&amp;zakaz=no&amp;id=".$row["id"]."&amp;dsp=".$dsp.$urladd."'  style='color: ".$color.";'>".$row["price_name"]."</a></p>";
					}				
				}
                                

				?></td>
                                   
                                </tr>	
<!--                                <tr align="center">
                                    <td align="center">
                                        <form action="index.php?act=report" method="post" target="_blank">
                                            <input type="hidden" name="company_id" value=""/>
                                            <input type="submit" value="Текущий отчет"/>
                                    
                                         </form>
                                    </td>
                                </tr>			-->
            </table>
                   
        </td>

</tr>
</table>
    
</div>
    <div id="exp" style="position: relative;width: 96%;margin: 12px auto;font-size: 16px;">
        
    </div>
    <div id="order_on_table">
        <br/>&nbsp;
<!--width="100"-->
<table class="btp" border="0" >
    
    <tbody>
        <tr>
            <td class="btp">
                
                    <input style="cursor: pointer;" type="button" onClick="javascript:document.location.href = '?act=main';" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'" value="Прайс заказа" class="submit2"/>
               
            </td>
            <td class="btp">
                <form action="" method="post"> 
                   
                    <input  style="cursor: pointer;" id="createOrder" type='button' onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'" value='Оформить заказ'   class="submit2"/>
                </form>
            </td>
            <td class="btp">
                <form action="" method="post">
                     
                    <input style="cursor: pointer;" id="clear_all" type='button' onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'" value='Удалить заказ'  class="submit2" />
                </form>
            </td>
        </tr>
    </tbody>
</table>
<br />

<br />

<div style="margin-left:5px;margin-bottom:10px;">
<?php

$field_count	=	0;

if(count($my_cart, COUNT_RECURSIVE)){
       
$fields = array ("Артикул","Наименование","Емкость","Цена ед.","Кол-во (л.)","Скидка","Цвет");

echo "<table border='0' class='cart'>";

// Выводим заголовок таблицы

foreach ($fields as $value) {
        echo "<th class='cart'>".$value."</th>";
    // Место под кнопку
}

echo "<th class='cart'>&nbsp;</th>";

$row_count = 0;

$total = 0;

foreach ($my_cart as $key => $value) {
    ?>
     <script type="text/javascript">
    var tmp = <?php echo json_encode($value);?>;
    my_cart.push(tmp);
    </script>
    <?php
        
    echo "<tr>";
    
    $field_count = 0;

    echo "<td class='cart'>".$value[artikul]."</td>";
    echo "<td class='cart'>".$value[name]."</td>";
    echo "<td class='cart'>".$value[volume]."</td>";
    echo "<td class='cart'>".$value[price]."</td>";
    echo "<td class='cart'>".$value[amount]."</td>";
    echo "<td class='cart'>".$value[discount]."</td>";
    echo "<td class='cart' style='background-color:hsl($value[h],$value[s]%,$value[b]%);color:#fff;'>".$value[h]."-".$value[s]."-".$value[b]."</td>";
    
//    
    $single_price = $value[price]; 
    $amount       = $value[amount];
    $price_id     = $value[price_id];
    $discount = $value[discount];
    $total += ($single_price*$amount)*(1-$discount/100);
    
    $artikul = $value[artikul];
    echo "<td class='cart' style='cursor: pointer;'><input id='clear_row' name='$value[id]' class='submit3' type='button' value='X'></td>";
    
   echo "</tr>"; 
      
 ++$row_count;
    
}


if ($total == 0) {
//    echo"<tr><td colspan='5'>В корзине нет товаров</td><td colspan='2' align='right'>&nbsp;</td></tr>";
}
echo"<tr><td colspan='5'></td><td class='cart' colspan='2' align='right'>Итого: ".$total."руб. </td></tr>";
echo "</table>";

?>
</div>
    <?php 
//    }
}

 ?>
    </div>