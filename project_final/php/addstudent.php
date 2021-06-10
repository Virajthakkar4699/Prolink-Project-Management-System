<?php
include 'connection.php';
if(isset($_POST["addstudent"]))
{
    $name=$_POST["name"];
    $enrollment=$_POST["enrollment"];
    $courseid=(int)$_POST["courseid"];
    $contact=$_POST["contact"];
    $email=$_POST["email"];
    $query="insert into student values('$enrollment','$name','$courseid','$email','$contact')";
    $result= mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn)!=-1)
     {
         session_start();
         $_SESSION["sadded"]="yes";
   
    $query="insert into login(email,password,user_type) values('$email','password','s')";
     $result= mysqli_query($conn, $query);
     }
     else
     {
        session_start();
        $_SESSION["duplicates"]="yes";
     }
     
    header("Location: /project_final/student.php");

}


?>