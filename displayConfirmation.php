<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutune::Confirmation_Class</title>
    <?php
    include("../partials/header.php");
include("../partials/links.php");
include("../partials/dbConnection.php");
    ?>
</head>
<style>
    body{
        font-family: "Roboto", sans-serif;
        background: #edf2f5;
        padding: 30px;
    }
</style>
<body>
    <br>
    <div class="container my-5">
        <div class="row-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background:#ffffff;padding-bottom:
                19px;">
            
                <a href="" class="btn btn-primary btn-sm" style="float: right;margin-right:20px; margin-top:20px;"> <i 
                class="fa fa-plus" syle="font-size:20px;"></i>Request Confirmation</a>
               
                <form class="form-inline" action="displayDeceased.php">
    <input class="form-control mr-sm-2" type="text" name="username" placeholder="Search username"
    style="margin-left:20px; margin-top:20px;">
    <button class="btn btn-success form-control" type="submit" name="search" 
    style="margin-right:20px; margin-top:20px;">Search</button>
     
  </form>
                </div>
                <div class="panel-body">
 
  </div> 

        <table class="table table-light table-hover">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">S/no</th>
                    <th scope="col">username</th>
                    <th scope="col">baptismalName</th>
                    <th scope="col">confirmationName</th>
                    <th scope="col">Card No.</th>
                    <th scope="col">Station</th>
                    <th scope="col">S.C.C</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
$sql = "SELECT * FROM confirmation_class";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)){
    $id = $row["id"];
    $username= $row["username"];
    $cardNo = $row["card_no"];
    $baptismalName = $row["baptismal_name"];
    $confirmationName = $row["confirmation_name"];
    $station = $row["station"];
    $scc = $row["scc"];

    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$username.'</td>
    <td>'.$baptismalName.'</td>
    <td>'.$confirmationName.'</td>
    <td>'.$cardNo.'</td>
    <td>'.$station.'</td>
    <td>'.$scc.'</td>
    
    <td>
    <a href = "assignDeceased.php?assignid='.$id.'" class="btn btn-dark"> <i class="fas fa-tasks mr-1"></i> Update</a>
    <a href = "deleteDeceased.php?deleteid='.$id.'" class="btn btn-danger"><i class="fas fa-remove mr-1"></i> Delete </a>
    </td>
</tr>';
}

?>
            </tbody>
        </table>
        <div id="" style="float:right;"> <button onclick="window.print()" class="btn btn-primary btn-sm my-3" id="print-btn">Print</button></div> 
    </div>


                </div>

            </div>

        </div>
    </div>
</body>
</html>