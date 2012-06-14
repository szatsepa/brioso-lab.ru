<?php

/*
 * created by arcady.1254@gmail.com 2/5/2012
 */
include 'query/connect.php';

include 'action/quotesmart.php';

include 'classes/User.php';

 if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();    
}
//print_r($_SESSION);

if(isset($attributes[di]) && !isset ($_SESSION[auth]) && $attributes[di] != ''){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = $attributes[who];
         
}

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}

$title = "brioso-lab.ru";

//if(!isset($_SESSION[auth]))header ("location:index.php");

switch ($attributes[act]) {
    
    case 'main':
        $title .= "-создай цвет!";
        include 'query/cart.php';
        include 'query/prices.php';
        include 'admin/header.php';
        include 'admin/subheader.php';
        include 'admin/main.php';
        break;

    
    case "logout":
        include 'action/logout.php'; 
        break;
 
     case 'statistics':
         include 'action/statistics.php';
         break;
     
     case 'info':
         phpinfo();
         break;
     
    default :
        include 'action/redirect.php';
        break;

}


include 'main/footer.php';

mysql_close($link);
?>
