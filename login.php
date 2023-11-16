<?php
include("../partials/dbConnection.php");
session_start();

if(isset($_POST["submit"])){
    $user_type = mysqli_real_escape_string($con,$_POST["user_type"]);
    $username = mysqli_real_escape_string($con,$_POST["username"]);
    $password = mysqli_real_escape_string($con,md5($_POST["password"]));
   // $hashed_password = password_hash($password,PASSWORD_DEFAULT);
  

    $sql="SELECT * FROM admins WHERE password='$password' 
    AND username='$username' AND user_type='$user_type'";
    $select=mysqli_query($con,$sql);

    if(mysqli_num_rows($select)>0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION["admin_id"] = $row["id"];

    }else{

        $message[] = "Incorrect username or password!";
        
    }
       
}
   
?>

<?php
if(isset($row)){
 if($row['user_type'] == 'Admin'){
    header("location:adminProfile.php");

} 
if($row['user_type'] == 'Catechist'){
    header("location:catechistsProfile.php");

}
if($row['user_type'] == 'Priest'){
    header("location:priestsProfile.php");

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div">
    <title>Mutune::Login</title>
    <?php
    include("../partials/links.php")
    ?>
    <style>
         body{
            background-image:url('../images/lc1.jpg');
            background-size:cover;
            background-repeat: no-repeat;
            height:100%;
          
        }
    </style>
    <?php
include("../partials/header.php");
?>

</head>
<body>
<br><br><br>
<div class="container my-10">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card mt-5 bg-light">
<div class="card-header text-center">ADMINS LOGIN</div>
<div class="card-body bg-light">
<form action="login.php" method="post">
<?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="form-control bg-danger text-center text-light">'.$message.'</div>';
                }
            }

            ?>
            <br>
<div>
<select name="user_type" class="form-control" autocomplete="off" required >
<option value disabled selected>Select user_type</option>
 <option value="Priest">Priest</option>
 <option value="Catechist">Catechist</option>
<option value="Admin">Admin</option> 
</select> <br>

<input type="text"placeholder="userName" name="username" class="form-control"><br>
</div>


<input type="password" placeholder="password" name="password" class="form-control">
<hr>
<div> <input type="submit" name="submit" id="submit" class="btn btn-primary" style="float:right;" value="Login">
</div>
<br><br>
<div><p class="text-center">Don't have an account? <a href="#" disabled>Conduct superAdmin</a></p></div>
</form>
</div>
</div>
</div>

</div>

</div> 

</body>
</html> 