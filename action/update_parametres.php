<?php

/*
 * created by arcady.1254@gmail.com
 */

$id = intval($attributes[slide_id]);

$params = explode('^', $attributes[params]);

$str_params = '';

$parameters = quote_smart($attributes[params]);

for($i = 1;$i < (count($params)+1);$i++){
    
    $p = $params[$i];
    
    $str_params .= "`param_$i`=$p";
    if($i < (count($params)))$str_params .= ",";
}

$query = "UPDATE  `some_items` SET params=$parameters  WHERE id = $id";

$result = mysql_query($query) or die($query);

//echo "<script type='text/javascript'>alert('$query')</script>";

header("location:index.php?act=main");
?>
