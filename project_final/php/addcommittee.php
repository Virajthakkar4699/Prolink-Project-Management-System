<?php
include 'connection.php';
if(isset($_POST["addcommittee"]))
{
    $course=(int)$_POST["course"];
    $member1=(int)$_POST["member1"];
    $member2=(int)$_POST["member2"];
    $member3=(int)$_POST["member3"];

    if($member1 == $member2 or $member1==$member3 or $member2==$member3)
    {
        session_start();
        $_SESSION["duplicatem"]="yes";
        header("Location: /project_final/createcommittee.php");
    }
    else
    {
  

    $query="insert into committe(course_id,faculty_id) values('$course','$member1')";
    $result=mysqli_query($conn, $query);

    $query="insert into committe(course_id,faculty_id) values('$course','$member2')";
    $result=mysqli_query($conn, $query);

    $query="insert into committe(course_id,faculty_id) values('$course','$member3')";
    $result=mysqli_query($conn, $query);

    } 
      
   
}
else
if(isset($_POST["delete"]))
{
    $id=(int)$_POST["id"];
    $query="delete from committe where committee_id='$id'";
    $result=mysqli_query($conn, $query);
   

}
header("Location: /project_final/createcommittee.php");