<?php
    session_start();
    if(!(isset($_SESSION['fname']))&&(isset($_SESSION['email']))){
        header('Location: ../index.html');
    }
    include "server.php";

    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
    $result=mysqli_query($connection,$query);
    $num_rows=mysqli_num_rows($result);
    if($num_rows==1){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['fname']=$row['fname'];
		$_SESSION['email']=$row['email'];
		$_SESSION['id']=$row['id'];

        if(($_SESSION['email']=="admin@tawjihi.dz")&&($row['password']=="admin")){
            header('Location: ../admin.html');
        }
        else header('Location: ../teach.html');
    }
    else{
        header('Location: ../index.html');
    }
?>