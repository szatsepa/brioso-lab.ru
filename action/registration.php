<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$code = quote_smart($attributes[code]);

$email = quote_smart($attributes[email]);

$query = "INSERT INTO customer (code,email) VALUES ($code,$email)";

$result = mysql_query($query) or die($query);

$id = mysql_insert_id();

$message ="Здравствуйте! Почтовый ящик  - $email зарегистрирован на brioso-lab.ru.\r\n Пароль для входа - $key.\r\nДля активации аккаунта перейдите по ссылке - http://brioso-lab.ru/index.php?act=activation&id=$id&code=$key\r\n C уважением. Администрация. ";              

$headers = 'From: administrator@brioso-lab.ru\r\n';

$headers  .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

mail($email, 'Регистрация', $message, $headers);

header ("location:index.php?act=main&mail=$email");



function _gomail($email, $key,$id){ 

            
            
            return 1;
    
}
?>
