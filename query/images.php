<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function get_images($type){
    
    $query = "SELECT * FROM br_images WHERE type=$type";

    $imgs_array = array();

    $result = mysql_query($query) or die($query);

    while ($var = mysql_fetch_assoc($result)){
        array_push($imgs_array, $var);
    }

    mysql_free_result($result);
    
    return $imgs_array;
}
?>
