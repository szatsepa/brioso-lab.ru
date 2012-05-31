<?php

/*
 * 18/5/2012 query
 */

include 'connect.php';

$request = $_POST[v];

$query = "SELECT p.id AS price_id,
                 p.name,
                 p.comment,
                 i.name AS img
            FROM price AS p,
                 image_groups AS i 
           WHERE p.activ = 1 
           AND   p.image = i.id";

$group_array = array();

$result=  mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($group_array, $var); 
}

mysql_free_result($result);

mysql_close();

 echo json_encode($group_array); 
?>
