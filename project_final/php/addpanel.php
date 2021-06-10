<?php
include 'connection.php';

if(isset($_POST["addpanel"]))
{
    $eval=(int)$_POST["evalution"];
    $course=(int)$_POST["course"];
    $desc=$_POST["panel_desc"];
    $f1=(int)$_POST["panelfaculty1"];
    $f2=(int)$_POST["panelfaculty2"];
        if($f1==$f2)
        {
            session_start();
                $_SESSION["same"]="yes";
                header("Location: /project_final/createpanel.php");
        }
        else
        {


            $query="insert into panel_eval(eval_id,course_id,panel_desc) values('$eval','$course','$desc')";
            $result=mysqli_query($conn, $query);

            $query="select panel_id from panel_eval ORDER by panel_id desc LIMIT 1";
            $result=mysqli_query($conn, $query);
            $result=mysqli_fetch_array($result);
            $id=$result["panel_id"];

            $query="insert into panelmember(panel_id,faculty_id) values('$id','$f1')";
            $result=mysqli_query($conn, $query);
            $query="insert into panelmember(panel_id,faculty_id) values('$id','$f2')";
            $result=mysqli_query($conn, $query);
            if(mysqli_affected_rows($conn))
            {
                session_start();
                $_SESSION["padded"]="yes";
            }
            
            header("Location: /project_final/createpanel.php");
            }
        
}
if(isset($_POST["delete"]))
{
    $panel_desc=$_POST["panel_desc"];
    $query="select panel_id from panel_eval where panel_desc='$panel_desc'";
    $result=mysqli_query($conn,$query);
    $result=mysqli_fetch_array($result);
    $panel_id=$result["panel_id"];
    $query="delete from panel_eval where panel_id='$panel_id'";
    mysqli_query($conn,$query);
    $query="delete from panel_member where panel_id='$panel_id'";
    mysqli_query($conn,$query);

    header("Location: /project_final/createpanel.php");
}
