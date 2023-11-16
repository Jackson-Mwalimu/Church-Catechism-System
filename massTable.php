<?php
session_start();
include("../partials/dbConnection.php");
$id = $_GET["updateid"];
$sql= "SELECT * FROM mass_schedule WHERE id=$id";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $id = $row['id'];
    $station = $row['station'];
    $mass_month= $row['mass_month'];
    $mass_date = $row['mass_date'];
    $mass_from = $row['mass_from'];
    $mass_to= $row['mass_to'];
    $priest = $row['priest'];

    if(isset($_POST["submit"])){
        
        $station = $_POST["station"];
        $month = $_POST["month"];
        $date = $_POST["date"];
        $from = $_POST["from"];
        $to = $_POST["to"];
        $priest = $_POST["priest"];

        $sql = "UPDATE mass_schedule SET id=$id,station='$station',mass_month='$month',mass_date='$date',mass_from='$from',
        mass_to='$to',priest='$priest' WHERE id='$id'";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "<script>
            window.alert('Record updated successfully');
            window.location('update_massTable.php');
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
<form action="massTable.php" method="post">
<div class="form-group">

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Station:</label>
    <div class="col-sm-10">
    <input type="text" name="station" class="form-control" value= <?php echo $station;?>>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Month:</label>
    <div class="col-sm-10">
    <input type="text" name="month" class="form-control" value= <?php echo $mass_month;?>>
    </div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Date:</label>
    <div class="col-sm-10">
    <input type="text" name="date" class="form-control" value= <?php echo $mass_date;?>>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">From:</label>
    <div class="col-sm-10">
    <input type="text" name="from"class="form-control" value= <?php echo $mass_from;?>>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">TO:</label>
    <div class="col-sm-10">
    <input type="text" name="to"class="form-control" value= <?php echo $mass_to;?>>
</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Priest:</label>
    <div class="col-sm-10">
   <input type="text" name="priest" class="form-control" value=<?php echo $priest;?>>
    </div>
</div>
</div>
<hr>
<div> <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="Update"></div>
        
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