<?php 
session_start();
echo"";
session_destroy();
header('location:/forum/index.php');
?>