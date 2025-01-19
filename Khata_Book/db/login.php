<?php
function login($email, $password)
{
    include_once "connection.php";
    $connection = connection(); 

    if ($connection) {
        if (empty($email) || empty($password)) {
            echo "Email and Password are required!";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format!";
            return;
        }

        $query = mysqli_prepare($connection, "SELECT UserID FROM user_emails WHERE Email = ?");
        if ($query) {
      
            mysqli_stmt_bind_param($query, "s", $email);
            mysqli_stmt_execute($query);
            mysqli_stmt_bind_result($query, $user_id, $user_name, $hashed_password);

            if (mysqli_stmt_fetch($query)) {
                // Verify the password
                if (password_verify($password, $hashed_password)) {
                    // Password matches, login successful
                    session_start();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;

                    echo "Login successful! Welcome, " . $user_name;
                } else {
                    echo "Invalid password!";
                }
            } else {
                echo "No user found with this email!";
            }

            mysqli_stmt_close($query);
        } else {
            echo "Failed to prepare the statement: " . mysqli_error($connection);
        }

        // Close the connection
        mysqli_close($connection);
    } else {
        echo "Database connection failed.";
    }
}
?>
