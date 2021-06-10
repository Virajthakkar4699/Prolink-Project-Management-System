<?php
include 'connection.php';
session_start();
$email=$_POST["email"];
if(isset($_POST["delete"]))
{
    
    $query="delete from faculty where email='$email'";
    mysqli_query($conn, $query);
     $query="delete from login where email='$email'";
    mysqli_query($conn, $query);
    header("location: /project_final/faculty.php");
    
}
if(isset($_POST["edit"]))
{
   $query="select * from faculty where email='$email' ";
   $result=mysqli_query($conn, $query);
   while($row= mysqli_fetch_array($result))
   {
       $_SESSION["facultyname"]=$row["faculty_name"];
       $_SESSION["facultyemail"]=$row["email"];
       $_SESSION["facultycontact"]=$row["contact_number"];
       $_SESSION["facultydesignation"]=$row["designation"];
      
       
   }
   
   header("location: /project_final/editfaculty.php");
   
}
