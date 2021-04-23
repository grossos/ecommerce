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
<link rel="stylesheet" href="assests/css/style.css">
<link rel="stylesheet" href="style.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<title>Register</title>
</head>
<body>
    <div class="container">
        <div class="card" style="margin-top: 100px;">
            <div class="card-body">
                <form action="register.php" method="post" enctype="multipart/form-data">
                    <h2>Register</h2>
                    <p class="hint-text">Create your account</p>
                    
                    <div class="form-group col-4">
                        <label>Username</label><span id="error-name"></span>
                        <input type="test" class="form-control" name="name" id="name" placeholder="username" required="required">
                    </div>
                    <div class="form-group col-4">
                        <label>Email</label><span id="error-email"></span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com" required="required">
                    </div>
                    <div class="form-group col-4">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" required="required">
                    </div>
                    <div class="form-group col-4">
                        <label>Confirm password</label><span id="error-password"></span>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="type given password" required="required">
                    </div>
                    <div class="form-group col-4">
                    <?php if( isset($eror_msg) && $eror_msg != '' ) { echo $eror_msg; } ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-info col-4">Register Now</button>
                    </div>
                    <div class="form-group">Already have an account? <a href="login.php">Sign in</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    $passwordError = '';
    
    // register user / input validation
    if (isset($_POST['register'])) {
        
        
        // receive all input values from the form
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "SELECT * FROM users  WHERE username ='$username'";
        $result = mysqli_query($conn, $query); // here $dbc is your mysqli $link
        
        if(mysqli_num_rows($result)>=1){
            echo "<script>alert('Name alredady exists');</script>";
        }
    
        else if($password != $password2){
            echo "<script>alert('Passwords dont match');</script>";
        }
        else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,60}$/', $password)) {
            echo "<script>alert('Password has to contain least 8 characters numbers and letters');</script>";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
          }
        else{
            // Attempt insert query execution
            $sql = "INSERT INTO users(username, email, password)  VALUES ('$username', '$email', '$hash')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Successful registration');</script>";;
               // header("Location: login.php"); fix this
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
    }