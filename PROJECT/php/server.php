<?php

$connection= mysqli_connect("localhost", "root", "", "project_tp");

if(mysqli_connect_errno()){
    die("Failed to connect with MySQL: ". mysqli_connect_error());
}
?>