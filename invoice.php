<?php
session_start();
include("../partials/dbConnection.php");

 
if(isset($_POST["submit"])){
   $name = $_POST["name"];
   $mode = $_POST["mode"];
   $purpose= $_POST["purpose"];
   $account = $_POST["account"];
   $amount = $_POST["amount"];
   $station = $_POST["station"];

    
    $sql = "INSERT INTO invoice(name,mode,purpose,account,amount,station)
     VALUES('$name','$mode','$purpose','$account','$amount','$station')";
     $result = mysqli_query($con,$sql);
     
     if($result){

     echo '<script>
    alert("Invoice Generated successfully");
    window.location="adminProfile.php";
    
    </script>';

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mutuneparish.ac.ke/book_burial</title>
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
    <br>
    <div class="modal-dialog my-5">
        <div class="modal-content">
        <div class="modal-header"><h4> PAYMENT INVOICE </h4></div>
        <div class="modal-body">
            <form action="invoice.php" method="post">
           
<input type="text" name="name" placeholder="Enter catechist Name" class="form-control" autocomplete="off" required> <br>
<select name="mode" class="form-control" autocomplete="off" required >
                <option value selected disabled>Select mode of payment</option>
                <option value="MPESA">MPESA</option>
                <option value="BANK">BANK</option>
            
                </select><br>

                <select name="purpose" class="form-control" autocomplete="off" required >
                <option value selected disabled>Select payment for</option>
                <option value="Baptismal_Class">Baptismal</option>
                <option value="Confirmation_Class">Confirmation</option>
            
                </select><br>

<input type="text" name="account" minLength="10" maxLength="11"  placeholder="Mpesa/Account Number" class="form-control" autocomplete="off"  required><br>
<input type="text" name="amount"   placeholder="Enter amount paid" class="form-control" autocomplete="off"  required><br>

<select name="station" class="form-control" autocomplete="off" required >
                <option value selected disabled>Select catechist outstation</option>
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

                </select><br>

                <hr class="bg-danger">
                 <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="GENERATE INVOICE">
            </form>
        </div>
        </div>
    </div>
   
</body>
</html>