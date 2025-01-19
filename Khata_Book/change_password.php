<?php
require('db/connection.php');
session_start();

$message = null;
$username_error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve user input
  $user = trim($_POST['user']);
  $password = trim($_POST['password']);

  // Validate input
  if (empty($user) || empty($password)) {
    $message = "Please enter both username and password.";
  } else {
    // Database query to check user credentials
    $connection = connection();
    if (!$connection) {
      $message = "Database connection failed.";
    } else {
      // Check if the user exists with email or phone
      $query = mysqli_prepare($connection, "SELECT user_id, password_hash FROM user_emails 
                LEFT JOIN user_passwords USING (user_id) 
                WHERE email = ? OR EXISTS (
                    SELECT 1 FROM user_contacts WHERE phone = ? AND user_contacts.user_id = user_emails.user_id
                )");
      if ($query) {
        mysqli_stmt_bind_param($query, "ss", $user, $user);
        mysqli_stmt_execute($query);
        mysqli_stmt_bind_result($query, $userID, $hash);
        if (mysqli_stmt_fetch($query)) {
          // Verify password
          if (password_verify($password, $hash)) {
            // Set session variables
            $_SESSION['user_id'] = $userID;
            $_SESSION['logged_in'] = true;
            // Redirect to dashboard/home
            header('Location: index.php');
            exit();
          } else {
            $message = "Incorrect Email or Phone or Password. Please try again.";
          }
        } else {
          $message = "User not found. ";
          header('Location: register.php');
          exit();
        }
        mysqli_stmt_close($query);
      } else {
        $message = "Error: " . mysqli_error($connection);
      }
      mysqli_close($connection);
    }
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

  <title>Login</title>


  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      width: 100vw;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-form {
      width: 340px;
      margin: 50px auto;
      font-size: 15px;
    }

    .login-form form {
      margin-bottom: 15px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
      border: 1px solid #ddd;
    }

    .login-form h2 {
      color: #636363;
      margin: 0 0 15px;
      position: relative;
      text-align: center;
    }

    .login-form h2:before,
    .login-form h2:after {
      content: "";
      height: 2px;
      width: 22%;
      background: #d4d4d4;
      position: absolute;
      top: 50%;
      z-index: 2;
    }

    .login-form h2:before {
      left: 0;
    }

    .login-form h2:after {
      right: 0;
    }

    .login-form .hint-text {
      color: #999;
      margin-bottom: 30px;
      font-size: 1.5rem;
      text-align: center;
    }

    .login-form a:hover {
      text-decoration: none;
    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 2px;
    }

    .btn {
      font-size: 15px;
      font-weight: bold;
    }

    /* .btn-succ {
      color: #000000;
      background-color: #ffffff;
      border-color: #000000;
    }

    .btn-succ:hover {
      color: #ffffff;
      background-color: #000000;
      border-color: #000000;
    } */
  </style>
</head>

<body>
  <div class="login-form">
    <form action="" method="POST" autocomplete="off">
      <div class="form-group text-center">
        <img class="text-center img img-fluid avatar" src="icon/Khata.png">
      </div>
      <p class="hint-text">Login Panel</p>
      <?php if ($message): ?>
        <div class="form-group text-center">
          <h2 class="alert alert-info"><?= htmlspecialchars($message) ?></h2>
        </div>
      <?php endif; ?>
      <div class="form-group">
        <input type="text" name="user" class="form-control" placeholder="Email or Phone" required="required">
        <small id="emailHelp" class="form-text text-danger"><?= $username_error ?></small>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-dark btn-block" style="border-radius:0%;">Login</button>
      </div>
      <div class="clearfix">
        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
      </div>
      <div class="clearfix">
        <p>Don't have an account? <a href="register.php" class="text-danger">Register Here</a></p>
      </div>
    </form>
  </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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