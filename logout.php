<?php session_start(); ?>

<?php 

 $_SESSION['username'] = null;
 $_SESSION['userole'] = null;
     
 header("Location: login.php");

?>