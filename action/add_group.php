<?php

/*
 * 18/5/2012
 */
//print_r($attributes);

$name = quote_smart($attributes[gname]);

$dscr = quote_smart($attributes[dscr]);

$query = "INSERT INTO br_group (name, description) VALUES ($name, $dscr)";

mysql_query($query) or die($query);

$id = mysql_insert_id();

if($id){
    header("location:index.php?act=group&gid=$id");
    
    }
?>
