<?php
include("../db/connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['username']) ? trim($_POST['username']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $confirm_password = isset($_POST['confirm-password']) ? trim($_POST['confirm-password']) : null;

    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            try {
                $conn = connection();
                $conn->beginTransaction();

                $stmt1 = $conn->prepare('SELECT * FROM todo_users WHERE email = :email');
                $stmt1->bindParam(':email', $email);
                $result = $stmt1->execute();
                if ($result === true) {
                    echo "<script>alert('Already User Registered');window.location.href='login.php'</script>";

                }

                // Password hashing for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO todo_users (username, email, password, created_at) VALUES (:username, :email, :password, NOW())");
                $stmt->bindParam(":username", $name);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $hashed_password);

                if ($stmt->execute()) {
                    $conn->commit();
                    echo "<script>alert('New record created successfully!'); window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Error creating account.');</script>";
                }
            } catch (PDOException $e) {
                $conn->rollback();
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Reuse the same styles from login form */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f2f5;
        }

        .container {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #1a73e8;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #5f6368;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #dadce0;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }

        button {
            width: 100%;
            padding: 0.7rem;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #1557b0;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
            color: #5f6368;
        }

        .login-link a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .password-requirements {
            color: #5f6368;
            font-size: 0.9rem;
            margin: 0.5rem 0;
        }

        @media (max-width: 480px) {
            .container {
                margin: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create Account</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" id="username" required name="username">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" required name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" required name="password">
                <div class="password-requirements">
                    (Must be at least 8 characters)
                </div>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" required name="confirm-password">
            </div>



            <button type="submit">Register</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>

    <script>
        function validateRegistration() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const phone = document.getElementById('phone').value;

            // Username validation
            if (username.length < 4) {
                alert('Username must be at least 4 characters');
                return false;
            }
            if (/[^a-zA-Z0-9_]/.test(username)) {
                alert('Username can only contain letters, numbers, and underscores');
                return false;
            }

            // Email validation
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            // Password validation
            if (password.length < 8) {
                alert('Password must be at least 8 characters');
                return false;
            }
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return false;
            }

            // Phone validation (optional)
            if (phone && !/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/.test(phone)) {
                alert('Please enter a valid phone number (123-456-7890)');
                return false;
            }

            // If validation passes
            alert('Registration successful!');
            return true;
        }
    </script>
</body>

</html>