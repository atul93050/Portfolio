<?php
require('db/connection.php'); // Make sure connection.php is included
include_once "db/register.php";

$message = null;

$email_error=null;
$phone_error=null;
$password_error=null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST['firstname']);
    $lname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    

    // email phone empty check
    if(empty($email)){
        $email_error="Email are required";
    }
    //phone empty check
    if(empty($phone)){
        $phone_error="Phone No. are required";
    }
    // password match
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    }
   
   elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $password)) {
        $password_error = "Password should be 8+ characters with letters, numbers, and symbols.";
    }
    
    else {
        $message = registeration($fname, $lname, $email, $phone, $password);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Khata Book - Register Here</title>
    <link rel="icon" type="image/x-icon" href="icon/Easy.png">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            color: #000;
            background: #fff;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 39px;
            position: relative;
            text-align: center;
            font-size: 1.5rem;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            font-size: 1.5rem;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 23px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.3);
            padding: 30px;
            border: 1px solid #ddd;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 14px;
            font-weight: bold;

        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-form">
        <form action="" method="POST" autocomplete="off">
            <div class="form-group text-center">
                <img class="text-center img img-fluid avatar" src="icon/Khata.png">
            </div>
            <h2>Register Here</h2>

            <?php if ($message): ?>
                <div class="form-group text-center">
                    <h2 class="alert alert-info"><?= htmlspecialchars($message) ?></h2>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">

                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" name="email" required>
                <small id="emailHelp" class="form-text text-danger"><?= htmlspecialchars($email_error) ?></small>

            </div>

            <!-- <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div> -->

            <div class="form-group">
                <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required="required">
                <small id="phonelHelp" class="form-text text-danger"><?= $phone_error?></small>

            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                <small id="PasswordHelp" class="form-text text-danger"><?= $password_error?></small>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>

            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#" class="text-danger">Terms of Use</a> &amp; <a href="#" class="text-danger">Privacy Policy</a></label>
            </div>

            <div class="form-group d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-success">SUBMIT</button>
                <button type="reset" class="btn btn-link" style="border-radius:0%;">Clear All</button>
            </div>
        </form>

        <div class="text-center">Already have an account? <a class="text-danger" href="login.php">Login Here</a></div>
    </div>
</body>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Croppie -->
<script src="js/profile-picture.js"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    feather.replace()
</script>

</html>