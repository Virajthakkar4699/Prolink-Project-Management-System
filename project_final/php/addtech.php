<?php
include 'connection.php';
if(isset($_POST["addtech"]))
{
    $tname=$_POST["name"];
 
   
    $query="insert into technologymaster(technology) values('$tname')";
    $result=mysqli_query($conn, $query);
   if(mysqli_affected_rows($conn))
     {
         session_start();
         $_SESSION["tadded"]="yes";

     }
     header("Location: /project_final/addtechnology.php");
    
}
if(isset($_POST["delete"]))
{
    $id=(int)$_POST["id"];
 
   
    $query="delete from technologymaster where id='$id'";
    $result=mysqli_query($conn, $query);
   
     header("Location: /project_final/addtechnology.php");
    
}


