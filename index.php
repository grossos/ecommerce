<?php
session_start();
include 'footer.php';
//include 'header.php';
if(isset($_SESSION["name"])) {
    $current_user = $_SESSION["name"];
    header("Location: home.php");
}
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
<link rel="stylesheet" href="style.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<title>Home</title>
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
          </ul>
    </div>
  </nav>
  <div class="container">
    <div class="card" style="margin-top:100px;border:none;">
      <div class="card-body">
        <div class="" style="margin-left:250px;">
        <img src="images/coffee.jpg" class="rounded-circle" style="width:340px">
        </div>
        <br>
        <div class="row">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, veniam non, nemo ipsa quibusdam expedita illum voluptate dolorum placeat laudantium dolore. 
          Consectetur facere nihil cupiditate blanditiis ipsam culpa hic impedit, maxime omnis dolores sit modi eos illo assumenda iure aperiam nemo consequatur iusto? 
          Et architecto iusto similique fugit quo exercitationem enim libero nisi sint voluptas accusantium ab nihil provident commodi, eum voluptatem alias ullam quae 
          facere laboriosam quis! Odit molestiae fugit possimus omnis, velit incidunt voluptas blanditiis laboriosam quisquam illum sed deleniti impedit consequuntur dicta 
          sint enim iure obcaecati architecto amet consectetur? Ipsa, qui porro libero neque consequuntur suscipit corporis quae atque minima ratione quo recusandae dolore 
          praesentium id similique labore error magnam aliquam quisquam dolor velit voluptatem culpa facilis inventore? Odit, laboriosam dolorum tempore ipsam autem ut aperiam 
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <form action="login.php">
              <div class="form-group">
                <h4><span>Login</span></h4>
              </div>
              <div class="form-group">
                <button class="btn btn-lg btn-info col-6">Login</button>
              </div>
            </form>
          </div>
          <div class="col-md-4">
          <form action="register.php">
              <div class="form-group">
                <h4>Create account</h4>
              </div>
              <div class="form-group">
                <button class="btn btn-lg btn-info col-6">Register</button>
              </div>
            </form>
          </div>
          <div class="col-md-4">
          <form action="admin_login.php">
              <div class="form-group">
                <h4><span class="text-secondary">Admin</span></h4>
              </div>
              <div class="form-group">
                <button class="btn btn-lg btn-secondary info col-6">Admin</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>
</html>