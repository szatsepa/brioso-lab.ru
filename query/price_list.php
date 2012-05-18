<?php

/*
 * 18/5/2012
 */

$query = "SELECT p.id, 
                 p.group, 
                 p.name, 
                 p.description, 
                 p.type, 
                 p.quality, 
                 p.weight, 
                 p.price
            FROM br_products AS p";

$price_list_array = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($price_list_array, $var);
}

mysql_free_result($result);

print_r($price_list_array);
?>
