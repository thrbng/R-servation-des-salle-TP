<?php
    session_start();
    if(isset($_SESSION['fname'])&&(isset($_SESSION['email']))){
        session_destroy();
        header('location: ../index.html');
    }
    else{
        header('location: ../index.html');
    }
?>