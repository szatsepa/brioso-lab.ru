<?php

/*
 * 18/5/2012
 */

$query = "SELECT * FROM br_type WHERE activ=1";

$type_array = array();

$result=  mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($type_array, $var);
}

mysql_free_result($result);
?>
