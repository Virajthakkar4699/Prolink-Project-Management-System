<html>
    <head>
        <title>Faculty DashBoard | Admin</title>
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
        <style>
            .panel{
                margin-top: 100px;
                margin-left: 200px;;
            }
            #editframe{
               padding-left: 200px;
               padding-right: 200px;
               background-color:#F8F8F8;
            }
            #addf{
                margin-top:-200px;
                margin-left:-170px;
            }

        </style>

       
    </head>
    <body>
        <?php
        session_start();
        include 'facultydash.php';
        session_start();
        ?>



<div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <h3 class="panel-title"></h3>
                </h3>
                
            </div>
            <div class="panel-body" id="addf">
                <!-- INPUT GROUPS -->
                <div class="panel">

                    <div class="panel-heading">
                        <h4>update Evaluation</h4>
                    </div>
                    <div class="panel-body">
                        <form action="php/addevalution.php" method="post">




                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Evaluation Name</button>
                                </span>
                                <input name="name" value="<?php echo $_SESSION["ename"]; ?>" class="form-control" type="text" pattern="[a-zA-Z ]{5,}+" required=""
                                    title="minimum 10 character needed">
                            </div>
                            <br>



                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Date</button>
                                </span>
                                <input name="date" value="<?php echo $_SESSION["edate"]; ?>" class="form-control" min='<?php echo date("Y-m-d"); ?>' type="date" required="">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Type</button>
                                </span>
                                <select class="form-control" name="type" required="">
                                    <option value="Presentation">Presentation</option>
                                    <option value="Submission">Submission</option>

                                </select>
                            </div>
                            <br>


                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Description</button>
                                </span>
                                <input name="description" value="<?php echo $_SESSION["description"]; ?>" class="form-control" type="text" pattern="[a-zA-Z ]+"
                                    required="" title="description should not contain number or special characters">
                            </div>
                            <br>


                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Criteria 1</button>
                                </span>
                               
                                <select class="form-control" name="cr1" required="" id="cr1">
                                <?php
                                include 'php/connection.php';
                                    $crid=$_SESSION["cr1"];
                                    $q="select * from criteriamaster,evalutioncriteria where criteria_id=id and criteria_id='$crid'";
                                    $result=mysqli_query($conn,$q);
                                    $row=mysqli_fetch_array($result);
                                    $srn1=$row["srn"];

                                ?>

                                <option selected="" value="<?php echo $row["id"]; ?>"><?php echo $row["cname"]; ?></option>
                                    <?php
                                        include 'php/connection.php';
                                        
                                        $query = "select * from criteriamaster where id!='$crid'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["cname"]; ?></option>

                                    <?php }
                                        ?>

                                </select>
                                <input Type='hidden' name="srn1" value="<?php echo $srn1; ?>">
                            </div>
                            <br>


                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Marks of Criteria 1</button>
                                </span>
                                <input name="mr1" value="<?php echo $_SESSION["mr1"]; ?>" class="form-control" type="text" pattern="[0-9]+" required=""
                                    title="marks should be positive numebre">
                            </div>
                            <br>






                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Criteria 2</button>
                                </span>
                                <select class="form-control" name="cr2" required="">
                                <?php
                                include 'php/connection.php';
                                    $crid=$_SESSION["cr2"];
                                    $q="select * from criteriamaster,evalutioncriteria where criteria_id=id and criteria_id='$crid'";
                                    $result=mysqli_query($conn,$q);
                                    $row=mysqli_fetch_array($result);
                                    $srn2=$row["srn"];

                                ?>
                                <option selected="" value="<?php echo $row["id"]; ?>"><?php echo $row["cname"]; ?></option>

                                
                                    <?php
                                        include 'php/connection.php';
                                        
                                        $query = "select * from criteriamaster where id!='$crid'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["cname"]; ?></option>

                                    <?php }
                                        ?>
                                </select>
                                <input Type='hidden' name="srn2" value="<?php echo $srn2; ?>">
                            </div>
                            <br>


                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Marks of Criteria 2</button>
                                </span>
                                <input name="mr2" value="<?php echo $_SESSION["mr2"]; ?>" class="form-control" type="text" pattern="[0-9]+" required=""
                                    title="marks should be positive numebre">
                            </div>
                            <br>






                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Criteria 3</button>
                                </span>
                                <select class="form-control" name="cr3" required="">

                                <?php
                                include 'php/connection.php';
                                    $crid=$_SESSION["cr3"];
                                    $q="select * from criteriamaster,evalutioncriteria where criteria_id=id and criteria_id='$crid'";
                                    $result=mysqli_query($conn,$q);
                                    $row=mysqli_fetch_array($result);
                                    $srn3=$row["srn"];

                                ?>
                                <option selected="" value="<?php echo $row["id"]; ?>"><?php echo $row["cname"]; ?></option>

                                    <?php
                                        include 'php/connection.php';
                                        
                                      
                                        $query = "select * from criteriamaster where id!='$crid'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["cname"]; ?></option>

                                    <?php }
                                        ?>
                                </select>
                                <input Type='hidden' name="srn3" value="<?php echo $srn3; ?>">
                            </div>
                            <br>


                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary" type="label">Marks of Criteria 3</button>
                                </span>
                                <input name="mr3" value="<?php echo $_SESSION["mr3"]; ?>" class="form-control" type="text" pattern="[0-9]+" required=""
                                    title="marks should be positive numebre">
                            </div>
                            <br>



                            <button type="submit" name="updateeval" class="btn btn-success"
                                style="margin-right: 20px;"><i class="fa fa-check-circle"></i> update Evaluation</button>


                        </form>
                    </div>
                </div>
                <!-- END INPUT GROUPS -->
            </div>
        </div>
        


</body>
</html>