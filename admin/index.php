<?php

/*
 * created by arcady.1254@gmail.com 
 */
include '../query/connect.php';

include '../action/quotesmart.php';

include '../classes/User.php';

 if(!isset($attributes) || !is_array($attributes)) {
     
        $attributes = array();
        
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();    
}
//print_r($_SESSION);
//echo "<br/>";


if($_SESSION[auth] != 1)$_SESSION[auth] = 0;


if(isset($attributes[id])){
         
   $_SESSION[id] = $attributes[id];
   
   $_SESSION[auth] = 1;
         
}

if(isset($attributes[di]) && !isset ($_SESSION[auth]) && $attributes[di] != ''){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = 1;
         
}

 if(isset ($attributes[pwd])){
            include '../action/activation.php';
        }
//print_r($_SESSION);
if(isset ($_SESSION[id])) {
    include '../query/checkauth.php';
}

$title = "brioso-lab.ru";

//print_r($attributes);

switch ($attributes[act]) {
    
    case 'main':
        include 'header.php';
        include 'selector.php';
        include 'main.php';
        break;
    
    case 'group':
        include 'header.php';
        include 'selector.php';  
//        include 'main.php'  
        break;
    
    case 'type':
        include 'header.php';
        include 'selector.php'; 
//        include 'main.php'  
        break;
    
    case 'color':
        include 'header.php';
        include '../action/add_new_color.php';
        break;
    
    case 'auth':
        include 'header.php';
        include '../query/authentication.php';
        break;
    
    case "logout":
        include '../action/logout.php'; 
        break;
 
     case 'statistics':
         include '../action/statistics.php';
         break;
     
    default :
        include '../action/redirect.php';
        break;

}


include '../main/footer.php';

mysql_close($link);
?>
