<?php
include_once("../partials/dbConnection.php");
session_start();
$id= $_SESSION["admin_id"];


//Extracting records from admins table in  mutune_parish database
$sql = "SELECT * FROM admins WHERE id='$id' ";
$result= mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$username=$row["username"];
$mobile=$row["mobile"];
$email=$row["email"];
$user_type=$row["user_type"];
$photo=$row["photo"];
$station=$row["station"];
$_SESSION["station"] = $row["station"];


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutune::Catechists</title>
    <?php
    include("../partials/links.php");
    include("../partials/header.php");
    ?>
</head>
<body>
    <br>
<div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card-fluid mx-auto">
                    <div class="card-header">
                
                     <table class="table">
                        <thead ><h2 class="text-center bg-warning">DASHBOARD</h2><br></thead>
                        <tr>
                            <td><a href="../sacraments/DisplayBaptism.php"><h5>VIEW BAPTISM CLASS</h5></a></td>
                        </tr>
                        
                        <tr>
                            <td><a href="../sacraments/displayConfirmation.php"><h6>VIEW CONFIRMATION CLASS</h6></a></td>
                        </tr>
                        <tr>
                            <td><a href="../priests/displayMass.php"><h5>VIEW MASS SCHEDULE</h5></a></td>
                        </tr>
                        <tr>
                            <td><a href="https://www.ewtn.com/catholicism/daily-readings"><h3>Today's Readings</h3></a></td>
                        </tr>
                        <tr>
                            <td><a href="displayInvoice.php"><h3>View invoices</h3></a></td>
                        </tr>
                        <tr>
                            <td><a href="../chatechsim/bookBurial.php"><h4>Request for Burial</h4></a></td>
                        </tr>
                        
                     </table>
                    </div>
                </div>
                
            </div>

            <div class="col-md-6">
            <h5 class="text-center text-danger">WELCOME TO CATECHISTS DASHBOARD</h5>
              <img class="img-rounded"src="../images/cc1.jpg" alt="church photo" style="height:103%; width: 100%">
            </div>

            <div class="col-md-3"> 
                <div class="card">
                    <div class="card-header bg-warning text-center">
                         <h5><?php 
                         $today = date("l jS \of F Y h:i:s A");
                          echo $today; ?> </h5></div>
                        <div class="card-body">

                        <h6><a href="logout.php" style="float:right; color:red;">logout</a></h6>
                            <img class="rounded-circle float-right" style="height:100px;width:100px;" src="../uploads/<?php echo $photo;?>" alt="userImage">
                            <br><br><br><br><br>
                            <p style="text-align:center;">Welcome Catechist <b><?php echo $username;?> </b> </p>
                           <p style="text-align:center; padding:10px;" class="bg-primary"><strong>Some of your details are:<strong></p>
                            <p>EMAIL:<b style="color:blue;font-size:15px;"><?php echo $email;?></b></p>
                            <p>MOBILE:<b style="color:orange;"><?php echo $mobile;?></b></p>
                            <p>Station:<b style="color:red;"><?php echo $station;?></b></p>

                            <p style="text-align:center; padding:10px;" class="bg-primary"><strong><a class="text-light"href="adminUpdate.php">Edit Personal Details</a><strong></p>

                               
                     

                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>