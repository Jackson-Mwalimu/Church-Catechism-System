<?php
include("../partials/dbConnection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mutuneparish.ac.ke/view_departed_souls</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../js/bootstrap.js">
    <link rel="stylesheet" href="../fonts/css/all.css">

</head>
<body>

<div class="container my-5">
   
<a href = "bookBurial.php" class="btn btn-warning">Add Deceased </a>

<div style="float:right;" class="mx-5 pb-3">
<form class="form-inline" action="displayDeceased.php">
    <input class="form-control mr-sm-2" type="text" name="cardNo" placeholder="Search cardNo">
    <button class="btn btn-success" type="submit" name="search">Search</button>
     
  </form>
  </div> 

        <table class="table table-light table-hover">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">S/no</th>
                    <th scope="col">Next of Kin</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Card No.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">D.D.D</th>
                    <th scope="col">Station</th>
                    <th scope="col">S.C.C</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
$sql = "SELECT * FROM deceased";
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

    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$nextKin.'</td>
    <td>'.$mobile.'</td>
    <td>'.$cardNo.'</td>
    <td>'.$fullName.'</td>
    <td>'.$DDD.'</td>
    <td>'.$outStation.'</td>
    <td>'.$scc.'</td>
    <td>
    <a href = "assignDeceased.php?assignid='.$id.'" class="btn btn-dark"> <i class="fas fa-tasks mr-1"></i> Assign </a>
    <a href = "deleteDeceased.php?deleteid='.$id.'" class="btn btn-danger"><i class="fas fa-remove mr-1"></i> Delete </a>
    </td>
</tr>';
}

?>
            </tbody>
        </table>

    </div>
</body>
</html>