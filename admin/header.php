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
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen, projection" />
        <script type="text/javascript" src="../js/scripts.js"></script>
        <?php
        if($attributes[act] == 'main'){  }
            ?>
        <link href="../res/screen.css" rel="stylesheet" type="text/css" />

        <script src="../res/jquery-1.4.4.min.js" type="text/javascript"></script>
        <script src="../res/jquery-ui-1.8.6.custom.min.js" type="text/javascript"></script>
        <script src="../res/main.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/Some_slider.js"></script>
        <script type="text/javascript" src="../js/img_show.js"></script>
        <?php
        
          ?>
</head>
    <?php 
    if($attributes[act]=='prc'){
        ?>
    <body onload="">
    <?php
    }else{
        ?>
        <body>
        <?php
    }
    ?>
       <div class="main"> 
        <div class="main_0">

           