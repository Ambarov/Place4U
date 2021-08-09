<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Homepage.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: Homepage.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <style>
        .row a span{
            width: 100px;
            border-radius: 10px;
            font-size: 2.5em;
            padding: 5px;
        }
        .container{
            max-width: 500px;
            padding: 50px;

        }
        .border{
            border-radius: 50px;
        }
        hr{
            width: 95%;
            border: 0.3px solid lightslategrey;
            opacity: 0.4;
        }

        .cl{
            padding: 0 5px!important;
        }

        .form-control{
            width: 94%;
            display: inline;
        }

        .btn{
            background-color: white;
            color: #007bff;
            font-size: 1.3em;
        }

        .btn:hover{
            background-color: #007bff;
            color: white;
            border: 3px solid deepskyblue;
            transition: 0.3s;
        }
    </style>

</head>
<body>
<br><br>
<div class="container border border-warning">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><span style="color: gray">Place4U</span> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="text-center"><span style="color: grey;">Login or </span><span style="color: orangered;"><a href="register.php">Sign up</a></span></h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 col-sm-6">
            <a href="https://www.facebook.com"><span class="text-white text-center fa fa-facebook" style="background-color: royalblue"></span></a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="https://www.twitter.com"><span class="text-white text-center fa fa-twitter" style="background-color: deepskyblue"></span></a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="https://www.instagram.com"><span class="text-white text-center fa fa-instagram" style="background-color: orangered"></span> </a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-5 cl">
            <hr>
        </div>
        <div class="col-2 cl">
            <p class="text-secondary text-center" style="font-size: 1.3em;">or</p>
        </div>
        <div class="col-5 cl">
            <hr>
        </div>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <span class="fa fa-user"></span>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>        </div>
        <div class="row">
            <hr>
        </div>
        <div class="form-group">
            <span class="fa fa-key"></span>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>        </div>
        <div class="row">
            <hr>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block"><span class="fa fa-sign-in"></span><input type="submit" class="btn btn-primary" value="Login"></button>
            <div class="row">
                <div class="col-md-4">
                    <a href="reset-password.php"><span class="text-warning text-right" style="font-size: 12px;">Forgot password?</span></a>
                </div>
            </div>
        </div>
        <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>
    </form>
</div>
</body>
</html>


