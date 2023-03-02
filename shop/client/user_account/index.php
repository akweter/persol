<?php
    session_start();
    
    if (! empty($_SESSION['cust_login']) || ($_SESSION['cust_sign_up'])) {
        header("location: ../");
    }
    else {
        header("location: ./login.php");
    }
?>
