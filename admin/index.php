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
        include '../query/group.php';
        include 'header.php';
        include 'selector.php';  
        include 'group.php';
        break;
    
    case 'addgroup':
        include 'header.php';
        include '../action/add_group.php';
        break;
    
    case 'gedit':
        include 'header.php';
        include '../action/gedit.php';
        break;
    
    case 'gdel':
        include 'header.php';
        include '../action/gedit.php';
        break;
    
    case 'type':
        include '../query/type.php';
        include 'header.php';
        include 'selector.php'; 
        include 'type.php';  
        break;
    
    case 'addtype':
        include 'header.php';
        include '../action/add_type.php';
        break;
    
    case 'tedit':
        include 'header.php';
        include '../action/tedit.php';
        break; 
    
    case 'tdel':
        include 'header.php';
        include '../action/tedit.php';
        break;
    
    case 'qlty':
        include '../query/quality.php';
        include 'header.php';
        include 'selector.php'; 
        include 'quality.php'; 
        break;
    
    case 'addqlty':
        include 'header.php';
        include '../action/add_quality.php';
        break;
    
    case 'qedit':
        include 'header.php';
        include '../action/qedit.php';
        break; 
    
    case 'qdel':
        include 'header.php';
        include '../action/qedit.php';
        break;
    
    case 'prc':
        include '../query/all_images.php';
        include '../query/group.php';
        include '../query/type.php';
        include '../query/quality.php';
        include '../query/price_list.php';
        include 'header.php';
        include 'selector.php'; 
        include 'products.php'; 
        break;
    
    case 'pedit':
        include 'header.php';
        include '../action/products_edit.php';
        break;
    
    case 'prdel':
        include 'header.php';
        include '../action/products_edit.php';
        break;
    
    case 'addproduct':
        include 'header.php';
        include '../action/add_products.php';
        break;
    
    case 'imgs':
        include '../query/all_images.php';
        include 'header.php';
        include 'selector.php';
        include 'all_images.php';
        break;
    
    case 'addimg':
        include 'header.php';
        include '../action/images_products.php';
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
