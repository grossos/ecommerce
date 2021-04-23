<?php
    session_start();
    include 'footer.php';
    include 'db.php';
    //include 'header.php';

    if(!isset($_SESSION["admin"])){
        header("Location: index.php");
    }
    else $admin = $_SESSION["admin"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <title>Admin Page</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Coffee E-Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="#">Terms</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php" style="margin-left:1200px;border-style:solid;border-width:1px;border-radius:10px;">Log out</a>
            </li>
        </ul>
        </div>
    </nav>
<div class="container" style="width:900px; background-color:white; border-radius:25px;">  
    
    <div class="row" id="row_details">
        <div class="col">
            <div class="row">
                <h3 style="text-align:center" class="center">Orders Completed from users</h3>  
                <div class="table-responsive">  
                    <table class="table table-striped"> 
                        <thead>  
                            <tr>  
                                <th width="10%">Id</th>  
                                <th width="30%">User</th>
                                <th width="45%">Products</th> 
                                <th width="10">Total</th>  
                                <th width="5%"></th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "Select * from orders";
                            $result = mysqli_query($conn, $query);
                            if(!$result){
                                echo 'Error';
                            }
                            else{
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                        <td>{$row['order_id']}</td>
                                        <td>{$row['order_user']}</td>
                                        <td>{$row['items']}</td>
                                        <td>{$row['order_total']}</td>\n";
                                }
                            }
                            ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>   
    </div>
</body>
</html>