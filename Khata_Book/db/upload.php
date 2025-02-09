<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['upload'])) {
    $uploadDir = "uploads/"; // Upload folder

    // File information
    $file = $_FILES['file']['name']; 
    $fileTmpName = $_FILES['file']['tmp_name']; 
    $fileSize = $_FILES['file']['size']; 
    $fileError = $_FILES['file']['error']; 
    $fileType = $_FILES['file']['type']; 

    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    // File type validation
    if (!in_array($fileType, $allowedTypes) || !in_array($fileExtension, $allowedExtensions)) {
        echo "<script> alert(\"Invalid file type or extension\"); window.location.href = '../profile.php'; </script>";
        exit;
    }

    // Handle file upload errors
    if ($fileError !== 0) {
        echo "<script> alert(\"Error uploading file\"); window.location.href = '../profile.php'; </script>";
        exit;
    }

    // Generating unique file name
    $uniqueFileName = uniqid("IMG_", true) . '.' . $fileExtension;
    $file_path = $uploadDir . $uniqueFileName;

    // Move uploaded file
    if (move_uploaded_file($fileTmpName, $file_path)) {
        include_once "connection.php";
        $connection = connection();
        
        $username = $_SESSION['user_id'];

        // Check if user already has a photo entry
        $queryCheck = mysqli_prepare($connection, "SELECT * FROM user_photos WHERE UserID = ?");
        mysqli_stmt_bind_param($queryCheck, "i", $username);
        mysqli_stmt_execute($queryCheck);
        $result = mysqli_stmt_get_result($queryCheck);

        if (mysqli_num_rows($result) > 0) {
            // Update existing photo
            $query = mysqli_prepare($connection, "UPDATE user_photos SET PhotoName = ?, Path = ?, UploadTime = NOW() WHERE UserID = ?");
        } else {
            // Insert new photo record
            $query = mysqli_prepare($connection, "INSERT INTO user_photos (UserID, PhotoName, Path, UploadTime) VALUES (?, ?, ?, NOW())");
        }

        mysqli_stmt_bind_param($query, "ssi", $uniqueFileName, $file_path, $username);
        mysqli_stmt_execute($query);

        if (mysqli_affected_rows($connection) > 0) {
            echo "<script> alert(\"File uploaded successfully\"); window.location.href = '../profile.php'; </script>";
        } else {
            echo "<script> alert(\"Database update failed\"); window.location.href = '../profile.php'; </script>";
        }

    } else {
        echo "<script> alert(\"Failed to upload file\"); window.location.href = '../profile.php'; </script>";
    }
}
?>
