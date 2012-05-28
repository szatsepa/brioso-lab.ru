<?php 

unset ($attributes);

unset($_SESSION[auth]);

unset ($_SESSION[id]);

setcookie("di", '', time()-(3600));

session_unset();

session_destroy();

header("location:index.php?act=main"); 

?>
<!-- <script language="javascript">
    document.location.href="index.php?act=main";
</script>-->