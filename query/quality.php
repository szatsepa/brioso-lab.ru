<?php

/*
 * 18/5/2012 query
 */

$query = "SELECT * FROM br_quality WHERE activ = 1";

$quality_array = array();

$result=  mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($quality_array, $var);
}

mysql_free_result($result);
?>
