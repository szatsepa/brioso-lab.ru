<?php

/*
 * 29/5/2012
 */
$id = intval($_SESSION[id]);

$item = intval($attributes[item]);

$price_id = intval($attributes[price_id]);

$discount = 0;

if(!isset($attributes[discount]))$discount = intval($attributes[discount]);

$volume = intval($attributes[vl]);

$b = intval($attributes[b]);

$s = intval($attributes[s]);

$h = intval($attributes[h]);



            
$query   = "UPDATE cart 
                        SET amount   = (amount + $volume),
                            discount = $discount,
                            time         = now()
                        WHERE artikul    = '$attributes[artikul]'
                         AND  customer    = $id";            



$query_try = mysql_query($query) or die($query);


	
	// Таких записей нет, делаем простой INSERT
if (mysql_affected_rows() == 0) {

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
                        '$attributes[artikul]',
                        $price_id,
                        $h,
                        $s,
                        $b,
                        $id,
                        now())";

$result = mysql_query($query) or die($query);

}

$query = "UPDATE pricelist 
	  SET amount = (`amount` - $volume) 
	  WHERE artikul = '$attributes[artikul]' AND code2 <> 'X'";

mysql_query($query) or die($query);

 $query = "UPDATE cart SET time = now()  
	   WHERE customer  = id 
           AND price_id = $price_id";
 
 mysql_query($query) or die($query);
 
 // Пропишем в корзине id заказа, из которого создан данный заказ
$parent_order = intval($attributes[parent_order]);

if (isset($parent_order) and $parent_order > 0) {


    $query = "UPDATE cart SET parent_order = $parent_order  
                            WHERE customer  = $id
                            AND price_id = $price_id";
   
    mysql_query($query) or die($query);
}

// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

mysql_query("DELETE FROM cart WHERE amount = 0");

header("location:index.php?act=main");
?>
