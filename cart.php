<?php   
    session_start();
    //include 'header.php';
    include 'db.php';
    include 'footer.php';

$products = '';

    if(!isset($_SESSION["name"])){
        header("Location: index.php");
    }
    else{
        $user = $_SESSION["name"];
        if(isset($_POST["add_to_cart"]))  
        {  
            if(isset($_SESSION["shopping_cart"]))  
            {  
                $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
                if(!in_array($_GET["id"], $item_array_id))  
                {  
                        $count = count($_SESSION["shopping_cart"]);  
                        $item_array = array(  
                            'item_id' => $_GET["id"],  
                            'item_name' => $_POST["hidden_name"],  
                            'item_price' => $_POST["hidden_price"],  
                            'item_quantity' => $_POST["quantity"]
                        );  
                        $_SESSION["shopping_cart"][$count+1] = $item_array;
                }  
                else  
                {  
                        $count = count($_SESSION["shopping_cart"]);  
                        $item_array = array(  
                            'item_id' => $_GET["id"],  
                            'item_name' => $_POST["hidden_name"],  
                            'item_price' => $_POST["hidden_price"],  
                            'item_quantity' => $_POST["quantity"]
                        );  
                        $_SESSION["shopping_cart"][$count+1] = $item_array;
                    //echo '<script>alert("Item Already Added")</script>';  
                }  
            }  
            else  
            {  
                $item_array = array(  
                    'item_id' => $_GET["id"],  
                    'item_name' => $_POST["hidden_name"],  
                    'item_price' => $_POST["hidden_price"],  
                    'item_quantity' => $_POST["quantity"]
                );  
                $_SESSION["shopping_cart"][0] = $item_array;  
            }  
        }  
        if(isset($_GET["action"]))  
        {  
            if($_GET["action"] == "delete")  
            {  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                {  
                        if($values["item_id"] == $_GET["id"])  
                        {  
                            unset($_SESSION["shopping_cart"][$keys]);  
    
                        }  
                }  
            }  
            else if($_GET["action"] == "order")  
            { 
                if(isset($_SESSION["total"]) && isset($_SESSION["products"])){
                    $total = $_SESSION["total"];
                    $products = $_SESSION["products"];
                    $query = "INSERT INTO orders(order_user, order_total, items) VALUES ('$user', '$total', '$products')";
                    if(mysqli_query($conn, $query)){
                        echo "<script>alert('Your order recorded successfully');</script>"; 
                        //echo ("<script>window.location.href='home.php';</script>");     
                        $total = 0;
                        unset($_SESSION["shopping_cart"]);
                        
                    }  
                    else{ 
                        echo "<script>alert('Error');</script>";
                    }
                    
                }
            }
        }           
    }  
    
 ?>  
 <!DOCTYPE html>  
 <html>  
<head>  
    <title>Products</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
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
    <br>  

    <div class="container" style="width:900px; background-color:white; border-radius:25px;">  
    
        <div class="row" id="row_details">
            <div class="col">
                <h3 style="text-align:center">Order Details</h3>  
                <div class="table-responsive">  
                    <table class="table table-striped">  
                        <tr>  
                            <th width="40%">Product Name</th>  
                            <th width="10%">Quantity</th>  
                            <th width="20%">Price</th>  
                            <th width="15%">Current Total</th>  
                            <th width="5%"></th>  
                        </tr>  
                        <?php   
                        if(!empty($_SESSION["shopping_cart"]))  
                        {  
                            $total = 0;  
                            foreach($_SESSION["shopping_cart"] as $keys => $values)  
                            {  
                        ?>  
                        <tr>  
                            <td><?php echo $values["item_name"]; ?></td>  
                            <td><?php echo $values["item_quantity"]; ?></td>  
                            <td>$ <?php echo $values["item_price"]; ?></td>  
                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                            <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><i class="fas fa-times"></i></span></a></td>  
                        </tr>  
                        <?php  
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                $_SESSION["total"] = $total;
                                $products .=  " " .$values["item_name"]. "->" .$values["item_quantity"];
                                $_SESSION["products"] = $products;
                            }  
                        ?>  
                         
                        <tr>  
                            <td colspan="3" ><h4>Total</h6></td>  
                            <td><h4>$ <?php echo number_format($total, 2); ?></h4></td>  
                            <td></td>  
                        </tr>  
                        
                        <?php  
                        }  
                        ?>       
                    </table>  
                    <input type="hidden" id="total" name="total2" value="<?php echo $total; ?>" />
                    <a href="cart.php?action=order" class="text-decoration-none"><input type="submit" id="order" class="btn btn-info btn-block col-12" style="margin-top:5px;border-radius:100px;" value="Order" /></a>
                    <br>
                </div>
            </div>
            <div class="container">
                <center>
                    <a href="home.php"><input type="submit" style="margin-top:5px; border-radius:100px;" class="btn btn-secondary col-6" style="border-radius:100px" value="<< Add more products" /></a>
                </center>
        </div>
        <div class="text-primary" id="info"></div>
    </div>
</body>  
</html>