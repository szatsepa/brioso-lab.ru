<?php

/*
 * 18/5/2012
 */

$query = "SELECT p.id, 
                 g.name AS `group`, 
                 p.name, 
                 p.description, 
                 t.name AS `type`, 
                 q.name AS `quality`,    
                 p.weight, 
                 p.price,
                 p.stars,
                 p.image
            FROM br_products AS p,
                 br_group AS g,
                 br_type AS t,
                 br_quality AS q
           WHERE p.group = g.id
           AND   p.type = t.id
           AND   p.quality = t.id
           AND   p.removed = 0";

$price_list_array = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($price_list_array, $var);
}

mysql_free_result($result);

//print_r($price_list_array);
?>
