<?php

/*
 * 18/5/2012 query
 */

$query = "SELECT * FROM br_group WHERE activ = 1";

$group_array = array();

$result=  mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($group_array, $var);
}

mysql_free_result($result);
?>
