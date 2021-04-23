<?php
  include 'footer.php';
  include 'db.php';
  session_start();
  if(!isset($_SESSION["name"])){
      header("Location: index.php");
      
  }
  else $user = $_SESSION["name"];
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<link rel="stylesheet" href="style.css">

 



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<title>Home</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">Coffee E-Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="badge bg-info text-wrap mt-2" style="width:100px;">Welcome <?php echo $user ?></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="cart.php" style="border-style:solid;border-width:1px;border-radius:25px; margin-left:20px;">Cart<i class="fas fa-shopping-cart"></i></a> <!-- font not working -->
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php" style="margin-left:1200px;border-style:solid;border-width:1px;border-radius:10px;">Log out</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="container" style="width:900px; background-color:#f1f1f1; border-radius:25px;margin-bottom:100px;">
  <h3 style="text-align:center">Products</h3><br>
    <div class="row">
        <?php  
        $query = "SELECT * FROM products ORDER BY id ASC";  
        $result = mysqli_query($conn, $query);  
        if(mysqli_num_rows($result) > 0)  
        {  
                while($row = mysqli_fetch_array($result))  
                {  
        ?>
        <div class="col-md-4">  
                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">  
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" text-align="center">  
                        <br />
                        <img src="<?php echo $row["image"]; ?>" alt="" class="center" style="width:120px;height:120px;border-radius:40px;">  
                        <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                        <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                        <span class="text-secondary">Quantity</span><input type="text" name="quantity" class="form-control" value="1" />  
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                        <input type="submit" name="add_to_cart" id="product" style="margin-top:5px;" class="btn btn-info" value="Add to Cart" />  
                    </div>  
                </form>  
        </div>
        <?php   
                }  
        }  
        ?>  
      </div>    
  </div>
</body>
</html>
