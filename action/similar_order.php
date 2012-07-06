<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$order = intval($_POST[order]);

$query = "SELECT customer, artikul, price_id, amount, hsb FROM orders_items WHERE `order` = $order";

$result = mysql_query($query);

$out = array('ok'=>NULL);

$cart = array();

while ($var = mysql_fetch_assoc($result)){
    $tmp_var = array();
    $tmp_var = $var;
    $tmp = $tmp_var[hsb];
    $len = strlen($tmp);
    $tmp = substr($tmp, 1,($len-2));
    $tmp_arr = explode(",", $tmp);
    $tmp_var['h'] = $tmp_arr[0];
    $tmp_var['s'] = str_replace('%', '', $tmp_arr[1]);
    $tmp_var['b'] = str_replace('%', '', $tmp_arr[2]);
    array_push($cart, $tmp_var);

}
foreach ($cart as $value) {
    
                
        $query   = "UPDATE cart 
                                SET amount   = (amount + $value[amount]),
                                    `time`         = now()
                                WHERE artikul    = '$value[artikul]'
                                AND  customer    = $value[customer]";            



        mysql_query($query) or die($query);



// Таких записей нет, делаем простой INSERT
        if (mysql_affected_rows() == 0) {

        $query = "INSERT INTO cart (
                                amount,
                                artikul,
                                price_id,
                                h,
                                s,
                                b,
                                customer,
                                `time`)
                                VALUES
                                (
                                $value[amount],
                                '$value[artikul]',
                                $value[price_id],
                                $value[h],
                                $value[s],
                                $value[b],
                                $value[customer],
                                now())";

        $result = mysql_query($query) or die($query);

        }

        $query = "UPDATE pricelist 
                SET amount = (`amount` - $value[amount]) 
                WHERE artikul = '$value[artikul]' AND code2 <> 'X'";

        mysql_query($query) or die($query);

        $query = "UPDATE cart SET `time` = now()  
                WHERE customer  = id 
                AND price_id = $value[price_id]";

        mysql_query($query) or die($query);

        // Пропишем в корзине id заказа, из которого создан данный заказ


            $query = "UPDATE cart SET parent_order = $order  
                                    WHERE customer  = $value[customer]
                                    AND price_id = $value[price_id]";

            mysql_query($query) or die($query);
        

        // если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

        mysql_query("DELETE FROM cart WHERE amount = 0");

}

if(count($cart)>0){
    $out['ok'] = 1;
    $out['cart'] = $cart;
}

echo json_encode($out);

mysql_close();
?>
