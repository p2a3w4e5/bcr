<?php
        session_start();
        error_reporting( error_reporting() & ~E_NOTICE );
         $_SESSION['login_user'] = "none";
         $_SESSION['loggedIn'] = "none";
         $_SESSION['role'] = "none";
         $_SESSION['invlog'] = "none" ;
        header("location: index.php");
 //        header("location: https://czajkow8.uwmsois.com/index.php");
?>
