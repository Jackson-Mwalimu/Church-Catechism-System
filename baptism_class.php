<?php
session_start();
$user_username= $_SESSION["username"];
$user_scc=$_SESSION["scc"];
$user_station=$_SESSION["station"];
include("../partials/dbConnection.php");

if(isset($_POST["submit"])){

$username=$_POST["username"];
$firstname=$_POST["firstname"];
$baptismalname=$_POST["baptismalname"];
$surname=$_POST["surname"];
$cardno=$_POST["cardno"];
$baptismalparent=$_POST["baptismalparent"];
$station=$_POST["station"];
$scc=$_POST["scc"];

$sql="SELECT * FROM baptismal_class WHERE username='$username'";
    $select=mysqli_query($con,$sql);

    if(mysqli_num_rows($select)>0){
        $message[] = "Username already exist";
    }else{
        if($password != $cpassword){
            $message[] = "confirm passwords not matched";
        }else{
            
            "INSERT INTO baptismal_class(username,first_name,baptismal_name,surname,card_no,baptismal_parent,station,scc)
            VALUES('$username','$firstname','$baptismalname','$surname','$cardno','$baptismalparent','$station','$scc')";
            
         $result = mysqli_query($con,$sql);

        if($result){
            
            echo '<script>
    alert("Joined baptismal class successfully");
    window.location="../chatechsim/profile.php";
    </script>';
            
        }

        }
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
<div class="card mt-5 by-light">
<div class="card-header text-center">BAPTISMAL CLASS</div>
<div class="card-body">
<form action="baptism_class.php" method="post">

<?php
            if(isset($message)){
                foreach($message as $message){

                    // Displays the error message if the user enters username that exists within the database;
                    echo '<div class="form-control bg-danger text-center text-light">'.$message.'</div>';
                }
            }

            ?>

<div class="form-group">
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">username:</label>
    <div class="col-sm-10">
    <input type="text" name="username" class="form-control" value=<?php echo $user_username;?> autocomplete="off" disabled>
    </div>
</div>


<div class="row mb-3">
    <label class="col-sm-2 col-form-label">first name:</label>
    <div class="col-sm-10">
    <input type="text" name="firstname" class="form-control" autocomplete="off">
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">bapt_name:</label>
    <div class="col-sm-10">
    <input type="text" name="baptismalname"class="form-control"autocomplete="off" disabled>
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
    <input type="text" name="cardno"class="form-control"autocomplete="off" disabled>
</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Bapt_parent:</label>
    <div class="col-sm-10">
    <input type="text" name="baptismalparent"class="form-control"autocomplete="off">
</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Station:</label>
    <div class="col-sm-10">
    <input type="text" name="station" class="form-control"autocomplete="off" value=<?php echo $user_station; ?> disabled>
    </div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">S.C.C:</label>
    <div class="col-sm-10">
    <input type="text" name="scc"class="form-control" disabled autocomplete="off" value=<?php echo $user_scc; ?> >
</div>
</div>

</div>
<hr>
<div> <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="Register"></div>
<br><br>
<div><p class="text-center">Already have an account? <a href="cLogin.php">Login</a></p></div>      
</form>

      
</div>
</div>
</div>
</div>
</div><br>


</body>
</html>