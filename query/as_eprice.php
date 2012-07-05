<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$pid = $attributes[pid];

$query = "SELECT p.id, p.artikul, p.barcode, p.code2, p.name, p.state, p.volume, p.price, p.amount, p.pricelist, i.name AS img
FROM pricelist AS p, image_items AS i
WHERE p.pricelist =$pid
AND i.barcode = p.barcode
AND p.code2 <> 'X'
ORDER BY p.id";

$result = mysql_query($query) or die ($query);

$pricelist = array();

while ($var = mysql_fetch_assoc($result)){
        array_push($pricelist, $var);
}

mysql_free_result($result);
?>
