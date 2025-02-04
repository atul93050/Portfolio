<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    try {
        $conn = connection();
        $conn->beginTransaction(); 

        $sql = "INSERT INTO port_messages (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            $conn->commit();
           json_encode(["status" => "success", "message" => "Message Sent Successfully!"]);
        } else {
            $conn->rollBack();
           json_encode(["status" => "error", "message" => "Error: Unable to send message."]);
        }

    } catch (PDOException $e) {
        $conn->rollBack();
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
}
?>
