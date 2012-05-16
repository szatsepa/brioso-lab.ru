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
            include 'action/activation.php';
        }
//print_r($_SESSION);
if(isset ($_SESSION[id])) {
    include 'query/checkauth.php';
}

$title = "brioso-lab.ru";

//print_r($attributes);

switch ($attributes[act]) {
    
    case 'main':
        include 'query/all_slides.php';
        include 'main/header.php';
        include 'main/selector.php';
        include 'main/main.php';
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
    
    case "logout":
        include 'action/logout.php'; 
        break;
 
     case 'statistics':
         include 'action/statistics.php';
         break;
     
    default :
        include 'action/redirect.php';
        break;

}


include 'main/footer.php';

mysql_close($link);
?>
