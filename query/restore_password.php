<?php

/*
 * 29/5/2012
 */

$email = $attributes[email];

$query = "SELECT code FROM customers WHERE email = '$email'";

if($_SESSION[auth] == 2)$query = "SELECT code FROM users WHERE email = '$email'";

$result = mysql_query($query) or die ($query);

$row = mysql_fetch_assoc($result);

$code = $row[code];

$message ="Здравствуйте! Ваш пароль(код доступа)  - $code зарегистрирован на brioso-lab.ru.\r\n C уважением. Администрация. ";              

$headers = 'From: administrator@brioso-lab.ru\r\n';

$headers  .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

mail($email, 'Регистрация', $message, $headers);

header ("location:index.php?act=main");
?>
