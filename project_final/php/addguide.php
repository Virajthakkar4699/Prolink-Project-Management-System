<?php
include 'connection.php';
if(isset($_POST["addguide"]))
{
    $group_id=$_POST["project"];
    $faculty_id=$_POST["guide_id"];
   

    $query="update projectgroup set guide_id='$faculty_id' where group_id='$group_id'";
    $result=mysqli_query($conn, $query);
    
    if(mysqli_affected_rows($conn))
     {
         session_start();
         $_SESSION["guideadded"]="yes";
     }
       
       header("Location: /project_final/allocateguide.php");
   
}

if(isset($_POST["deleteguide"]))
{
   
    $group_id=$_POST["groupid"];
   

    $query="update projectgroup set guide_id=null where group_id='$group_id'";
    $result=mysqli_query($conn, $query);

    header("Location: /project_final/allocateguide.php");
}
