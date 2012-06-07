<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */
if(!isset($_SESSION)){

    session_start();    
}

include 'connect.php';

include '../classes/User.php';

include '../action/quotesmart.php';
    
$where = $_POST[srch];

$code = quote_smart($_POST[code]);

$email = quote_smart($_POST[email]);

$who = "customer";

$num_rows = 0;

$out = array();

$query = "SELECT id FROM customers WHERE code = $code AND email = $email AND activ = 1";

$result = mysql_query($query) or die($query);

$num_rows = mysql_num_rows($result);

if($num_rows == 0){

    $query = "SELECT id FROM users WHERE code = $code AND email = $email AND activ = 1";

    $result = mysql_query($query) or die($query);             

    $num_rows = mysql_num_rows($result);

    $who = "users";

}
             
if($num_rows != 0){

    $row = mysql_fetch_row($result); 

    $_SESSION['id'] = $row[0];

    $_SESSION['auth'] = 1;

    if($who == 'customer')$_SESSION['auth'] = 2;

    setcookie("di", $_SESSION['id'], time()+(3600*12));
    setcookie("who", $_SESSION['auth'], time()+(3600*12));

    $user = new User();

    $user->setUser($row[0]);

    $id = $row[0];

    $query = "SELECT  SUM(b.amount) AS summ_amount,
                    SUM(a.price*b.amount) AS summ_cost
                FROM pricelist a, cart b
                WHERE a.artikul = b.artikul
                AND a.pricelist = b.price_id
                AND b.customer=$id";

    $result = mysql_query($query) or die($query);

    $row = mysql_fetch_assoc($result);
    
    if(!$row[summ_amount]){
        $row[summ_amount]=0;
        $row[summ_cost]=0;
    }

    $out['user'] = $user->data;
    $out['cart'] = $row;
              
}else{
    $out['error'] = 1;   
    $lo = logout();       
} 

echo json_encode($out);

function logout(){

    unset($_SESSION[id]);
    unset ($_SESSION[auth]);
    unset($_COOKIE[di]);
    setcookie("di", '', time()-(3600));
    return NULL;   
}

  mysql_close(); 
  ?>
