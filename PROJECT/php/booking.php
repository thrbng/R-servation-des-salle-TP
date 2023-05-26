<?php
session_start();
include("server.php");

$idg=$_POST['group'];
$sql="SELECT nstudents FROM groups WHERE id=$idg";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$nstu=$row['nstudents'];

$module=$_POST['module'];
$day=$_POST['day'];
$time=$_POST['time'];
$idu=$_SESSION['id'];

$sql="SELECT * FROM courses WHERE idu=$idu AND dayc='$day' AND timec='$time'";
$result=mysqli_query($connection,$sql);
$num_rows=mysqli_num_rows($result);
if($num_rows!=0){
    echo "You can't book !! becuase you teach at that time<br>";
    echo "<a href='../teachb.php'>continue</a>";
}
else{
    $sql="SELECT * FROM courses WHERE idg=$idg AND dayc='$day' AND timec='$time'";
    $result=mysqli_query($connection,$sql);
    $num_rows=mysqli_num_rows($result);
    if($num_rows!=0){
        echo "You can't book !! becuase group study at that time<br>";
        echo "<a href='../teachb.php'>continue</a>";
    }
    else{
        $sql="SELECT id,nmachine FROM rooms WHERE id NOT IN(SELECT r.id FROM rooms r,courses c WHERE r.id=c.idr AND dayc='$day' AND timec='$time') ORDER BY nmachine ASC;";
        $result=mysqli_query($connection,$sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows==0){
            echo "You can't book !! because all rooms are full<br>";
            echo "<a href='../teachb.php'>continue</a>";
        }
        else{
            if($num_rows==1){
                $row=mysqli_fetch_assoc($result);
                $idr=$row['id'];
                $query="INSERT INTO courses VALUES('','$module','$idg','$idr','$idu','$time','$day')";
                $result=mysqli_query($connection,$query);
                if ($result) {
                    echo "Booking has been added successfully!<br>";
                    echo ("<a href='../teachb.php'>continue</a>");
                } else {
                    echo "Error: " . $query1 . "<br>" . mysqli_error($connection);
                }
            }
            else{
                while($row=mysqli_fetch_assoc($result)){
                    if($nstu>=$row['nmachine']){
                        break;
                    }
                }
                $idr=$row['id'];
                $query="INSERT INTO courses VALUES('','$module','$idg','$idr','$idu','$time','$day')";
                $result=mysqli_query($connection,$query);
                if ($result) {
                    echo "Booking has been added successfully!<br>";
                    echo ("<a href='../teachb.php'>continue</a>");
                } else {
                    echo "Error: " . $query1 . "<br>" . mysqli_error($connection);
                }
            }
        }
    }
}
?>