<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$customer = intval($_SESSION[id]);

$query = "SELECT 
                    b.id, 
                    a.artikul,
                    a.name, 
                    a.volume, 
                    a.price,
                    b.amount,
                    b.discount,
                    a.id AS item,
                    p.comment,
                    gp.name AS img,
                    (a.price*b.amount) AS cost,
                    p.id AS price_id,
                    b.h,
                    b.s,
                    b.b
             FROM pricelist a, cart b, price p,image_items gp
             WHERE a.artikul = b.artikul
               AND a.pricelist = b.price_id
               AND a.pricelist = p.id
               AND gp.barcode = a.barcode
               AND gp.type = 1
               AND b.customer=$customer
              ORDER BY b.id";

$result = mysql_query($query) or die($query);

$my_cart = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($my_cart, $var);
}
mysql_free_result($result);

?>
