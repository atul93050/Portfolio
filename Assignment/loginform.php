<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
      
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            color: #333;
        }

        header,
        footer {
            background-color: rgba(0, 0, 0, 0.1);
            color: white;
            text-align: center;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        header h1,
        footer p {
            margin: 0;
            font-size: 1.5rem;
        }

        .form-container {
            background: white;
            max-width: 400px;
            margin: 30px auto;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #2575fc;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-container input[type="checkbox"] {
            margin-right: 10px;
        }

        .form-container label {
            font-size: 0.9rem;
            color: #555;
        }

        .form-container input[type="submit"],
        .form-container input[type="reset"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 600;
        }

        .form-container input[type="submit"] {
            background: #6a11cb;
            color: white;
            transition: background 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background: #2575fc;
        }

        .form-container input[type="reset"] {
            background: #ddd;
            color: #333;
            transition: background 0.3s;
        }

        .form-container input[type="reset"]:hover {
            background: #ccc;
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .form-container a:hover {
            color: #6a11cb;
        }

       
        @media (max-width: 600px) {
            .form-container {
                width: 90%;
                padding: 20px;
            }

            header h1,
            footer p {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <h1>Login Form</h1>
    </header>

    <!-- Login Form -->
    <div class="form-container">
        <h2>Login</h2>
        <form action="#" method="post">
            <input type="text" placeholder="Enter your name" required>
            <input type="password" placeholder="Enter your password" required>
            <div>
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
            <a href="#">Forgot Password?</a>
            <a href="#">Sign Up Now</a>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Designed By Atul Verma. All rights reserved.</p>
    </footer>
</body>

</html>
