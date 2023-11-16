<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutune::Mass Scheduler</title>
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

<div class="container my-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card mt-5">
<div class="card-header text-center text-primary">SUNDAY MASS SCHEDULER</div>
<div class="card-body bg-light">
    <div>
<table class="table table-light table-hover">
    <thead class="bg-warning text-light">
    <tr>
       
        <th>station</th>
        <th>month</th>
        <th>Date</th>
        <th>startTime</th>
        <th>endTime</th>
        <th>priest</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    include("../partials/dbConnection.php");
                
                $sql = "SELECT * FROM mass_schedule";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $station = $row["station"];
                    $month = $row["mass_month"];
                    $mass_date = $row["mass_date"];
                    $mass_from = $row["mass_from"];
                    $mass_to = $row["mass_to"];
                    $priest = $row["priest"];
                    
                    echo '<tr>
                   
                    <td>'.$station.'</td>
                    <td>'.$month.'</td>
                    <td>'.$mass_date.'</td>
                    <td>'.$mass_from.'</td>
                    <td>'.$mass_to.'</td>
                    <td>'.$priest.'</td>
                    <td>
                    <a href = "massTable.php?updateid='.$id.'" class="btn btn-dark btn-sm"> Update </a>
                       </td>
                       </tr>';
                }
                
                ?>
    </tbody>
</table>
</div>
  
</div>
</div>
</div>
</div>
</div><br>
    
</body>
</html>