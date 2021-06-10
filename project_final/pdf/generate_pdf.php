<?php
//include connection file
include_once("con2.php");
include_once('libs/fpdf.php');
session_start();
$e=$_SESSION["email"];
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('twitter.png',10,-1,70);
    $this->SetFont('Helvetica','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Student Marks List',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('project_title'=>'Project Title', 'name'=> 'Name', 'm'=> 'Marks','eval_name'=> 'Evaluation Name');
 
$result = mysqli_query($connString, "select project_title,name,sum(om) as m,eval_name from studentmarks,student,projectgroup,sheduleevalution where studentmarks.enrollment=student.enrollment and student.course_id=(select course_id from committe,faculty where email='$e' and faculty.faculty_id=committe.faculty_id) and studentmarks.group_id=projectgroup.group_id and sheduleevalution.eval_id=studentmarks.eval_id group by studentmarks.enrollment") or die("database error:". mysqli_error($connString));
//$header = mysqli_query($connString, "SHOW columns FROM student");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',7);
$header= array("Project Title","Name","Marks","Evaluation Name");
//foreach($header as $heading) {
//$pdf->Cell(20,12,$display_heading[$heading['Field']],1);
//}

$pdf->Cell(35,12,$display_heading["project_title"],1);
$pdf->Cell(35,12,$display_heading['name'],1);
$pdf->Cell(35,12,$display_heading['m'],1);
$pdf->Cell(35,12,$display_heading['eval_name'],1);

foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(35,12,$column,1);
}
$pdf->Output();
?>