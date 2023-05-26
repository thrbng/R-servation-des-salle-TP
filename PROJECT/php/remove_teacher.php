<?php
include "server.php";

$idu=$_POST["idu"];

$query="DELETE FROM users WHERE id=$idu";
$result=mysqli_query($connection, $query);

if ($result) {
    echo "Teacher data has been deleted successfully!<br>";
    echo ("<a href='../admin_r.php'>continue</a>");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>