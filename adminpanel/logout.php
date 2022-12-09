<?php
    session_start();
    
    //sessiom_unset(); //Fatal error: Uncaught Error: Call to undefined function redirect()
    //in C:\xampp\htdocs\CMS\admin\logout.php:3 Stack trace: #0 {main} thrown in C:\xampp\htdocs\CMS\admin\logout.php on line 3

    session_destroy();
    header("location: login.php");
?>