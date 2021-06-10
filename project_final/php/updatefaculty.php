<?php
include 'connection.php';
session_start();
$aemail=$_SESSION["facultyemail"];
$name=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$designation=$_POST["designation"];

$query="update faculty set faculty_name='$name',email='$email',contact_number='$contact',designation='$designation' where email='$aemail'";
mysqli_query($conn, $query);
$query="update login set email='$email' where email='$aemail'";
mysqli_query($conn, $query);
header("location: /project_final/faculty.php");
 
?>