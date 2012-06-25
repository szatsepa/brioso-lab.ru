<?php
/*
*
*/

$query = "SELECT 
				u.id,
				u.surname,
				u.name,
				u.email,
				u.phone,
				u.code
			FROM users u 
			WHERE u.status = 1
                        AND u.activ = 1
			ORDER BY u.surname";

$result = mysql_query($query) or die($query);

$users_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($users_array, $var);
}

                $query = "SELECT
				u.id,
				u.surname,
				u.name,
				u.email,
				u.phone,
				u.code
			FROM customers u
                        WHERE u.activ = 1
                        ORDER BY u.surname";
                
$result = mysql_query($query) or die($query);

$customers_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($customers_array, $var);
}

 ?> 