<?php
include 'connection.php';
session_start();
if(isset($_POST["addpartner"]))
{
    $enrollment=$_POST["enrollment"];

    
    $e=$_SESSION["email"];
    $q="select enrollment from student where email='$e'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    $myenroll=$row["enrollment"];

    
    $q="select course_id from student where enrollment='$enrollment'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    $course=$row["course_id"];


    $q="select count(enrollment) as e from groupmember where enrollment='$myenroll'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);

    $group_id;
    if($row["e"]==0)
    {
        $query="insert into projectgroup(course_id) values('$course')";
        $result=mysqli_query($conn,$query);

    $q="select max(group_id) as id from projectgroup";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    $group=$row["id"];

    }
    else
    {
    $q="select projectgroup.group_id as id from projectgroup,groupmember where projectgroup.group_id=groupmember.group_id and enrollment='$myenroll'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    $group=$row["id"];

    }

    
    
    $query="insert into groupmember(group_id,enrollment) values('$group','$enrollment')";
    $result=mysqli_query($conn, $query);

    $q="select count(enrollment) as e from groupmember where enrollment='$myenroll'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    if($row["e"]==0)
    {

    

    $query="insert into groupmember(group_id,enrollment) values('$group','$myenroll')";
    $result=mysqli_query($conn, $query);
    }
    if(mysqli_affected_rows($conn))
     {
         session_start();
         $_SESSION["partneradded"]="yes";
     }
       
       header("Location: /project_final/projectpartner.php");
   
}
if(isset($_POST["deletepartner"]))
{
    $enroll=$_POST["enrollment"];
    $q="select group_id from groupmember where enrollment='$enroll'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);
    $group_id=$row["group_id"];

   

    // deleting member
    $q="delete from groupmember where enrollment='$enroll'";
    $result=mysqli_query($conn,$q);

//counting member if  no member exist other than a user it self the delete user enrty too
    $q="select count(group_id) as id from groupmember where group_id='$group_id'";
    $result=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($result);

    if($row["id"]==1)
    {
        $q="delete from groupmember where group_id='$group_id'";
        $result=mysqli_query($conn,$q);

        $q="delete from projectgroup where group_id='$group_id'";
        $result=mysqli_query($conn,$q);

        $q="delete from projectguidance where group_id='$group_id'";
        $result=mysqli_query($conn,$q);




    }

    
   
    header("Location: /project_final/projectpartner.php");
}