<?php

/*
 * 29/5/2012
 */
include 'connect.php';

$email = $_POST[email];

$query = "SELECT code FROM customers WHERE email = '$email'";

$result = mysql_query($query) or die ($query);

if(!$result){
    
    $query = "SELECT code FROM users WHERE email = '$email'";
    
    $result = mysql_query($query) or die ($query);
}

$code = '';
while ($row = mysql_fetch_assoc($result)){
    $code .= "'".$row[code]."', ";
}



$message ="Здравствуйте! Ваш пароль(код доступа)  - $code зарегистрирован на brioso-lab.ru.\r\n C уважением. Администрация. ";              

$headers = 'From: administrator@brioso-lab.ru\r\n';

$headers  .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

$out=array('query' => "$email\n, 'Регистрация',\n $message,\n $headers",'code'=>$code);

if(mail($email, 'Регистрация', $message, $headers)){
    
   $out['mail']=1;
}else{
    $out['mail']=NULL;
}
echo json_encode($out);

mysql_close();

?>
