<?php

/*
 * 29/5/2012
 */
include '../query/connect.php';

$id = intval($_POST[user_id]);

if(!$id)$id=$_SESSION[id];

$item = intval($_POST[item]);

$price_id = intval($_POST[pid]);

$discount = 0;

if(!isset($_POST[discount]))$discount = intval($_POST[discount]);

$volume = intval($_POST[vl]);

$b = intval($_POST[b]);

$s = intval($_POST[s]);

$h = intval($_POST[h]);

$artikul = $_POST[artikul];



$query = "INSERT INTO cart (
                        amount,
                        artikul,
                        price_id,
                        h,
                        s,
                        b,
                        customer,
                        time)
                        VALUES
                        (
                        $volume,
                        '$artikul',
                        $price_id,
                        $h,
                        $s,
                        $b,
                        $id,
                        now())";

$result = mysql_query($query) or die($query);


$query = "UPDATE pricelist 
	  SET amount = (`amount` - $volume) 
	  WHERE artikul = '$_POST[artikul]' AND code2 <> 'X'";

mysql_query($query) or die($query);

 $query = "UPDATE cart SET time = now()  
	   WHERE customer  = id 
           AND price_id = $price_id";
 
 mysql_query($query) or die($query);
 
 // Пропишем в корзине id заказа, из которого создан данный заказ
$parent_order = intval($_POST[parent_order]);

if (isset($parent_order) and $parent_order > 0) {


    $query = "UPDATE cart SET parent_order = $parent_order  
                            WHERE customer  = $id
                            AND price_id = $price_id";
   
    mysql_query($query) or die($query);
}

// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

mysql_query("DELETE FROM cart WHERE amount = 0");

$query = "SELECT ((c.amount)*(pl.price)) AS cost 
         FROM cart AS c, pricelist AS pl  
         WHERE c.customer = $id 
         AND c.artikul = pl.artikul";

$result = mysql_query($query);

$summ_price = 0;

$num_rows = mysql_num_rows($result);

while ($row = mysql_fetch_assoc($result)){
    $summ_price += $row[cost];
}

$out = array('summ_amount'=>$num_rows,'summ_cost'=>$summ_price,'pid'=>$price_id);

//$row[pid] = $price_id; 

echo json_encode($out);

mysql_close(); 
?>
