<?php
$email=$_POST["email"];
include 'connection.php';
session_start();
echo $email;
if(isset($_POST["otpbtn"]))
{
    $query="select * from login where email='$email'";
    $result=mysqli_query($conn, $query);
    if($row=mysqli_fetch_array($result))
    {
        
        if($row["id"]!=0)
        {
                 $_SESSION["otp"]= rand(1000,100000);
                 $_SESSION["remail"]=$email;
                 include('smtp/PHPMailerAutoload.php');
                 
                 function smtp_mailer($to,$subject, $msg){
                           $mail = new PHPMailer(); 
                           $mail->SMTPDebug  = 3;
                           $mail->IsSMTP(); 
                           $mail->SMTPAuth = true; 
                           $mail->SMTPSecure = 'tls'; 
                           $mail->Host = "smtp.gmail.com";
                           $mail->Port = 587; 
                           $mail->IsHTML(true);
                           $mail->CharSet = 'UTF-8';
                           $mail->Username = "dummyemail";
                           $mail->Password = "dummy";
                           $mail->SetFrom("dummy");
                           $mail->Subject = $subject;
                           $mail->Body =$msg;
                           $mail->AddAddress($to);
                           $mail->SMTPOptions=array('ssl'=>array(
                                   'verify_peer'=>false,
                                   'verify_peer_name'=>false,
                                   'allow_self_signed'=>false
                           ));
                           if(!$mail->Send()){
                                   echo $mail->ErrorInfo;
                           }else{
                                   echo 'sent';
                           }
                   }
                  
                   smtp_mailer($email,'password Reset',$_SESSION["otp"]);
                   

                   header("location: /project_final/verifyotp.php");
         
         
         
        }
        else
        {
           $_SESSION["invaliduser"]="yes"; 
           header("location:/project_final/forgetpassword.php");
        }
    }
    else
    {
        $_SESSION["invaliduser"]="yes"; 
          header("location:/project_final/forgetpassword.php");
    }
}
