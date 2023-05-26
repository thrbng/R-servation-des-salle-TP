<?php
session_start();
include("server.php");

$idc=$_POST['group'];

$query="DELETE FROM courses WHERE id=$idc";
$result=mysqli_query($connection, $query);

if ($result) {
    echo "Booking has been deleted successfully!<br>";
    echo ("<a href='../teachb.php'>continue</a>");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>