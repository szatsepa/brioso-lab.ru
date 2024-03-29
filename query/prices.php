<?php

/*
 * created by arcady.1254@gmail.com 7/5/2012
 */
$pid = intval($attributes[pid]);

if(!$pid or $pid == 0)$pid=1;

$query = "SELECT p.id AS price_id,
                 p.name AS price_name,
                 pl.id AS item, 
                 pl.artikul, 
                 pl.barcode, 
                 pl.name, 
                 pl.volume,  
                 pl.price,
                 i.name AS img,
                 pl.property,
                 pl.degree,
                 pl.top,
                 CONCAT('b_',i.name) AS img_item
            FROM price AS p, 
                 pricelist AS pl,
                 image_items AS i
           WHERE p.status = 1
             AND p.id = pl.pricelist
             AND pl.barcode = i.barcode
             AND i.type = 1
             AND pl.code2 = 1
             AND p.id = $pid";

$result = mysql_query($query) or die($query);

$items_array = array();

while ($var = mysql_fetch_assoc($result)) {
    array_push($items_array, $var);
}

mysql_free_result($result);
?>
