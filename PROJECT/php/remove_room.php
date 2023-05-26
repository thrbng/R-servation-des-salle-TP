<?php
include "server.php";

$rname=$_POST["rname"];

$query="DELETE FROM rooms WHERE rname LIKE '$rname'";
$result=mysqli_query($connection, $query);

if ($result) {
    echo "Room data has been deleted successfully!<br>";
    echo ("<a href='../admin_r.php'>continue</a>");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>