<?php

/*
 * created by arcady.1254@gmail.com 11/5/2012
 */

$word = "0123456789";

$query = "SELECT * FROM `some_items` WHERE `params` LIKE '%$word%'";
 
//$query = " SELECT *,
//	        MATCH (params) AGAINST ('$word') AS rel 
//	        FROM some_items WHERE MATCH (params) AGAINST ('$word')";
$search_array = array();

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    array_push($search_array, $var);
}

mysql_free_result($result);

//echo "$query<br/>";

print_r($search_array);

?>
