<?php

/*
 * created by arcady.1254@gmail.com 2/2/2012
 */
$admin = $_SERVER [REQUEST_URI];

$admin =  substr($admin, 0,3);

if(isset ($attributes[ismail]) && $attributes[ismail] == 1){
    
    $email = $_SESSION[email];
    
    unset($_SESSION[email]);

}else{
    
$where = $attributes[srch];    
    
$code = quote_smart($attributes[code]);

$email = quote_smart($attributes[email]);

$who = "customer";

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
                     
if($admin == '/as' && $_SESSION['auth'] == 2){
    header("location:index.php?act=logout");
}                    
               
//  echo $query;  
                     
?>


    <script language="javascript">
//        alert(<?php echo $query;?>);
    document.write ('<form action="index.php<?php echo $where;?>" method="post"><input type="hidden" name="id" value="<?php echo $row[0];?>"/></form>');
    document.forms[0].submit();
    </script>
    
    <?php 
             }else{
        
     $lo = logout();   
    ?>
<script language="javascript">   
    document.location.href = "index.php<?php echo $where;?>";
</script>    
    <?php } 
    
} 
    
  function logout(){
      
        unset($_SESSION[id]);
        unset ($_SESSION[auth]);
        unset($_COOKIE[di]);
        setcookie("di", '', time()-(3600));
        return NULL;   
  }
  
  ?>
