<?php
session_start();
include("../partials/dbConnection.php");
$nextKin=$_SESSION["nextkin"];
$moble= $_SESSION["mobile"];
$cardNo=$_SESSION["cardNo"];
$fullName=$_SESSION["fullName"];
$ddd= $_SESSION["ddd"];
$station= $_SESSION["station"];
$scc=$_SESSION["scc"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burial_Request_Printer</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../js/bootstrap.js">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <link rel="stylesheet" href="print.css" media="print">
    <style>
            
        .bar{
            border: 5px dotted red;
            border-radius: 5px;
            margin-top:5%;
            margin-right:30%;
            margin-left:40%;
        }
        h4{
            text-align:center;
            color:blue;
            font-weight:bold;
          
        }
        h3{
            padding:20px;
        }
        p{
            margin-right:20px;
            padding:10px;
        }
        address{
            margin-right:20px;
            padding:10px;
            text-align:center;
            font-weight:bold;

        }
        #d{
            float:right;
            color:blue;
        }
        #d1{
            float:right;
            color:red;
            margin-right:30%;
            margin-left:40%;
        }
       
        
    </style>
</head>
<body class="bg-light">
<br>
<div id="d1"><a href="../chatechsim/profile.php" id="print-btn">Back Home</a></div><br>
<div class="bar"> 
<h4>Burial Acknowledgement Receipt (BAR)</h4>
<p><b>Dear Parishioner,</b><br>
We acknowledge your request send on <b><?php  echo date("d/m/y");?></b>
concerning the death of  <b><?php  echo $fullName;?></b> who died on  <b><?php  echo $ddd ?></b>. 
Kindly note that, the Parish priest will conduct you via your mobile number 
where afterwards he shall inform <b><?php  echo $station ?></b> station and  <b><?php  echo $scc; ?></b>
small christian community for burial preparation.<b  class="text-warning">
We are sorry for the demise of <?php  echo $fullName ?> may the soul rest in peace. Amen.</b></p><br>
<div id="d"> <button onclick="window.print()" class="btn btn-primary my-3" id="print-btn">Print</button></div>
</div>

</body>
</html>