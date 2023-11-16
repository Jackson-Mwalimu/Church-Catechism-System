<?php
include("../partials/dbConnection.php");
session_start();
$id= $_SESSION["updateid"];
$username=$_SESSION["username"];
$scc=$_SESSION["scc"];
$station=$_SESSION["station"];
$card_no=$_SESSION["card_no"];
$mobile=$_SESSION["mobile"];
$email=$_SESSION["email"];
$password=$_SESSION["password"];
$cpassword=$_SESSION["cpassword"];

if(isset($_POST["update"])){
    $id= $_SESSION["updateid"];
    $username = mysqli_real_escape_string($con,$_POST["username"]);
    $password = mysqli_real_escape_string($con,md5($_POST["password"]));
   // $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    $cpassword = mysqli_real_escape_string($con,md5($_POST["cpassword"]));
   // $hashed_cpassword = password_hash($cpassword,PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $mobile = mysqli_real_escape_string($con,$_POST["mobile"]);
    $station = mysqli_real_escape_string($con,$_POST["station"]);
    $scc = mysqli_real_escape_string($con,$_POST["scc"]);
    $cardNo= mysqli_real_escape_string($con,$_POST["cardno"]);
    $sacrament= $_POST["sacrament"];
    $sacraments = implode(",",$sacrament);
    $gender = mysqli_real_escape_string($con,$_POST["gender"]);
    $image = $_FILES["file"]["name"];
    $tmp_name= $_FILES["file"]["tmp_name"];

            
 $sql ="UPDATE christians_registration SET id=$id,email='$email', mobile='$mobile',station='$station',scc='$scc',passport='$image',sacraments='$sacraments' WHERE id=$id";
$result = mysqli_query($con,$sql);

        if($result){
            move_uploaded_file($tmp_name,"../uploads/$image");
            echo '<script>
    alert("Details updated successfully");
    window.location="../chatechsim/profile.php";
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
    <title>mutuneparish.ac.ke/registration</title>
    <style>
        label{
            color:dark;
            font-size:20px;
        }
        h1{
            color:gold;
        }
        ul{
            list-style-type:none;
        }
       
   
    </style>
    <?php
     include("../partials/links.php");
include("../partials/header.php");
?>
</head>

<body class="bg-light">

<br><br><br>
    <div class="container my-3 text-center">
        <h1>Register</h1>
        <form action="cRegistration.php" method="post" enctype="multipart/form-data"class="text-left">
           
        <div class="row">
            <div class="col-md-4">
                <label for="" >username:<strong class="text-danger">*</strong></label>
                <input type="text" name ="username" placeholder="Enter username" class="form-control" autocomplete="off" value=<?php echo $username ?> disabled>
                <label for="">password:<strong class="text-danger">*</strong></label>
                <input type="password" name ="password" placeholder="Enter Password" class="form-control" autocomplete="off" value=<?php echo $password ?> disabled>
                <label for="">confirm password:<strong class="text-danger">*</strong></label>
                <input type="password" name ="cpassword" placeholder="confirm password" class="form-control" autocomplete="off" value=<?php echo $cpassword?> disabled>
                <label for="">Email: </label>
                <input type="email" name ="email" placeholder="Enter email(Optional)" class="form-control" autocomplete="off" value=<?php echo $email ?>>

            </div>
            <div class="col-md-4">
            <label for="">mobile<strong class="text-danger">*</strong></label> 
            <input type="text" name ="mobile" placeholder="Enter mobile no." class="form-control" minLength="10" maxLength="10" value=<?php echo $mobile ?>>
            <label for="">station <strong class="text-danger">*</strong></label>
           <input type="text" name="station" value=<?php echo $station ?> class="form-control">
            <label for="">small christian community <strong class="text-danger">*</strong></label>
            <input type="text" name ="scc" placeholder="Enter firstName" class="form-control"  value=<?php echo($scc); ?>>
            <label for="">Baptismal Card No. : </label>
            <input type="text" name ="cardno" value=<?php echo $card_no ?> disabled placeholder="Enter card no.(Optional)" class="form-control">
            </div>


            <div class="col-md-4">
            <label for="">Passport <strong class="text-danger">*</strong></label>
            <input type="file" accept="image/jpg, image/jpeg, image/phg" name ="file" placeholder="Enter firstName" class="form-control">

            <label for="">sacraments received : <strong class="text-danger">*</strong></label>
            <div class="row">
                <div class="col-md-6">
                <ul>
                <li> <input type="checkbox" name="sacrament[]" value="Baptism" >Baptism </li>
                <li><input type="checkbox" name="sacrament[]" value="Confirmation" >Confirmation </li>
                <li><input type="checkbox" name="sacrament[]" value="Eucharist" >Eucharist </li>
                <li><input type="checkbox" name="sacrament[]" value="Penance" >Penance </li>
    </ul>
                </div>

                <div class="col-md-6">
                    <ul>
               <li> <input type="checkbox" name="sacrament[]" value="Holy Orders" >Holy Orders </li>
               <li>  <input type="checkbox" name="sacrament[]" value="Matrimony" >Matrimony </li>
               <li> <input type="checkbox" name="sacrament[]" value="Annointing of the sick">Annointing </li>
               <li> <input type="checkbox" name="sacrament[]" value="Annointing of the sick" >None </li>
               </div>

            </div>
            
            <label for="">Kindly select gender: <strong class="text-danger">*</strong></label></br>
            <input type="radio" name="gender" value="male" disabled> Male<br>
           <input type="radio" name="gender" value="female" disabled> Female<br>
           <input type="radio" name="gender" value="other" disabled> Other
    
                   </div>
        </div>
        <hr>
        
        <div><input type="submit" name="update" class="btn btn-primary form-control"value="UPDATE AMENDED DETAILS"></div>
        </form>
    
        <p>Don't want to update <a href="profile.php">Back Home</a> </p>
    </div>
    <?php
include("../partials/footer.php");

?>
</body>
</html>