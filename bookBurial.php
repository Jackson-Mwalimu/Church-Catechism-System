<?php
session_start();
include("../partials/dbConnection.php");
 
if(isset($_POST["submit"])){
    $nextKin = $_POST["nextKin"];
    $mobile = $_POST["mobile"];
    $cardNo = $_POST["cardNo"];
    $fullName = $_POST["fullName"];
    $DDD = $_POST["ddd"];
    $outStation = $_POST["outStation"];
    $scc = $_POST["scc"];

    $_SESSION["nextkin"]= $_POST["nextKin"];
    $_SESSION["mobile"]= $_POST["mobile"];
    $_SESSION["cardNo"]= $_POST["cardNo"];
    $_SESSION["fullName"]= $_POST["fullName"];
    $_SESSION["ddd"]= $_POST["ddd"];
    $_SESSION["station"]= $_POST["outStation"];
    $_SESSION["scc"]= $_POST["scc"];

$sql = "SELECT * FROM christians_registration where card_no='$cardNo'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    
    $sql = "INSERT INTO deceased(nextKin,mobile,cardNo,fullName,DDD,outStation,SCC)
     VALUES('$nextKin','$mobile','$cardNo','$fullName','$DDD','$outStation','$scc')";
     $result = mysqli_query($con,$sql);
     if($result){

     echo '<script>
    alert("Request send successfully, we shall reach your via your number");
    window.location="../chatechsim/printRequest.php";
    
    </script>';

}
   
}else{
    $message[]= "No user with this cardNo, consult with catechist";    
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
        <div class="modal-header"><h4> Request For Burial </h4></div>
        <div class="modal-body">
            <form action="bookBurial.php" method="post">
            <?php
            if(isset($message)){
                foreach($message as $message){

                    // Displays the error message if the user enters username or cardNo that exists within the database;
                    echo '<div class="form-control bg-danger text-center text-light">'.$message.'</div>';
                }
            }

            ?>
                <select name="nextKin" class="form-control" autocomplete="off" required >
                <option value="Select next of kin">Select next of kin</option>
                <option value="Husband">Husband</option>
                <option value="Wife">Wife</option>
                <option value="Son">Son</option>
                <option value="Daughter">Daughter</option>
                <option value="Other Relative">Other Relative</option>
                </select><br>
                <input type="text" name="mobile" minLength="10" maxLength="10"  placeholder="Next of Kin mobile" class="form-control" autocomplete="off"  required><br>
                <input type="text" name="cardNo" placeholder="Enter deceased Baptismal Card No." class="form-control" autocomplete="off" required><br>
<input type="text" name="fullName" placeholder="Enter deceased fullName" class="form-control" autocomplete="off" required><br>
<p>Deceased Death Date(DDD):</p>
<input type="date" name="ddd"class="form-control" required></br>

<select name="outStation" class="form-control" autocomplete="off" required >
                <option value="Select deceased outstation">Select deceased outstation</option>
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
                <input type="text" name="scc" placeholder="Enter deceased small christian group" class="form-control" autocomplete="off" required><br>
                <hr>
                 <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="SEND REQUEST">
            </form>
        </div>
        </div>
    </div>
   
</body>
</html>