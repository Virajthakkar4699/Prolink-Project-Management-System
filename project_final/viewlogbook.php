<html>
    <head>
    <?php
session_start();
 if(isset( $_SESSION["role"]))
 {
	 if($_SESSION["role"]=='s')
	 {
		 ?>
   

        <title>ProLink</title>
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
                margin-top: 100px;
                margin-left: 200px;;
            }
           #addf{
                margin-top: -100px;
                margin-left: -150px;
            }
            #datatable{
                margin-left: 120px;
            }
            .container {
                padding: 2rem 0rem;

            }

            h4 {
                margin: 2rem 0rem 1rem;
            }

            .table-image {
                td, th {
                    vertical-align: middle;
                }
            }
          
        </style>
        <script>
        window.onload=function(){
            document.getElementById('togglebtn').click();
        }
        </script>
    </head>
    <body>





        <div class="container";>
            <?php
            include 'studentdash.php';

            $e=$_SESSION["email"];
            $q="select enrollment from student where email='$e'";
            $result=mysqli_query($conn,$q);
            $row=mysqli_fetch_array($result);
            $myenroll=$row["enrollment"];


            $query="select group_id from groupmember where enrollment='$myenroll'";
            $result= mysqli_query($conn, $query);
            $row=mysqli_fetch_array($result);

            $group_id=(int)$row["group_id"];

            $q="select * from projectgroup,faculty where group_id='$group_id' and guide_id=faculty_id";
            $result=mysqli_query($conn,$q);
            $row=mysqli_fetch_array($result);



            ?>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"> <h3 class="panel-title">Your Log Book  Under The Guidance Of <?php if(isset($row["faculty_name"])) {echo $row["faculty_name"];} ?> </h3></h3>
                 
                    <div class="right">  
                    </div>
                </div>
                
            </div>




            <!-- BASIC TABLE -->
                     <!-- BASIC TABLE -->
            <div class="container" id="datatable">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="#" >
                            <div class="input-group">
                                
                            </div>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Date of Meeting</th>
                                    <th scope="col">Discussion</th>
                                    <th scope="col">Instruction</th>
                                    <th scope="col">Remark</th>
                      

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'php/connection.php';

                               
                                    $query = "select * from projectguidance where group_id='$group_id' order  by id ";
                               

                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td ><?php echo $row["dom"]; ?></td>
                                        <td><?php echo $row["discussion"]; ?></td>
                                        <td><?php echo $row["instruction"]; ?></td>
                                        <td><?php echo $row["remark"]; ?></td>
                                

                                </tr>
                            <?php }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


            <!-- END BASIC TABLE -->
            
            
        </div>
        <?php
    if(isset($_SESSION["fadded"]))
    {
        if($_SESSION["fadded"]=="yes")
        {
            $_SESSION["fadded"]="no";
        ?>
    <script>
        
 swal("faculty added successfully");
    
    </script>
    <?php
        }
    }
    ?>
    </body>
</html>

<?php
     }
    }?>