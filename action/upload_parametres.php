<?php

/*
 * created by arcady.1254@gmail.com 7/5/2012
 */

$user_id = $_SESSION[id];

$id = intval($attributes[slide_id]);

$p1 = quote_smart($attributes[param_1]);

$p2 = quote_smart($attributes[param_2]);

$p3 = quote_smart($attributes[param_3]);

$p4 = quote_smart($attributes[param_4]);

$p5 = quote_smart($attributes[param_5]);

$query = "UPDATE `some_objects` SET `param_1` = $p1, `param_2` = $p2, `param_3` = $p3 WHERE id = $id";

$result = mysql_query($query) or die($query);

header("location:index.php?act=main");
?>
