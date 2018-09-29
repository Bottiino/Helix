<?php 
    include_once 'session.php';
    
    session_unset(); 
    session_destroy();
    
    header('location: ../Php/login_form.php');
?>