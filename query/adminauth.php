<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */
if(isset ($attributes[ismail]) && $attributes[ismail] == 1){
    
    $email = $_SESSION[email];
    
    unset($_SESSION[email]);

}else{
    
$code = quote_smart($attributes[code]);

        $query = "SELECT id FROM users WHERE code = $code AND activ = 1";
        
        $result = mysql_query($query) or die($query);
        
         $num_rows = mysql_num_rows($result);
         
         if($num_rows != 0){
        
                 $row = mysql_fetch_row($result);
    
                     $_SESSION['id'] = $row[0];
         
                     $_SESSION['auth'] = 1;
                     
                     setcookie("di", $_SESSION['id'], time()+(3600*12));
               
//  echo $query;                   
               
?>


    <script language="javascript">
    document.location.href = "?act=main";
    </script>
    
    <?php 
    }else{
        
     $lo = logout();   
    ?>
<script language="javascript">   
    document.location.href = "http://brioso-lab.ru/index.php";
</script>    
    <?php } 
    
} 
    
  function logout(){
      
        unset($_SESSION[id]);
        unset ($_SESSION[auth]);
        unset($_COOKIE[di]);
        return NULL;   
  }
  
  ?>
