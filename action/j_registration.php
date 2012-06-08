<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$code = $_POST[code];

$email = $_POST[email];

$query = "INSERT INTO customers (code,email) VALUES ('$code','$email')";

$result = mysql_query($query) or die($query);

$id = mysql_insert_id();

$message ="Здравствуйте! Почтовый ящик  - $email зарегистрирован на brioso-lab.ru.\r\n Пароль для входа - $code.\r\nДля активации аккаунта перейдите по ссылке - http://brioso-lab.ru/index.php?act=activation&id=$id&code=$code\r\n C уважением. Администрация. ";              

$headers = 'From: administrator@brioso-lab.ru\r\n';

$headers  .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

$out = array();

if(mail($email, 'Регистрация', $message, $headers)){
   $out['mail']=1; 

}else{
    $out['mail']=NULL;
}

echo json_encode($out);

mysql_close();
?>
