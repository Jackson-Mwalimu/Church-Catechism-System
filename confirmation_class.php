<?php
include("../partials/dbConnection.php");

if(isset($_POST["submit"])){

$username=$_POST["username"];
$password=$_POST["password"];
$confirmationname =$_POST["confirmationname"];
$baptismalname=$_POST["baptismalname"];
$surname=$_POST["surname"];
$cardno=$_POST["cardno"];
$baptismalparent=$_POST["baptismalparent"];
$station=$_POST["station"];


$sql = "INSERT INTO confirmation_class(username,first_name,confirmation_name,baptismal_name,surname,card_no,station)
VALUES('$username','$firstname','$confirmationname','$baptismalname','$surname','$cardno','$station')";

$result = mysqli_query($con,$sql);

if($result){
    echo '<script>
    alert("Joined confirmation class member successfully");
    window.location="../chatechsim/profile.php"
    </script>';
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutune::Chatechsim</title>
    <?php
   include("../partials/header.php");
include("../partials/links.php");
   ?>
   <style>
    body{
        background-image:url('../images/lc1.jpg');
        background-size:cover;
            background-repeat: no-repeat;
            height:100%;
            width:100%;
    }
   </style>
</head>
<body>

<div class="container my-3">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card mt-5">
<div class="card-header text-center">CONFIRMATION CLASS</div>
<div class="card-body">
<form action="confirmation_class.php" method="post">

<div class="form-group">
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">username:</label>
    <div class="col-sm-10">
    <input type="text" name="username" class="form-control" autocomplete="off">
    </div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label">first name:</label>
    <div class="col-sm-10">
    <input type="text" name="firstname" class="form-control"placeholder="Enter firstName" autocomplete="off">
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">con_name:</label>
    <div class="col-sm-10">
    <input type="text" name="confirmationname"class="form-control" placeholder="Enter confirmationName"autocomplete="off">
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">bapt_name:</label>
    <div class="col-sm-10">
    <input type="text" name="baptismalname"class="form-control" placeholder="Enter baptismalName"autocomplete="off">
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">surname:</label>
    <div class="col-sm-10">
    <input type="text" name="surname"class="form-control" autocomplete="off">
</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Card_no:</label>
    <div class="col-sm-10">
    <input type="text" name="cardno"class="form-control" placeholder="Enter cardNo"autocomplete="off">
</div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Station:</label>
    <div class="col-sm-10">
    <select name="station" class="form-control" autocomplete="off" required >
                <option value="Select station">Select station</option>
                <option value="Mutune">Mutune</option>
                <option value="Wanzua">Wanzua</option>
                <option value="Kangau">Kangau</option>
                <option value="Maseki">Maseki</option>
                <option value="Maaini">Maaini</option>
                <option value="Kanuli">Kanuli</option>
                <option value="Kyaani">Kyaani</option>
                <option value="Mwaani">Mwaani</option>
                <option value="Matinyani">Matinyani</option>
                <option value="Kikanga">Kikanga</option>
                <option value="Kivaani">Kivaani</option>
                <option value="Mutendea">Mutendea</option>
                </select>
    </div>
</div>


</div>
<hr>
<div> <input type="submit" name="submit" id="submit" class="btn btn-dark" style="float:right;" value="Register"></div>
        
</form>

      
</div>
</div>
</div>
</div>
</div><br>

    
</body>
</html>