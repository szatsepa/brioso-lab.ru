<?php

/*
 * created by arcady.1254@gmail.com 8/5/2012
 */

$p1 = intval($attributes[p1]);

$p2 = intval($attributes[p2]);

$p3 = intval($attributes[p3]);

$query = "SELECT * FROM some_objects WHERE param_1 = $p1 AND param_2 = $p2 AND param_3 = $p3";

$result = mysql_query($query) or die($query);

$search_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($search_array, $var);
}

mysql_free_result($result);

//print_r($search_array);
?>
