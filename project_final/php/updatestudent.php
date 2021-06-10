<?php
include 'connection.php';
session_start();
$enrollment=$_POST["enrollment"];
$name=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$cid=(int)$_POST["courseid"];
$aemail=$_SESSION["studentemail"];

$query="update student set name='$name',email='$email',contact_number='$contact',course_id='$cid' where enrollment='$enrollment'";
mysqli_query($conn, $query);
$query="update login set email='$email' where email='$aemail'";
mysqli_query($conn, $query);
header("location: /project_final/student.php");
 
?>