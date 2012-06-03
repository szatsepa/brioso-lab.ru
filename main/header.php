<?php
header('Content-Type: text/html; charset=utf-8');
 echo '<?xml version="1.0" encoding="utf-8"?>';
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">

<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
        <meta name="title" content="<?php echo $title; ?>" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        
        <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/user_forms.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo "../css/$attributes[act].css";?>" type="text/css" />
        
        <script type="text/javascript" src="/js/jquery.easing.min.1.3.js"></script>
        <script type="text/javascript" src="/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.6.custom.min.js"></script>
        <script type="text/javascript" src="/js/color_select.js"></script>
        <script type="text/javascript" src="/js/scripts.js"></script>
        <script type="text/javascript" src="/js/<?php echo $attributes[act];?>.js"></script>
        <script type="text/javascript" src="/js/my_request.js"></script>
</head>
    <body onload="">
       <div class="main"> 
        <div class="main_0">

           