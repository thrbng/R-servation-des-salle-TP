<?php
include "server.php";

$rname=$_POST["rname"];
$nmachine=$_POST["nmachine"];

$query="SELECT * FROM rooms WHERE rname='$rname'";
$result=mysqli_query($connection,$query);
$num_rows=mysqli_num_rows($result);
if($num_rows==0){
    $query2="INSERT INTO rooms (id,rname,nmachine) VALUES('','$rname','$nmachine')";
    $result2=mysqli_query($connection, $query2);

    if ($result2) {
        echo "Room data has been inserted successfully!<br>";
        echo ("<a href='../admin_a.html'>continue</a>");
    } else {
        echo "Error: " . $query2 . "<br>" . mysqli_error($connection);
    }
}
else{
    echo "Room already exist!<br>";
    echo ("<a href='../admin_a.html'>continue</a>");
}

mysqli_close($connection);
?>