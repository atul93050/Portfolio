<?php
require('db/connection.php'); // Make sure connection.php is included
include_once "db/register.php";

$message = null;

$email_error = null;
$phone_error = null;
$password_error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST['firstname']);
    $lname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);


    // email phone empty check
    if (empty($email)) {
        $email_error = "Email are required";
    }
    //phone empty check
    if (empty($phone)) {
        $phone_error = "Phone No. are required";
    }
    // password match
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $password)) {
        $password_error = "Password should be 8+ characters with letters, numbers, and symbols.";
    } else {
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
    <meta name="author" content="Atul Verma">
    <title>Khata Book - Register Here</title>
    <link rel="icon" type="image/x-icon" href="icon/Khata.png">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #4f46e5;
            --accent: #8b5cf6;
            --background: #f8fafc;
            --text: #1e293b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            display: grid;
            place-items: center;
            margin: 0;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            padding: 2.5rem;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-card:hover {
            transform: translateY(-5px);
        }

        .brand-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo {
            width: auto;
            height: 100px;
            margin-bottom: 1rem;
            filter: drop-shadow(0 4px 6px rgba(79, 70, 229, 0.15));

        }

        .form-label {
            color: var(--text);
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
            background: #fff;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .input-icon {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .password-strength {
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
            position: relative;
        }

        .strength-bar {
            height: 100%;
            width: 0;
            background: var(--primary);
            transition: all 0.3s ease;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(79, 70, 229, 0.2);
        }

        .terms-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: grid;
            place-items: center;
        }

        .custom-checkbox.checked {
            background: var(--primary);
            border-color: var(--primary);
        }

        .checkmark {
            color: white;
            font-size: 0.9rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        .input-group.error .form-input {
            border-color: #ef4444;
        }

        .input-group.error .error-message {
            display: block;
        }

        .social-auth {
            margin-top: 2rem;
            text-align: center;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            background: #fff;
            color: var(--text);
            border: 1px solid #e2e8f0;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div class="glass-card">
        <div class="brand-section">
            <img src="icon/Khata.png" alt="Khata Book" class="brand-logo">
            <h1 class="h3 mb-3">Create Your Account</h1>
            <p class="text-muted">Start managing your transactions efficiently</p>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= htmlspecialchars($message) ?>
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <form action="" method="POST" autocomplete="off">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-input" placeholder="John" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-input" placeholder="Doe" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="john@example.com" required>
                <i class="fas fa-envelope input-icon"></i>
                <div class="error-message"><?= htmlspecialchars($email_error) ?></div>
            </div>

            <div class="input-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-input" placeholder="+91 98765 43210" required>
                <i class="fas fa-phone input-icon"></i>
                <div class="error-message"><?= htmlspecialchars($phone_error) ?></div>
            </div>

            <div class="input-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required
                    onkeyup="checkPasswordStrength(this.value)">
                <i class="fas fa-lock input-icon"></i>
                <div class="password-strength">
                    <div class="strength-bar"></div>
                </div>
                <div class="error-message"><?= htmlspecialchars($password_error) ?></div>
            </div>

            <div class="input-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-input" placeholder="••••••••" required>
                <i class="fas fa-lock input-icon"></i>
            </div>

            <div class="terms-container">
                <div class="custom-checkbox" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                </div>
                <span>I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#"
                        class="text-primary">Privacy Policy</a></span>
            </div>

            <button type="submit" class="submit-btn">
                Create Account <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </form>

        <div class="social-auth">
            <p class="text-muted my-3">Or continue with</p>
            <div class="d-flex justify-content-center">
                <button class="social-btn">
                    <i class="fab fa-google mr-2"></i> Google
                </button>
                <button class="social-btn">
                    <i class="fab fa-facebook mr-2"></i> Facebook
                </button>
            </div>
        </div>

        <p class="text-center mt-4">Already have an account?
            <a href="login.php" class="text-primary font-weight-bold">Sign In</a>
        </p>
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
    function checkPasswordStrength(password) {
        const strengthBar = document.querySelector('.strength-bar');
        let strength = 0;

        // Criteria checks
        if (password.length >= 8) strength++;
        if (password.match(/[A-Z]/)) strength++;
        if (password.match(/[a-z]/)) strength++;
        if (password.match(/[0-9]/)) strength++;
        if (password.match(/[^A-Za-z0-9]/)) strength++;

        const width = (strength / 5) * 100;
        strengthBar.style.width = `${width}%`;

        // Color transition
        strengthBar.style.backgroundColor =
            strength >= 4 ? '#10b981' :
                strength >= 2 ? '#f59e0b' :
                    '#ef4444';

        // Add smooth transition
        strengthBar.style.transition = 'all 0.3s ease';
    }

    // Checkbox Toggle Function
    function toggleCheckbox(checkbox) {
        checkbox.classList.toggle('checked');
        const checkmark = checkbox.querySelector('.checkmark');
        checkmark.style.opacity = checkbox.classList.contains('checked') ? '1' : '0';
    }
</script>

</html>