<?php
include 'connection.php';
if(isset($_POST["addfaculty"]))
{
    $fname=$_POST["fname"];
    $designation=$_POST["designation"];
    $email=$_POST["email"];
    $contact=$_POST["contact"];

    $query="insert into faculty(faculty_name,designation,contact_number,email) values('$fname','$designation','$contact','$email')";
    $result=mysqli_query($conn, $query);
    $query="insert into login(email,password,user_type) values('$email','password','f')";
    $result=mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn))
     {
         session_start();
         $_SESSION["fadded"]="yes";
     }
       
       header("Location: /project_final/faculty.php");
   
}
