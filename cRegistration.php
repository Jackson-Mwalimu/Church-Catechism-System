<?php
include_once("../partials/dbConnection.php");
session_start();
if(isset($_SESSION["id"])){
    header("location:profile.php");
}

if(isset($_POST["submit"])){
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

    $sql="SELECT * FROM christians_registration WHERE username='$username' 
    AND card_no='$cardNo'";
    $select=mysqli_query($con,$sql);

    if(mysqli_num_rows($select)>0){
        $message[] = "Username or CardNo already exist";
    }else{
        if($password != $cpassword){
            $message[] = "confirm passwords not matched";
        }else{
            
            $sql ="INSERT INTO christians_registration(username,password,cpassword,email,mobile,station,scc,card_no,passport,sacraments,gender) 
          VALUES('$username','$password','$cpassword','$email','$mobile','$station','$scc','$cardNo','$image','$sacraments','$gender')";

         $result = mysqli_query($con,$sql);

        if($result){
            move_uploaded_file($tmp_name,"../uploads/$image");
            echo '<script>
    alert("Registration successfull");
    window.location="../chatechsim/cLogin.php";
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
            <?php
            if(isset($message)){
                foreach($message as $message){

                    // Displays the error message if the user enters username or cardNo that exists within the database;
                    echo '<div class="form-control bg-danger text-center text-light">'.$message.'</div>';
                }
            }

            ?>
        <div class="row">
            <div class="col-md-4">
                <label for="" >username:<strong class="text-danger">*</strong></label>
                <input type="text" name ="username" placeholder="Enter username" class="form-control" autocomplete="off"  required>
                <label for="">password:<strong class="text-danger">*</strong></label>
                <input type="password" name ="password" placeholder="Enter Password" class="form-control" autocomplete="off"  required>
                <label for="">confirm password:<strong class="text-danger">*</strong></label>
                <input type="password" name ="cpassword" placeholder="confirm password" class="form-control" autocomplete="off"  required>
                <label for="">Email: </label>
                <input type="email" name ="email" placeholder="Enter email(Optional)" class="form-control" autocomplete="off" >

            </div>
            <div class="col-md-4">
            <label for="">mobile<strong class="text-danger">*</strong></label> 
            <input type="text" name ="mobile" placeholder="Enter mobile no." class="form-control" minLength="10" maxLength="10" required>
            <label for="">station <strong class="text-danger">*</strong></label>
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
            <label for="">small christian community <strong class="text-danger">*</strong></label>
            <input type="text" name ="scc" placeholder="Enter firstName" class="form-control"  required>
            <label for="">Baptismal Card No. : </label>
            <input type="text" name ="cardno" placeholder="Enter card no.(Optional)" class="form-control">
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
            <input type="radio" name="gender" value="male"> Male<br>
           <input type="radio" name="gender" value="female"> Female<br>
           <input type="radio" name="gender" value="other"> Other
    
                   </div>
        </div>
        <hr>
        
        <div><input type="submit" name="submit" class="btn btn-primary form-control"value="SUBMIT"></div>
        </form>
    
        <p>Already have an account <a href="../chatechsim/cLogin.php">Login here</a> </p>
    </div>
    <?php
include("../partials/footer.php");

?>
</body>
</html>