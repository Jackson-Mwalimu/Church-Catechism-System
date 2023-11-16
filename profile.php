<?php
include_once("../partials/dbConnection.php");
session_start();
$id= $_SESSION["id"];

//Extracting records from christians_registration table in  mutune_parish database
$sql = "SELECT * FROM christians_registration WHERE id='$id' ";
$result= mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$username=$row["username"];
$mobile=$row["mobile"];
$email=$row["email"];
$cardno=$row["card_no"];
$passport=$row["passport"];
$sacraments=$row["sacraments"];
$_SESSION["updateid"] = $row["id"];
$_SESSION["username"] = $row["username"];
$_SESSION["scc"]= $row["scc"];
$_SESSION["station"] = $row["station"];
$_SESSION["card_no"]= $row["card_no"];
$_SESSION["mobile"]= $row["mobile"];
$_SESSION["email"]= $row["email"];
$_SESSION["password"]= $row["password"];
$_SESSION["cpassword"]= $row["cpassword"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutune::user_profile</title>
    <?php
    //Includes the bootstrap link and header of the website respectively.
    include("../partials/links.php");
    include("../partials/header.php");
?>

<style>

</style>
</head>

<body class="bg-light">
<br>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card-fluid mx-auto">
                    <div class="card-header">
                
                     <table class="table">
                        <thead ><h2 class="text-center bg-warning">DASHBOARD</h2><br></thead>
                        <tr>
                            <td><a href="../sacraments/baptism_class.php"><h5>JOIN BAPTISMAL CLASS</h5></a></td>
                        </tr>
                        
                        <tr>
                            <td><a href="../sacraments/confirmation_class.php"><h6>JOIN CONFIRMATION CLASS</h6></a></td>
                        </tr>
                        <tr>
                            <td><a href="../priests/displayMass.php"><h5>VIEW MASS SCHEDULE</h5></a></td>
                        </tr>
                        <tr>
                            <td><a href="https://www.ewtn.com/catholicism/daily-readings"><h3>Today's Readings</h3></a></td>
                        </tr>
                        <tr>
                            <td><a href="https://www.vaticannews.va/en/pope.html"><h3>Pope Message</h3></a></td>
                        </tr>
                        <tr>
                            <td><a href="../chatechsim/bookBurial.php"><h4>Request for Burial</h4></a></td>
                        </tr>
                        
                     </table>
                    </div>
                </div>
                
            </div>

            <div class="col-md-6">
            <h5 class="text-center text-danger">WELCOME MUTUNE PARISH</h5>
              <img class="img-rounded"src="../images/cc1.jpg" alt="church photo" style="height:103%; width: 100%">
            </div>

            <div class="col-md-3"> 
                <div class="card">
                    <div class="card-header bg-warning text-center">
                         <h6><?php 
                         $today = date("l jS \of F Y");
                          echo $today; ?> </h6>
                          
                        </div>
                          
                        <div class="card-body">
                        <h6><a href="logout.php" style="float:right; color:red;">logout</a></h6>
                            <img class="rounded-circle float-right" style="height:100px;width:100px;" src="../uploads/<?php echo $passport;?>" alt="userImage">
                            <br><br><br><br><br>
                            <p style="text-align:center;">Welcome, <b><?php echo $username;?></b> </p>
                           <p style="text-align:center; padding:10px;" class="bg-primary"><strong>Some of your details are:<strong></p>
                            <p>EMAIL:<b style="color:blue;font-size:15px;"><?php echo $email;?></b></p>
                            <p>MOBILE:<b style="color:orange;"><?php echo $mobile;?></b></p>
                            <p>Card_No:<b style="color:red;"><?php echo $cardno;?></b></p>

                            <p style="text-align:center; padding:10px;" class="bg-primary"><strong><a class="text-light"href="userUpdate.php">Edit Personal Details</a><strong></p>

                            
                     

                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>