<html>
    <head>
    <?php
session_start();
 if(isset( $_SESSION["committeemember"]))
 {
	 if($_SESSION["committeemember"]=="yes")
	 {
         if(isset($_POST["ap"]))
         {
             $eval_id=(int)$_POST["evalution"];
             $panel_id=$_POST["panel"];
         }
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

            .form{
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
            #in{
                margin-left:0px;.
                width:100%;
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
            include 'facultydash.php';
            ?>

            <div class="panel">
                <div class="panel-heading">
            <?php
            include 'php/connection.php';
                $result = mysqli_query($conn, "SELECT * from panel_eval where panel_id='$panel_id'");
                $result=mysqli_fetch_array($result);
                ?>
                    <h3 class="panel-title"> <h3 class="panel-title"></h3>Panel : <?php echo $result["panel_desc"]; ?></h3>
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
                            
                            <br>                                
                        </form>

                        <form action="php/allocatepanel.php" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">project</th>
                                   
                                   
                                    
                                   

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'php/connection.php';
                             
                                $e=$_SESSION["email"];

                                if (isset($_POST["searchbtn"])) {
                                    $s = $_POST["search"];
                                    $cid=$_SESSION["course_id"];
                                    $result = mysqli_query($conn, "SELECT * from projectgroup where course_id='$cid' and  group_id not in (select group_id from panelallocation where eval_id='$eval_id') and project_title like '%$s%'");
                                } 
                                else {
                                   

                                       
                                        $cid=$_SESSION["course_id"];
                                        $result = mysqli_query($conn, "SELECT * from projectgroup where course_id='$cid' and  group_id not in (select group_id from panelallocation where eval_id='$eval_id')");

                                }

                              
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                       

                                      
                                        <td ><input id="in" type="checkbox" name="project[]" value="<?php echo $row["group_id"]; ?>" ><?php echo "    ".$row["project_title"]; ?></td>
                                     

                                </tr>
                            <?php }
                            ?>
                            <input type="hidden" name="evalution" value="<?php echo $eval_id; ?>">
                            <input type="hidden" name="panel_id" value="<?php echo $panel_id; ?>">
                            <input type="submit" value="Allocate Project" style="color:green" name="ap" >
                            </tbody>
                        </table>
                        </form>
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
    }
    ?>