<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */

// Проверка аутентификации

if(!isset ($user)){
    
    $user = new User();

if (isset($_SESSION[auth])) {
	
    $user_id = $_SESSION[id];
    
       if($_SESSION[auth] != 0){
           
            $user->setUser($user_id);

       }
     
    }

    if(!($user->data[id])){
        unset($_SESSION[auth]);
        unset($_SESSION[id]);
        unset($_COOKIE[di]); 
        unset($_COOKIE[who]);
        setcookie("di", '', time()-(3600));
        setcookie("who", '', time()-(3600));
    }
}
?>
