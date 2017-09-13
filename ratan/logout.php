<?php
session_start();
session_destroy();
$_SESSION=array();
header("Cache-Control", "no-store, no-cache, must-revalidate");
echo '<script>window.location.href="login.php";</script>';
//header("location:Login.php");
exit();
?>
<script> </script>