<?php
require('db/connection.php');
include_once "Captcha/captcha_keys.php";
include_once "Captcha/verify.php";
session_start();
$message = null;
$username_error = null;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!verify_captcha()) {
    $message = "Captcha verification failed. Please try again.";
  }

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

      $query = mysqli_prepare($connection, "SELECT ue.UserID, up.Password_Hash 
     FROM user_emails ue
     LEFT JOIN user_passwords up ON ue.UserID = up.UserID
     LEFT JOIN user_contacts uc ON ue.UserID = uc.UserID
     WHERE ue.Email = ? OR uc.Phone = ?");
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
          echo "<script>alert('User not found')</script> ";

          echo "<meta http-equiv=\"refresh\" content=\"2;url=register.php\">";

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
  <meta name="title" content="Secure Login | Khata Book Digital Ledger Management">
  <meta name="description"
    content="Securely access your Khata Book digital ledger account. Manage your business transactions and financial records with our optimized login interface.">
  <meta name="robots" content="noindex, follow">
  <meta name="author" content="Atul-Verma">

  <title>Khata Book - Login</title>
  <link rel="icon" type="image/x-icon" href="icon/Khata.png">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
 <style>
    :root {
            --primary-color: #4f46e5;
            --hover-color: #3b3f9a;
            --background-gradient: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-gradient);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            display: block;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0a0a0;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 0.75rem;
            font-weight: 500;
            border-radius: 8px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--hover-color);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
        }

        .g-recaptcha {
            margin: 1rem 0;
        }

        .footer-links {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        .footer-links a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--hover-color);
            text-decoration: underline;
        }
 </style>
</head>

<body>
<div class="login-card">
        <img src="icon/Khata.png" alt="Khata Book Logo" class="brand-logo">
        <h3 class="text-center mb-4">Welcome Back! 👋</h3>

        <?php if ($message): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($message) ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <form action="login.php" method="POST" autocomplete="off">
            <div class="form-group">
                <div class="position-relative">
                    <input type="text" name="user" class="form-control" placeholder="Email or Phone" required>
                    <i class ="fas fa-user input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <div class="position-relative">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="<?= $SITE_KEY ?>"></div>
            </div>

            <div class="form-group d-flex justify-content-between align-items-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="text-muted small">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="submit">
                Sign In <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </form>

        <div class="footer-links mt-4">
            <p class="mb-2">Don't have an account? <a href="register.php">Create Account</a></p>
            <p class="mb-0">© 2023 Khata Book. All rights reserved.</p>
        </div>
    </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script type="text/javascript">
  var onloadCallback = function () {
    grecaptcha.render('html_element', {
      '<?php echo $SECRET ?>': '<?php echo $SITE_KEY ?>'
    });
  };
</script>
<script>
  feather.replace()
</script>

</html>