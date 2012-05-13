<?php

/*
 * created by arcady.1254@gmail.com 7/5/2012
 */

$query = "SELECT * FROM some_items";

$result = mysql_query($query) or die($query);

$slide_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($slide_array, $var);
}

mysql_free_result($result);

//print_r($slide_array);
?>
