<?php
include("../partials/dbConnection.php");

if(isset($_POST["submit"])){
    $user_type = mysqli_real_escape_string($con,$_POST["user_type"]);
    $username = mysqli_real_escape_string($con,$_POST["username"]);
    $password = mysqli_real_escape_string($con,md5($_POST["password"]));
   // $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    $cpassword = mysqli_real_escape_string($con,md5($_POST["cpassword"]));
   // $hashed_cpassword = password_hash($cpassword,PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $mobile = mysqli_real_escape_string($con,$_POST["mobile"]);
    $station = mysqli_real_escape_string($con,$_POST["station"]);
    $photo = $_FILES["photo"]["name"];
    $tmp_name= $_FILES["photo"]["tmp_name"];

    $sql="SELECT * FROM admins WHERE username='$username' 
    AND password='$password'";
    $select=mysqli_query($con,$sql);

    if(mysqli_num_rows($select)>0){
        $message[] = "Username already exist";
    }else{
        if($password != $cpassword){
            $message[] = "confirm passwords not matched";
        }else{
            
            $sql ="INSERT INTO admins(user_type,username,password,cpassword,mobile,email,station,photo) 
          VALUES('$user_type','$username','$password','$cpassword','$mobile','$email','$station','$photo')";

         $result = mysqli_query($con,$sql);

        if($result){
            move_uploaded_file($tmp_name,"../uploads/$image");
            echo '<script>
    alert("Admin added successfull");
    window.location="../admins/login.php";
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
    <title>Document</title>
    <?php
    include("../partials/header.php");
    include("../partials/links.php");
    ?>

<style>
        p{
            color:blue;
            font-size:14px;
        }
        h4{
            color:black;
            text-align:center;
        }
        body{
            background-image:url('../images/lc1.jpg');
            background-size:cover;
            background-repeat: no-repeat;
            height:100%;
          
        }
       
    </style>
</head>
<body>
<body class="bg-light">
    <br>
    <div class="modal-dialog my-5">
            <div class="modal-content">
            <div class="modal-header bg-light"><h4> ADMINS REGISTER</h4></div>
            <div class="modal-body">
                <form action="register.php"  method="post"enctype="multipart/form-data">
                <?php
  if(isset($message)){
  foreach($message as $message){
    // Displays the error message if the user enters username or password that exists within the database;
    echo '<div class="form-control bg-danger text-center text-light">'.$message.'</div>';
                }
            }

            ?>
            <div class="row">
                <div class="col-md-6">
                <p>user_type:</p>
 <select name="user_type" class="form-control" autocomplete="off" required >
<option value disabled selected>Select user_type</option>
 <option value="Priest">Priest</option>
 <option value="Catechist">Catechist</option>
<option value="Admin">Admin</option> 
</select> <br>

<p>username:</p>
<input type="text" name="username" autocomplete="off" placeholder="Enter username" class="form-control"><br>

<p>password:</p>
<input type="password" name="password" autocomplete="off" placeholder="Enter password" class="form-control"><br>

<p>confirm_password:</p>
<input type="password" name="cpassword" autocomplete="off" placeholder="Confirm password" class="form-control">


                </div>

                <div class="col-md-6">
                <p>mobile:</p>
<input type="text" name="mobile" placeholder="Enter mobile number" autocomplete="off" class="form-control" maxLength="10"minLength="10">
<br>
<p>Email:</p>
<input type="email" name="email" placeholder="Enter email" autocomplete="off" class="form-control"><br>


<p>station:</p>

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
                <option value="Admin">Admin</option>
                <option value="Priest">Priest</option>
                </select><br>

                <p>passport photo:</p>
<input type="file" name="photo" accept="image/jpg, image/jpeg, image/phg" autocomplete="off" class="form-control">
            
    


                </div>
        </div>
     <hr>
     <div> 
     <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="REGISTER">
     </div> 
     </form><br><br>
    <p class="text-center">Already have an account <a href="../admins/login.php">Login here</a> </p>
        </div>

        
        
</body>

</html>
