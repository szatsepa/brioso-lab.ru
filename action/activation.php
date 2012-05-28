<?php

/*
 * created by arcady.1254@gmail.com 20/4/2012
 */
 $code = quote_smart($attributes[code]);
 
 $id = intval($attributes[id]);
 
 $query = "UPDATE customers SET activ = 1 WHERE code = $code";
 
 mysql_query($query) or die ($query);
 
 header("location:index.php?act=main");
?>
