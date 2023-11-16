<?php
include("../partials/dbConnection.php");

if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];

    $sql = "DELETE FROM  deceased WHERE id='$id'";

    $result = mysqli_query($con,$sql);

    if($result){
        echo '<script>
        alert("Deceased removed from the record successfully");
        window.location("displayDeceased.php");
        </script>';
    }else{
        echo '<script>
        alert("Record not removed, check your backed code");
        window.location("displayDeceased.php");
        </script>';
    }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete departed souls</title>
</head>
<body>
    
</body>
</html>