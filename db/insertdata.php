<?php
include("connection.php");
function insertdata($name, $phone, $email, $message)
{
    $conn = connection();
    $sql = "INSERT INTO tablename (name, phone, email, message) VALUES (:name, :phone, :email, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }


}

