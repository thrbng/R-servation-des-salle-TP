<?php
session_start();
$idu=$_SESSION['id'];
require('fpdf/fpdf.php');
include("server.php");

$sql="SELECT * FROM courses INNER JOIN groups g ON idg=g.id INNER JOIN rooms r ON r.id=idr WHERE idu=$idu";
$result=$connection->query($sql);

$result = $connection->query($sql);
$courses = $result->fetch_all(MYSQLI_ASSOC);

$pdf=new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');
$hours = array('8', '10', '13', '15');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(25,15,'Hour',1,0,'C');
$pdf->Cell(32,15,'Sunday',1,0,'C');
$pdf->Cell(32,15,'Monday',1,0,'C');
$pdf->Cell(32,15,'Tuesday',1,0,'C');
$pdf->Cell(32,15,'Wednesday',1,0,'C');
$pdf->Cell(32,15,'Thursday',1,0,'C');
$pdf->Ln();

foreach($hours as $hour){
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(25, 15, $hour.':00',1,0,'C');
    foreach($days as $day){
        $pdf->SetFont('Arial', '', 10);
        $course_found = false;
        foreach($courses as $course){
            if($course['dayc']==$day && $course['timec']==$hour){
                $pdf->Cell(32, 15,"G:".$course['ngroup']."\n".$course['name']."\nroom:".$course['rname'],1,0,'C');
                $course_found = true;
                break;
            }
        }
        if(!$course_found){
            $pdf->Cell(32, 15,'',1,0,'C');
        }
    }
    $pdf->Ln();
}

$filename="SCHEDULE {$_SESSION['fname']}.pdf";
$pdf->Output('D',$filename);
?>