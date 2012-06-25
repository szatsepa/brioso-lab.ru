<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$id = intval($_POST[persone_id]);

$who = $_POST[who];

if($who == 'u'){
    $query = "SELECT 
				u.id,
				u.surname,
				u.name,
				u.email,
				u.phone,
				u.code
			FROM users u 
			WHERE u.id = $id";
    
   
}else{
     $query = "SELECT
				u.id,
				u.surname,
				u.name,
				u.email,
				u.phone,
				u.code
			FROM customers u 
			WHERE u.id = $id";
}

 $result = mysql_query($query) or die($query);

$persone = mysql_fetch_assoc($result);

echo json_encode($persone);

mysql_close(); 
?>
