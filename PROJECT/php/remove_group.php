<?php
include "server.php";

$ngroup=$_POST["ngroup"];

$query="DELETE FROM groups WHERE ngroup LIKE '$ngroup'";
$result=mysqli_query($connection, $query);

if ($result) {
    echo "Group data has been deleted successfully!<br>";
    echo ("<a href='../admin_r.php'>continue</a>");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>