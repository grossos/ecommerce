<?php
    session_start();
    include 'header.php';
    include 'db.php';
    include 'footer.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<title>Login</title>
</head>
<body>
<div class="container">
    <div class="card" style="margin-top: 100px;">
        <div class="card-body">
            <form action="admin_login.php" method="post" enctype="multipart/form-data" >
                <div class="form-group">
        	        <h2>Admin Login</h2>
                </div>
                <div class="form-group col-4">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Username" required="required">
                </div>
                <div class="form-group col-4">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <label>Show password</label> <input type='checkbox' id='check'/>
                </div>
                <div class="form-group">
                    <button type="submit" name="admin_login" class="btn btn-success btn col-4">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
           
</body>
</html>

<?php
    if(isset($_POST['admin_login']))
    {     
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql=mysqli_query($conn,"SELECT * FROM admin where username='$name'");
        $row  = mysqli_fetch_array($sql);
        if(is_array($row))
        {
            $_SESSION["admin"] = $row['username'];
            header("Location: admin.php"); 
        }
        else echo "<script>alert('Invalid credentials');</script>";
    }

?>