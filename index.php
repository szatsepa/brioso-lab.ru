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
//print_r($attributes);

if(isset($attributes[di]) && !isset ($_SESSION[auth]) && $attributes[di] != ''){
         
   $_SESSION[id] = $attributes[di];
   
   $_SESSION[auth] = $attributes[who];
         
}

if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}

$title = "brioso-lab.ru";

switch ($attributes[act]) {
    
    case 'main':
        $title .= "-создай цвет!";
        include 'query/cart.php';
        include 'query/prices.php';
        include 'main/header.php';
        include 'main/subheader.php';
        include 'main/main.php';
        break;
    
    case 'groups':
        $title .= "-выбери группу!";
        include 'query/cart.php';
        include 'main/header.php';
        include 'main/subheader.php';
        include 'main/groups.php';
        break;
    
    case 'cart':
        $title .= "-корзина!";
        if(!isset($_SESSION[auth]))header ("location:index.php");
        include 'query/cart.php';
        include 'query/q_cart.php';
        include 'main/header.php';
        include 'main/subheader.php';
        include 'main/chambers.php';
        break;
    
    case 'addc':
        include 'main/header.php';
        include 'action/add_cart.php';
        break;
    
    case 'adds':
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/uploader.php';
        break;
    
    case 'addsu':
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/upload_slide.php';
        break;
    
    case 'ups':
        include 'main/header.php';
        include 'action/upload_image.php';
        break;
    
    case 'upsn':
        include 'main/header.php';
        include 'action/upload_img_w.php';
        break;
    
    case 'upp':
        include 'main/header.php';
        include 'action/upload_parametres.php';
        break;
    
     case 'uppn':
        include 'main/header.php';
        include 'action/update_parametres.php';
        break;
    
    case 'alls':
        
        break;
    
    case 'exp':
        include 'query/rlv_search.php';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/rlv_search.php';
        break;
    
    case 'search':
        include 'query/all_slides.php';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/search.php';
        break;
    
    case 'searchn':
        include 'query/all_slides_w.php';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/slider_search.php';
        break;
    
    case 'srch':
        include 'query/search.php';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/result_search.php';
        break;
    
   case 'srchn':
        include 'query/search_w.php';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/result_search_w.php';
        break;
    
    case 'auth':
        include 'main/header.php';
        include 'query/authentication.php';
        break;
    
    case 'reg':
        include 'main/header.php';
        include 'action/registration.php';
        break;
    
    case 'activation':
        include 'action/activation.php';
        break;
    
    case 'repas':
        include 'query/restore_password.php';
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
