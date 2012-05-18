<?php
/*
 * 18/5/2012
 */
$name = quote_smart($attributes[gname]);

$dscr = quote_smart($attributes[dscr]);

$id = intval($attributes[gid]);

if($attributes[act] == 'tedit'){

    $query = "UPDATE br_type SET name=$name, description=$dscr WHERE id=$id";

}else{
    
     $query = "UPDATE br_type SET activ=0 WHERE id=$id";
    
}

mysql_query($query) or die($query);

header("location:index.php?act=type");
?>
