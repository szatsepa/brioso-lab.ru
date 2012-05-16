<?php

/*
 * created by arcady.1254@gmail.com 16/5/2012
 */

$h = intval($attributes[h]);

$s = intval($attributes[s]);

$b = intval($attributes[b]);

$code = quote_smart($attributes[cod]);

$price = quote_smart($attributes[price]);

$c = "$attributes[c]";

$user_id = intval($_SESSION[id]);

$query = "INSERT INTO some_colors (user_id, h, s, b, name, price, factor) VALUES ($user_id, $h, $s, $b, $code, $price, $c)";

$result = mysql_query($query) or die($query);

header("location:index.php?act=main");

?>
