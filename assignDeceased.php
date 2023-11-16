<?php
session_start();
include("../partials/dbConnection.php");
 if(isset($_GET["assignid"])){
    $id = $_GET["assignid"];

    $sql = "SELECT * FROM deceased WHERE id='$id'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)){
    $id = $row["id"];
    $nextKin = $row["nextKin"];
    $mobile = $row["mobile"];
    $cardNo = $row["cardNo"];
    $fullName = $row["fullName"];
    $DDD = $row["DDD"];
    $outStation = $row["outStation"];
    $scc = $row["SCC"];
 }
}
if(isset($_POST["assign"])){
    $nextKin = $_POST["nextKin"];
    $mobile = $_POST["mobile"];
    $fullName = mysqli_real_escape_string($con,$_POST["fullName"]);
    $DDD = date("Y-m-d",strtotime(  $_POST["ddd"]));
    $outStation= $_POST["outStation"];
    $scc = $_POST["scc"];
    $BD = date("Y-m-d",strtotime(  $_POST["bd"]));
    $priest = $_POST["priest"];

    $sql ="INSERT INTO burial_mass(nextKin,mobile,fullName,DDD,outStation,SCC,burialDate,assignedpriest) 
    VALUES('$nextKin','$mobile','$fullName','$DDD','$outStation','$scc','$BD','$priest')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo '<script>
        alert("Mass assigned successfully");
        window.location="../admins/priestsProfile.php";
        </script>';
    }else{
        echo mysqli_connect_error($con);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign priests Burial Mass</title>
    <?php include("../partials/links.php"); ?>
</head>
<body class="bg-light">
    
<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header"><h4> Burial Mass </h4></div>
        <div class="modal-body">
            <form action="assignDeceased.php" method="post">

            <div class="row">
                <div class="col-md-6">
                <p>Next_of_Kin:</p>
                <input type="text" class="form-control" name="nextKin" value=<?php echo $nextKin;?>><br>
<p>Mobile:</p>
<input type="text" name="mobile" minLength="10" maxLength="10"  class="form-control" autocomplete="off"  required value=<?php echo $mobile;?>><br>

<p>Deceased Name:</p>         
<input type="text" name="fullName" class="form-control" value=<?php echo $fullName;?>><br>

<p>Deceased Death Date(DDD):</p>         
<input type="text" name="ddd" class="form-control" value=<?php echo $DDD;?>><br>

                </div>

                <div class="col-md-6">
                <p>outStation:</p>
<input type="text" name="outStation" value="<?php echo $outStation;?>" class="form-control" autocomplete="off"  required> <br>
                <p>Small Christian community:</p>
 <input type="text" name="scc" class="form-control" autocomplete="off" required value=<?php echo $scc;?>><br>
                
<p>Burial Date(BD):</p>
<input type="date" name="bd"class="form-control" required></br>
<p>Assigned priest:</p>
<select name="priest" class="form-control" autocomplete="off" required >
                <option value="Assign priest">Assign priest</option>
                <option value="Rev.Fr.Masila(P.P)">Rev.Fr.Masila(P.P)</option>
                <option value="Rev.Fr.Benard">Rev.Fr.Benard</option>
                <option value="Rev.Fr.Kivosyo">Rev.Fr.Kivosyo</option>
                </select><br>


                </div>
            </div>
               


                <hr>
                 <input type="submit" name="assign" id="submit" class="btn btn-primary" style="float:right;" value="ASSIGN">
                
                </form>
        </div>
        </div>
    </div>
</body>
</html>