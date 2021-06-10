<?php
include 'connection.php';
if(isset($_POST["addproject"]))
{
    $name=$_POST["title"];
    $technology=$_POST["technology"];
    $description=$_POST["description"];
    session_start();
    $e=$_SESSION["email"];
    $q="select enrollment from student where email='$e'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    $myenroll=$row["enrollment"];


    $query="select group_id from groupmember where enrollment='$myenroll'";
    $result= mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);

    $group_id=(int)$row["group_id"];

    $query="update projectgroup set project_title='$name',technology='$technology',description='$description' where group_id='$group_id'";
     $result= mysqli_query($conn, $query);
     if(mysqli_affected_rows($conn))
     {
         session_start();
         $_SESSION["projectadded"]="yes";
     }
    header("Location: /project_final/projectdetails.php");
}


?>