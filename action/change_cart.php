<?php

/*
 * 2/6/2012
 */

include '../query/connect.php';

$id = intval($_POST[cart_id]);

$volume = intval($_POST[volume]);

$user_id = intval($_POST[user_id]);

$data_array = array();

$query   = "UPDATE cart 
                        SET amount   = $volume,
                            time         = now()
                        WHERE id    = $id";            



$query_try = mysql_query($query) or die($query);

$query = "SELECT  b.amount,
                    b.discount,
                   (a.price*b.amount) AS cost
             FROM pricelist a, cart b
             WHERE a.artikul = b.artikul
               AND a.pricelist = b.price_id
               AND b.id=$id";

$result = mysql_query($query) or die($query);

mysql_query("DELETE FROM cart WHERE amount = 0");

$row = mysql_fetch_assoc($result);

array_push($data_array, $row);

$query = "SELECT  SUM(b.amount) AS summ_amount,
                   SUM(a.price*b.amount) AS summ_cost
             FROM pricelist a, cart b
             WHERE a.artikul = b.artikul
               AND a.pricelist = b.price_id
               AND b.customer=$user_id";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

array_push($data_array, $row);

echo json_encode($data_array);

mysql_close();
?>
