<!-- 
 Data To be displayed in table -- Project Title, Student Name, Criteria, (Criteria+Marks),Obtained Marks

Validation -- Obtained marks should not be greater than total marks of Criteria

For update -- delete the record and add new one !

Search -- based on project title

                            -->
<html>
    <head>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
            include 'facultydash.php';
            ?>

<?php
$conn = mysqli_connect("localhost","root","","project_managment_system");
session_start();
$e=$_SESSION["estudente"];
$eval_id=(int)$_SESSION["estudenteval"];


$query="select * from student where enrollment='$e'";
$result=mysqli_query($conn,$query);
$result=mysqli_fetch_array($result);


$q="select * from studentmarks,criteriamaster,evalutioncriteria where studentmarks.enrollment='$e' and studentmarks.eval_id='$eval_id' and studentmarks.criteria_id=criteriamaster.id and evalutioncriteria.criteria_id=studentmarks.criteria_id and evalutioncriteria.eval_id='$eval_id'";
$result1=mysqli_query($conn,$q);

?>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"> <h3 class="panel-title">Edit Marks of    [<?php echo "   ".$result["name"]; ?>]</h3>
                   
                </div>
                <div class="panel-body" id="addf">
                    <!-- INPUT GROUPS -->
                    <div class="panel">

                        
                        <div class="panel-body">
                            <form action="php/addmarks.php" method="post" id="form1">
                            <input type="hidden" name="enrollment" value="<?php echo $e; ?>">
                            <input type="hidden" name="eval_id" value="<?php echo $eval_id; ?>">


           


                            <?php $row=mysqli_fetch_array($result1)
                            ?>

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label  class="btn btn-primary" type="label"><?php echo $row["cname"]; ?> |Out Of <?php echo $row["out_of_marks"]; ?></button>
                                    <input type="hidden" name="crid1" value="<?php echo $row["id"]; ?>">
                                </span> 
                                <?php $o=$row["out_of_marks"]; 
                                $o=(int)$o;
                                ?>

                                <input name="om1" class="form-control" type="number" min="0" max="<?php echo $o; ?>" placeholder="<?php echo $row["om"]; ?>" required="" title="number should be positive and under out of marks">
                            </div>
                            <br>
                                <?php  ?>




                                <?php $row=mysqli_fetch_array($result1)
                            ?>

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label  class="btn btn-primary" type="label"><?php echo $row["cname"]; ?> |Out Of <?php echo $row["out_of_marks"]; ?></button>
                                    <input type="hidden" name="crid2" value="<?php echo $row["id"]; ?>">
                                </span> 
                                <?php $o=$row["out_of_marks"]; 
                                $o=(int)$o;
                                ?>

                                <input name="om2" class="form-control" type="number" min="0" max="<?php echo $o; ?>" placeholder="<?php echo $row["om"]; ?>" required="" title="number should be positive and under out of marks">
                            </div>
                            <br>
                                <?php  ?>




                                <?php $row=mysqli_fetch_array($result1)
                            ?>

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label  class="btn btn-primary" type="label"><?php echo $row["cname"]; ?> |Out Of <?php echo $row["out_of_marks"]; ?></button>
                                    <input type="hidden" name="crid3" value="<?php echo $row["id"]; ?>">
                                </span> 
                                <?php $o=$row["out_of_marks"]; 
                                $o=(int)$o;
                                ?>

                                <input name="om3" class="form-control" type="number" min="0" max="<?php echo $o; ?>" placeholder="<?php echo $row["om"]; ?>" required="" title="number should be positive and under out of marks">
                            </div>
                            <br>
                                <?php  ?>
                            
                            

                            <button type="submit" name="updatemarks" class="btn btn-success" style="margin-right: 20px;"><i class="fa fa-check-circle"></i> Submit</button>
                        
              
                            </form>
                        </div>
                    </div>
                    <!-- END INPUT GROUPS -->
                </div>
            </div>
            
            
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