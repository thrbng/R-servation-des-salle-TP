<?php
include "server.php";

$ngroup=$_POST["ngroup"];
$nstudents=$_POST["nstudents"];

$query="SELECT * FROM groups WHERE ngroup=$ngroup";
$result=mysqli_query($connection,$query);
$num_rows=mysqli_num_rows($result);
if($num_rows==0){
    $query1="INSERT INTO groups (id,ngroup,nstudents) VALUES('','$ngroup','$nstudents')";
    $result2=mysqli_query($connection, $query1);

    if ($result2) {
        echo "Group data has been inserted successfully!<br>";
        echo ("<a href='../admin_a.html'>continue</a>");
    } else {
        echo "Error: " . $query1 . "<br>" . mysqli_error($connection);
    }
}
else{
    echo "Group already exist!<br>";
    echo ("<a href='../admin_a.html'>continue</a>");
}

mysqli_close($connection);
?>