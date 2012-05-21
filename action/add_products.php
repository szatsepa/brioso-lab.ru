<?php

/*
 * 19/5/2012
 */

$pgroup = intval($attributes[pgroup]);

$pname = quote_smart($attributes[pname]);

$dscr = quote_smart($attributes[dscr]);

$ptype = intval($attributes[ptype]);

$pqlty = intval($attributes[pqlty]);

$stars = intval($attributes[stars]);

$pweight = quote_smart($attributes[pweight]);

$pprice = quote_smart($attributes[pprice]);

$image = intval($attributes[img_id]);

$query = "INSERT INTO `br_products` (`group`,`name`,`description`,`type`,`quality`,`weight`,`price`,`stars`, `image`) VALUES ($pgroup,$pname,$dscr,$ptype,$pqlty,$pweight,$pprice,$stars,$image)";

$result = mysql_query($query) or die($query);

$pid = mysql_insert_id();

header("location:index.php?act=prc&pid=$pid");
?>
