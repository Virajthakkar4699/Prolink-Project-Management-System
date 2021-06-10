<?php
include 'connection.php';
if(isset($_POST["addevalution"]))
{

   
    $name=$_POST["name"];
    $date=$_POST["date"];
    $cr1=(int)$_POST["cr1"];
    $mr1=(int)$_POST["mr1"];
    $cr2=(int)$_POST["cr2"];
    $mr2=(int)$_POST["mr2"];
    $cr3=(int)$_POST["cr3"];
    $mr3=(int)$_POST["mr3"];
    $desc=$_POST["description"];
    $type=$_POST["type"];
    $course_id;
    session_start();
    if($cr1==$cr2 or $cr1==$cr3 or $cr2==$cr3)
    {
        $_SESSION["duplicatecr"]="yes";
        header("Location: /project_final/createevaluation.php");

    }
    else
    {



            
                $email=$_SESSION["email"];
                $query="select faculty_id from faculty where email='$email'";
                $result=mysqli_query($conn, $query);
                $row=mysqli_fetch_array($result);
                $fid=$row["faculty_id"];

                $q="select course_id from committe where faculty_id='$fid'";
                $result=mysqli_query($conn,$q);
                $row=mysqli_fetch_array($result);
                $course_id=(int)$row["course_id"];

                $q="insert into sheduleevalution(course_id,edate,type,description,eval_name) values('$course_id','$date','$type','$desc','$name')";
                $result=mysqli_query($conn,$q);
                $q="select max(eval_id) as id from sheduleevalution";
                $result=mysqli_query($conn,$q);
                $row=mysqli_fetch_array($result);
                $id=$row["id"];

                $q="insert into evalutioncriteria(eval_id,criteria_id,out_of_marks) values('$id','$cr1','$mr1')";
                $result=mysqli_query($conn,$q);

                $q="insert into evalutioncriteria(eval_id,criteria_id,out_of_marks) values('$id','$cr2','$mr2')";
                $result=mysqli_query($conn,$q);

                $q="insert into evalutioncriteria(eval_id,criteria_id,out_of_marks) values('$id','$cr3','$mr3')";
                $result=mysqli_query($conn,$q);
                
                if(mysqli_affected_rows($conn))
                {
                    session_start();
                    $_SESSION["evalutionadded"]="yes";
                }
                
                header("Location: /project_final/createevaluation.php");
                
    }
}
    

            if(isset($_POST["deleteeval"]))
            {
            
                $eval_id=$_POST["eval_id"];
            

                $query="delete from sheduleevalution where eval_id='$eval_id'";
                $result=mysqli_query($conn, $query);
                $query="delete from evalutioncriteria where eval_id='$eval_id'";
                $result=mysqli_query($conn, $query);

                header("Location: /project_final/createevaluation.php");
            }


            if(isset($_POST["editeval"]))
            {
            
                session_start();
                $eval_id=$_POST["eval_id"];
                $_SESSION["eval_id"]=$eval_id;
                $q="select * from sheduleevalution where eval_id='$eval_id'";
                $result=mysqli_query($conn,$q);
                $row=mysqli_fetch_array($result);
                $_SESSION["edate"]=$row["edate"];
                $_SESSION["type"]=$row["type"];
                $_SESSION["description"]=$row["description"];
                $_SESSION["ename"]=$row["eval_name"];
                $q="select * from evalutioncriteria where eval_id='$eval_id'";
                $result=mysqli_query($conn,$q);
                $id=array();
                $m=array();
                $n=0;
                while($row=mysqli_fetch_array($result))
                {
                   
                    $id[$n]=$row["criteria_id"];
                    $m[$n]=$row["out_of_marks"];
                    $n=$n+1;
                  
                }
                $_SESSION["cr1"]=$id[0];
                $_SESSION["cr2"]=$id[1];
                $_SESSION["cr3"]=$id[2];
                $_SESSION["mr1"]=$m[0];
                $_SESSION["mr2"]=$m[1];
                $_SESSION["mr3"]=$m[2];

               

                header("Location: /project_final/editevalution.php");
            }


            if(isset($_POST["updateeval"]))
            {

            
                $name=$_POST["name"];
                $date=$_POST["date"];
                $cr1=(int)$_POST["cr1"];
                $mr1=(int)$_POST["mr1"];
                $cr2=(int)$_POST["cr2"];
                $mr2=(int)$_POST["mr2"];
                $cr3=(int)$_POST["cr3"];
                $mr3=(int)$_POST["mr3"];
                $sn1=(int)$_POST["srn1"];
                $sn2=(int)$_POST["srn2"];
                $sn3=(int)$_POST["srn3"];
                $desc=$_POST["description"];
                $type=$_POST["type"];
                $course_id;
                session_start();
                if($cr1==$cr2 or $cr1==$cr3 or $cr2==$cr3)
                {
                    $_SESSION["duplicatecr"]="yes";
                    header("Location: /project_final/createevaluation.php");

                }
                else
                {



                        
                            
                            $eid=$_SESSION["eval_id"];
                            $q="update sheduleevalution set edate='$date',type='$type',description='$desc',eval_name='$name' where eval_id='$eid'";
                            $result=mysqli_query($conn,$q);
                            

                            $q="update evalutioncriteria set criteria_id='$cr1',out_of_marks='$mr1' where srn='$sn1'";
                            $result=mysqli_query($conn,$q);

                            $q="update evalutioncriteria set criteria_id='$cr2',out_of_marks='$mr2' where srn='$sn2'";
                            $result=mysqli_query($conn,$q);

                            $q="update evalutioncriteria set criteria_id='$cr3',out_of_marks='$mr3' where srn='$sn3'";
                            $result=mysqli_query($conn,$q);
                            
                            
                            
                            header("Location: /project_final/createevaluation.php");
                            
                }
}

