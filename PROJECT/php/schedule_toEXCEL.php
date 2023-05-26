<?php
session_start();
$idu=$_SESSION['id'];
include("server.php");

$sql="SELECT * FROM courses INNER JOIN groups g ON idg=g.id INNER JOIN rooms r ON r.id=idr WHERE idu=$idu";
$result=$connection->query($sql);

$result = $connection->query($sql);
$courses = $result->fetch_all(MYSQLI_ASSOC);

$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');
$hours = array('8', '10', '13', '15');

$html='<table border="1" style="width: 100%;height: 500px;"><tr><th>Hour</th><th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th></tr>';

foreach($hours as $hour){
    $html=$html.'<tr>';
    $html=$html.'<td>'.$hour.':00</td>';
    foreach($days as $day){
        $course_found = false;
        foreach($courses as $course){
            if($course['dayc']==$day && $course['timec']==$hour){
                $html=$html.'<td>G:'.$course['ngroup'].' \ '.$course['name'].' \ room:'.$course['rname'].'</td>';
                $course_found = true;
                continue;
            }
        }
        if(!$course_found){
            $html=$html.'<td></td>';
        }
    }
    $html=$html.'</tr>';
}
$html=$html.'</table>';

echo $html;

header('Content-Type:application/xls');
header('Content-Disposition:attachemnt;filename=SCHEDULE.xls');
?>