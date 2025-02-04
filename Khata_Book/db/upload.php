<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['upload'])) {
    $uploadDir = "uploads/"; //upload folder ka path

    // file ka information jo server se aaya hai

    $file = $_FILES['file']['name']; // file ka name  
    $fileTmpName = $_FILES['file']['tmp_name']; // file ka temporary path
    $fileSize = $_FILES['file']['size']; // file ka size
    $fileError = $_FILES['file']['error']; // file ka error
    $fileType = $_FILES['file']['type']; // file ka type
    echo $fileType;

    $allowedTypes = array('image/jpeg', 'image/png', 'image/jpg');
    $allowedExtensions = array('jpg', 'jpeg', 'png');
    $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedTypes) || !in_array($fileExtension, $allowedExtensions)) {
        echo "Invalid file type or extension";
    }

    if ($fileError === 0) {
        $file_path = "uploads/" . basename($file); // file path

        if (move_uploaded_file($fileTmpName, $file_path)) {
            include_once "connection.php";
            $connection = connection();
            $username = $_SESSION['user_id'];
            echo $username;
            $query = mysqli_prepare($connection, "update user_photos set PhotoName = ?, Path = ?, UploadTime = NOW() where UserID = ?");
            mysqli_stmt_bind_param($query, "ssi", $file, $file_path, $username);
            mysqli_stmt_execute($query);
            if (mysqli_affected_rows($connection) > 0) {
                $file_message = "File uploaded successfully";
                header("Location: ../profile.php");
            }

        } else {
            $file_message = "Failed to upload file";
        }
    } else {
        $file_message = "Error uploading file";
    }



}
?>