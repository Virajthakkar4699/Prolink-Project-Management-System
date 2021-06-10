<?php
include 'connection.php';
if(isset($_POST["addlog"]))
{
    $group_id=(int)$_POST["groupid"];
    $faculty_id=(int)$_POST["guideid"];
   $discussion=$_POST["discussion"];
   $instruction=$_POST["instruction"];
   $remark=$_POST["remark"];

    $query="insert into projectguidance(group_id,dom,discussion,instruction,remark,guide_id) values('$group_id',Now(),'$discussion','$instruction','$remark','$faculty_id') ";
    $result=mysqli_query($conn, $query);
    
    if(mysqli_affected_rows($conn))
     {
         session_start();
         $_SESSION["guideadded"]="yes";
     }
       
       header("Location: /project_final/addlog.php");
   
}

if(isset($_POST["editlog"]))
{
   
$group_id=$_POST["id"];
   session_start();

    $query="select * from projectguidance where id='$group_id'";
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);
    $_SESSION["id"]=$group_id;
    $_SESSION["discussion"]=$row["discussion"];
    $_SESSION["instruction"]=$row["instruction"];
    $_SESSION["remark"]=$row["remark"];

    header("Location: /project_final/editlog.php");
}



if(isset($_POST["editlogbtn"]))
{
  session_start();
$ds=$_POST["discussion"];
$in=$_POST["instruction"];
$re=$_POST["remark"];
$group_id=$_SESSION["id"];


    $query="update projectguidance set discussion='$ds',instruction='$in',remark='$re' where id='$group_id'";
    $result=mysqli_query($conn, $query);


    header("Location: /project_final/addlog.php");
}
