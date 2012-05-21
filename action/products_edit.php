<?php

/*
 * 19/5/2012
 */

$pid = intval($attributes[pid]);

$pgroup = intval($attributes[pgroup]);

$pname = quote_smart($attributes[pname]);

$dscr = quote_smart($attributes[dscr]);

$ptype = intval($attributes[ptype]);

$pqlty = intval($attributes[pqlty]);

$stars = intval($attributes[stars]);

if($stars>5)$stars=5;

$pweight = quote_smart($attributes[pweight]);

$pprice = quote_smart($attributes[pprice]);

if($attributes[act] == 'prdel'){
    $query = "UPDATE `br_products` SET `removed`=1 WHERE id=$pid"; 
}  else {
    $query = "UPDATE `br_products` SET `group`=$pgroup, `name`=$pname, `description`=$dscr, `type`=$ptype, `quality`=$pqlty, `stars`=$stars, `weight`=$pweight, `price`=$pprice WHERE `id`=$pid";
}

$result = mysql_query($query) or die($query);

//echo "$query";

header("location:index.php?act=prc&dejstvo=$attributes[act]");
?>
