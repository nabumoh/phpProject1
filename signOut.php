<?php 
session_start();
session_unset();
session_destroy();
header("location: ../php final project/signIn.php");
exit();

?>