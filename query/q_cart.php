<?php

/*
 * 1/6/2012
 */

//include 'connect.php';

$user_id = intval($_SESSION[id]);

$query = "SELECT a.artikul,
                    a.name, 
                    a.volume, 
                    a.price,
                    b.amount,
                    b.discount,
                    a.id,
                    p.comment,
                    gp.name AS img,
                    (a.price*b.amount) AS cost,
                    p.id AS price_id
             FROM pricelist a, cart b, price p,image_items gp
             WHERE a.artikul = b.artikul
               AND a.pricelist = b.price_id
               AND a.pricelist = p.id
               AND gp.barcode = a.barcode
               AND gp.type = 1
               AND b.customer=$user_id
               AND a.code2 <> 'X'
             ORDER BY b.id";

$result = mysql_query($query) or die($query);

$cart_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($cart_array, $var);
}

//echo json_encode($cart_array);

mysql_close();
?>
