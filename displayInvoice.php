<?php
include("../partials/dbConnection.php");
session_start();
$station= $_SESSION["station"];


$sql = "SELECT * FROM invoice WHERE station='$station' ";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_assoc($result);
$name = $row["name"];
$mode = $row["mode"];
$purpose= $row["purpose"];
$account = $row["account"];
$amount = $row["amount"];
$station = $row["station"];


}else{
    echo '<script>
    alert("Sorry! No invoice found for this user");
    window.location="catechistsProfile.php";
    
    </script>';
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div">
    <title>Mutune::Login</title>
    <!--<link rel="stylesheet" href="../chatechsim/print.css"> -->
    <?php
    include("../partials/links.php");
    include("../partials/header.php");
    ?>
    
</head>
<body>
<br><br><br>
<div class="container my-10">
    
<div class="row justify-content-center">
<a href="catechistsProfile.php" id="print-btn">Back Home</a>
<div class="col-md-6">
<div class="card mt-5 bg-light">
<div class="card-header text-center">PAYMENT RECEIPT</div>
<div class="card-body bg-light">
<form action="login.php" method="post">
<p><i>Dear catechist</i> <b><?php echo $name ?></b>,<br>
We acknowlege your payment receipt as follows:
<table class="table table-light table-hover">
    <thead class="bg-dark text-light">
        <tr>
            <th>Amount_Paid</th>
            <th>Payment_Mode</th>
            <th>Account_No.</th>
            <th>Request</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-info">
            <b><td><?php echo $amount ?></td></b>
            <b><td><?php echo $mode ?></td></b>
            <b><td><?php echo $account?></td></b>
            <b><td><?php echo $purpose ?></td></b>
        </tr>
    </tbody>
</table>
Kindly note that the parish priest <b class="text-info"><i>Rev.Fr. Benard Masila</i></b> will reach you 
via your phone number to inform your when <b class="text-danger"><?php echo $purpose ?></b> will be baptist/confered. 
<b>THANK YOU.<b>
</p>

</form>

</div>
</div>
<button class="btn btn-primary my-3" style="float:right;" id="print-btn" onclick="window.print()">Print</button>
</div>

</div>

</div> 

</body>
</html> 