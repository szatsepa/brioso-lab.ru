<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$params = $attributes[params]; 

$query = "SELECT * FROM some_items WHERE params LIKE '%$params%'";

$result = mysql_query($query) or die($query);

$search_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($search_array, $var);
}

mysql_free_result($result);
?>
