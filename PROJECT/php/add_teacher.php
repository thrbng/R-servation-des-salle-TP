<?php
include "server.php";

$email=$_POST["email"];
$password=$_POST["password"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];

$query="SELECT * FROM users WHERE (fname LIKE '$fname' AND lname LIKE '$lname') OR email LIKE '$email'";
$result=mysqli_query($connection,$query);
$num_rows=mysqli_num_rows($result);
if($num_rows==0){
    $query2="INSERT INTO users (id,email,password,fname,lname) VALUES('','$email','$password','$fname','$lname')";
    $result2=mysqli_query($connection, $query2);

    if ($result2) {
        echo "Teacher data has been inserted successfully!<br>";
        echo ("<a href='../admin_a.html'>continue</a>");
    } else {
        echo "Error: " . $query2 . "<br>" . mysqli_error($connection);
    }
}
else{
    echo "Teacher already exist!<br>";
    echo ("<a href='../admin_a.html'>continue</a>");
}

mysqli_close($connection);
?>