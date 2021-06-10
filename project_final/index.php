<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>

<html>
    <head>
        <title>Login ProLink</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
        <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel="stylesheet" href="assets/css/demo.css">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <!-- ICONS -->
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <script src="assets/scripts/sweetalert.min.js"></script>
          
        <style>
            .panel{
                margin-top: 150px;
                padding-left:100px;

            }
            .input-group{
                margin-right:500px;

            }
            .btn{
                margin-top:30px;
            }

        </style>
        <script lang="javascript" type="text/javascript"> window.history.forward();
        </script>
        <?php
        session_start();
        if(isset($_SESSION["id"]))
        {
                if($_SESSION["role"]=="a")
                {
                    header("location: /project_final/admindash.php");
                }
                
        }
       
        ?>
    </head>
    <body>
        <div class="container">


            <!-- INPUT GROUPS -->
            <div class="panel">

                <div class="container" style="margin: 50px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Hello There, Please Login !</h3>
                        <br>
                    </div>

                    <form method="post" action="php/checklogin.php">



                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input class="form-control" placeholder="Username" type="text" name="username" required pattern="[a-zA-Z0-9.][a-zA-Z0-9.]+@(gmail.com|utu.ac.in)" title="invalid email">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input class="form-control" placeholder="Password" type="password" name="password" required pattern=".{8,}" title="password should be greater than 8 digit" >
                        </div>

                        <br>
                        <div class="container,btn">

                            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Login</button>

                            <a href="/project_final/forgetpassword.php" class="btn btn-danger">Forgot Password</a>
                          

                        </div>
                    </form>
                </div>
            </div>
            <!-- END INPUT GROUPS -->								

        </div>
    </div>
    <?php
    if(isset($_SESSION["lfail"]))
    {
        if($_SESSION["lfail"]=="yes"){
            $_SESSION["lfail"]="no";
        ?>
    <script>
        
 swal("invalid username or password");
    
    </script>
    <?php
        }
    }
    ?>
    
</body>
</html>