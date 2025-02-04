<?php

function registeration($fname, $lname, $email, $phone, $password)
{
    include_once "connection.php";
    $connection = connection();
    if (!$connection) {
        return "Database connection failed. Please try again later.";
    }

    if ($connection) {
        $checkEmailQuery = mysqli_prepare($connection, "SELECT 1 FROM user_emails WHERE Email = ?");
        if (!$checkEmailQuery) {
            return "Error checking email: " . mysqli_error($connection);
        }
        mysqli_stmt_bind_param($checkEmailQuery, "s", $email);
        mysqli_stmt_execute($checkEmailQuery);
        mysqli_stmt_store_result($checkEmailQuery);

        // If email already exists, return an error message
        if (mysqli_stmt_num_rows($checkEmailQuery) > 0) {
            mysqli_stmt_close($checkEmailQuery);
            return "This email is already registered. Please use a different email. ";
        }

        mysqli_stmt_close($checkEmailQuery);
        mysqli_begin_transaction($connection);

        try {
            // Insert into user_details
            $query1 = mysqli_prepare($connection, "INSERT INTO user_details (FirstName, LastName, RegisteredOn) VALUES (?, ?, NOW())");
            if (!$query1) {
                throw new Exception('Query preparation failed: ' . mysqli_error($connection));
            }
            mysqli_stmt_bind_param($query1, "ss", $fname, $lname);
            mysqli_stmt_execute($query1);

            // Get the last inserted userID (auto-increment)
            $userID = mysqli_insert_id($connection);

            // Insert into user_contact
            $query2 = mysqli_prepare($connection, "INSERT INTO user_contacts (UserID, Phone) VALUES (?, ?)");
            if (!$query2) {
                throw new Exception('Query preparation failed: ' . mysqli_error($connection));
            }
            mysqli_stmt_bind_param($query2, "is", $userID, $phone);
            mysqli_stmt_execute($query2);

            // Insert into user_email
            $query3 = mysqli_prepare($connection, "INSERT INTO user_emails (UserID, Email) VALUES (?, ?)");
            if (!$query3) {
                throw new Exception('Query preparation failed: ' . mysqli_error($connection));
            }
            mysqli_stmt_bind_param($query3, "is", $userID, $email);
            mysqli_stmt_execute($query3);

            // Insert into user_password
            $query4 = mysqli_prepare($connection, "INSERT INTO user_passwords (UserID, Password_Hash) VALUES (?, ?)");
            if (!$query4) {
                throw new Exception('Query preparation failed: ' . mysqli_error($connection));
            }
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            mysqli_stmt_bind_param($query4, "is", $userID, $hashed_password);
            mysqli_stmt_execute($query4);


            // Insert into user balance
            $query5 = mysqli_prepare($connection, "INSERT INTO user_balance (UserID) VALUES (?)");
            mysqli_stmt_bind_param($query5, "i", $userID);
            mysqli_stmt_execute($query5);
            if (!mysqli_stmt_execute($query5)) {
                throw new Exception('Error inserting user balance: ' . mysqli_stmt_error($query5));
            }
            $photoName = "prof.png";
            $photoPath = "uploads/profile_default.png";
            $query6 = mysqli_prepare($connection, 'insert into user_photos(UserID,PhotoName,Path,UploadTime) values (?,?,?,NOW())');
            mysqli_stmt_bind_param($query6, "iss", $userID, $photoName, $photoPath);
            mysqli_stmt_execute($query6);


            // Check if all queries executed successfully:
            if (
                mysqli_stmt_affected_rows($query1) > 0 &&
                mysqli_stmt_affected_rows($query2) > 0 &&
                mysqli_stmt_affected_rows($query3) > 0 &&
                mysqli_stmt_affected_rows($query4) > 0 &&
                mysqli_stmt_affected_rows($query5) > 0 &&
                mysqli_stmt_affected_rows($query6) > 0

            ) {
                // If everything is successful:
                mysqli_commit($connection);
                // Close the prepared statements only after they are all executed successfully
                mysqli_stmt_close($query1);
                mysqli_stmt_close($query2);
                mysqli_stmt_close($query3);
                mysqli_stmt_close($query4);
                mysqli_stmt_close($query5);
                mysqli_stmt_close($query6);
                mysqli_close($connection);
                return "User registered successfully!";


            } else {
                mysqli_rollback($connection);
                // Close the prepared statements if any query failed
                if (isset($query1))
                    mysqli_stmt_close($query1);
                if (isset($query2))
                    mysqli_stmt_close($query2);
                if (isset($query3))
                    mysqli_stmt_close($query3);
                if (isset($query4))
                    mysqli_stmt_close($query4);
                if (isset($query5))
                    mysqli_stmt_close($query5);
                if (isset($query6))
                    mysqli_stmt_close($query6);
                mysqli_close($connection);
                return "Error in registration!";
            }
        } catch (Exception $e) {
            mysqli_rollback($connection);
            // Close the prepared statements in case of error
            if (isset($query1))
                mysqli_stmt_close($query1);
            if (isset($query2))
                mysqli_stmt_close($query2);
            if (isset($query3))
                mysqli_stmt_close($query3);
            if (isset($query4))
                mysqli_stmt_close($query4);
            if (isset($query5))
                mysqli_stmt_close($query5);
            if (isset($query6))
            mysqli_stmt_close($query6);
        
            mysqli_close($connection);
            return "Query failed: " . $e->getMessage();
        }
    } else {
        return "Database connection failed.";
    }
}
