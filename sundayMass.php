<?php
include("../partials/dbConnection.php");

if(isset($_POST["submit"])){
    $station = $_POST["station"];
    $month = $_POST["month"];
    $date = $_POST["date"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $priest = $_POST["priest"];

    $sql = "INSERT INTO mass_schedule(station,mass_month,mass_date,mass_from,mass_to,priest) 
    VALUES('$station','$month','$date','$from','$to','$priest')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "<script>
        window.alert('Record inserted successfully');
        window.location='../admins/priestsProfile.php';
        </script>";
    }else{
        die(mysqli_connect_error($con));
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutune::mass schedule</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../js/bootstrap.js">
    <link rel="stylesheet" href="../fonts/css/all.css">
</head>
<body class="bg-light">


<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card mt-5">
<div class="card-header text-center">MONTHLY MASS SCHEDULE</div>
<div class="card-body">
<form action="sundayMass.php" method="post">

<div class="form-group">
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Station:</label>
    <div class="col-sm-10">
    <select name="station" class="form-control" autocomplete="off" required >
                <option value disabled selected>Select station</option>
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

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Month:</label>
    <div class="col-sm-10">
    <select name="month" class="form-control" autocomplete="off" required >
                <option value disabled selected>Select month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March"</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
                </select>
    </div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Date:</label>
    <div class="col-sm-10">
    <input type="date" name="date" class="form-control">
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">From:</label>
    <div class="col-sm-10">
    <input type="time" name="from"class="form-control">
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">TO:</label>
    <div class="col-sm-10">
    <input type="time" name="to"class="form-control">
</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Priest:</label>
    <div class="col-sm-10">
    <select name="priest" class="form-control" autocomplete="off" required >
                <option value selected disabled>Assign priest</option>
                <option value="Rev.Fr.Masila(P.P)">Rev.Fr.Masila(P.P)</option>
                <option value="Rev.Fr.Benard">Rev.Fr.Benard</option>
                <option value="Rev.Fr.Kivosyo">Rev.Fr.Kivosyo</option>                
                </select>
    </div>
</div>
</div>
<hr>
<div> <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="SCHEDULE"></div>
        
</form>

      
</div>
</div>
</div>
</div>
</div><br>

<?php
    include("../partials/footer.php");
    ?>
</body>
</html>