<?php

include 'connection.php';
if(isset($_POST["addmarks"]))
{
$group_d=(int)$_POST["group"];
$en=$_POST["enrollment"];
$fid=(int)$_POST["faculty"];
$eid=(int)$_POST["evalution"];
$crid1=(int)$_POST["crid1"];
$om1=(int)$_POST["om1"];

$crid2=(int)$_POST["crid2"];
$om2=(int)$_POST["om2"];

$crid3=(int)$_POST["crid3"];
$om3=(int)$_POST["om3"];

$q="select panel_id from panelallocation where group_id='$group_d' and eval_id='$eid'";
$rrr=mysqli_query($conn,$q);
$rrr=mysqli_fetch_array($rrr);
$panel_id=(int)$rrr["panel_id"];

$q="insert into studentmarks values('$group_d','$en','$panel_id','$eid','$crid1','$om1')";
mysqli_query($conn,$q);
$q="insert into studentmarks values('$group_d','$en','$panel_id','$eid','$crid2','$om2')";
mysqli_query($conn,$q);
$q="insert into studentmarks values('$group_d','$en','$panel_id','$eid','$crid3','$om3')";
mysqli_query($conn,$q);
}

if(isset($_POST["updatemarks"]))
{
    $e=$_POST["enrollment"];
    $eval_id=(int)$_POST["eval_id"];
    $crid1=(int)$_POST["crid1"];
$om1=(int)$_POST["om1"];

$crid2=(int)$_POST["crid2"];
$om2=(int)$_POST["om2"];

$crid3=(int)$_POST["crid3"];
$om3=(int)$_POST["om3"];


$q="update studentmarks set om='$om1' where enrollment='$e' and eval_id='$eval_id' and criteria_id='$crid1'";
mysqli_query($conn,$q);
$q="update studentmarks set om='$om2' where enrollment='$e' and eval_id='$eval_id' and criteria_id='$crid2'";
mysqli_query($conn,$q);
$q="update studentmarks set om='$om3' where enrollment='$e' and eval_id='$eval_id' and criteria_id='$crid3'";
mysqli_query($conn,$q);



}

header("Location: /project_final/evaluatestudents.php")


?>