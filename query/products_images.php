<?php

/*
 * 20/5/2012
 */

$query = "SELECT * FROM br_images WHERE type=0";

$imgs_array = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($imgs_array, $var);
}

mysql_free_result($result);
?>
