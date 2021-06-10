<?php
session_start();
include 'connection.php';
$otp=$_POST["otp"];
$password=$_POST["password"];
$email=$_SESSION["remail"];

if($_SESSION["otp"]==$otp)
{
    $query="update login set password='$password' where email='$email'";
    mysqli_query($conn, $query);
    header("location: /project_final/index.php");
}
else
{
    $_SESSION["invalidotp"]="yes";
    header("location: /project_final/verifyotp.php");
}


