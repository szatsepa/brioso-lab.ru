<?php

/*
 * 19/5/2012
 */
$imgfile_b   = $document_root . '/images/' . basename($_FILES['imgfile']['name']);

$user_id = intval($_SESSION[id]);

$name_id = intval($attributes[name_id]);

$time = intval($attributes[times]);

$comment = quote_smart($attributes[comment]);

$server = $_SERVER[SERVER_NAME];

$size = intval($attributes[MAX_FILE_SIZE]);

if($size > $_FILES['imgfile']['size']){
    
    $filetype = $_FILES['imgfile']['name'];
    
    $tmp_arr = explode(".",$filetype);
    
    $filetype = $tmp_arr[1];
    
    unset ($tmp_arr);
    
    $type = 1;
    
    if($filetype == 'swf') $type = 2;
    
       
if (!move_uploaded_file($_FILES['imgfile']['tmp_name'], $imgfile_b)) {
    ?>
<script language="javascript">alert('Ошибка при копировании файла');</script>
      <?php 
 } else {
            
            $flnm = time().'.';
            
             $new_imgfile = $document_root."/images/items/img". $flnm.$filetype;
             
             $url = "img". $flnm.$filetype;
             
             $url = quote_smart($url);
             
             $attributes[type] = $type;
             
            // Убьем старый файл
            if (file_exists($new_imgfile)) {
                unlink ($new_imgfile);
            }
            
            // Переименуем загруженный файл
            rename ($imgfile_b, $new_imgfile);
            
            $query = "INSERT INTO br_images (name) VALUES ($url)";
            
            $result = mysql_query($query) or die($query);
            
            $insid = mysql_insert_id();
            
           if($insid != 0){
               
//               echo "slide_id => $insid";
            
            ?>


    <script language="javascript">
    document.write ('<form action="index.php?act=imgs" method="post"><input name="iid" type="hidden" value="<?php echo $insid;?>"/></form>');
    document.forms[0].submit();
    </script>
<?php
           }
  } 
        
}  else {
                ?>
<script lenguich="javascript">alert('Файл слишком велик.')</script>
<?php
   
}
?>
