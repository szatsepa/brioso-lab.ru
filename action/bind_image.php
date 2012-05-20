<?php

/*
 * 20/5/2012
 */

$id = intval($attributes[item]);

$image = intval($attributes[img]);

$query = "UPDATE br_products SET image=$image WHERE id=$id";

$result = mysql_query($query) or die($query);

header("location:index.php?act=prc");
?>
