<?php

	// Выясним текущий минимальный заказ для прайса
//	mysql_data_seek($qry_aboutprice,0);
//	$row = mysql_fetch_assoc($qry_aboutprice);
//	$zakaz_limit = $row["zakaz_limit"];

 ?>

<p id="addrecord_msg">&nbsp;</p>
<table class='dat' id='addrecord_tbl'>
<?php 

$fields2 = array ("Артикул","Штрих-код","Наименование","Страна","Емкость","Цена","Остаток (шт.)"," ");

$th = 0;
while ($th < count($fields2)) {
	echo "<th class='dat'>".$fields2[$th]."</th>";
	++$th;
}    

?>
<!--<form action="#" name="add_record" id="add_record"></form>-->
<tr>
    <td><input type="text" name="artikul" id="artikul" value="" size="10" maxlength="10" class="required"></td>
    <td><input type="text" name="barcode" id="barcode" value="" size="8" maxlength="30"></td>
    <td><input type="text" name="name" id="name" value="" size="30" maxlength="255"></td>
    <td><input type="text" name="state" id="state" value="" size="10" maxlength="255"></td>
    <td><input type="text" name="volume" id="volume" value="" size="9" maxlength="10"></td>
    <td><input type="text" name="price" id="price" value="" size="8" maxlength="8" class="required"></td>
    <td><input type="text" name="amount" id="amount" value="" size="6" maxlength="6" class="digits required"></td>
    <td style="text-align:right"><button id="addrecord_btn">Добавить</button></td>
 </tr>

</table>

<p>&nbsp;</p>