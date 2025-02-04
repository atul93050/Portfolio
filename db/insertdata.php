<?php
include("connection.php");

function insertData($name, $email, $phone, $message, $rememberMe) {
    try {
        $conn = connection(); // DB Connection

        // 🔥 Transaction Start
        $conn->beginTransaction();

        // 📝 Query Prepare
        $sql = "INSERT INTO contact_messages (name, email, phone, message, remember_me) 
                VALUES (:name, :email, :phone, :message, :remember_me)";
        
        $stmt = $conn->prepare($sql);

        // 🏷️ Bind Parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':remember_me', $rememberMe, PDO::PARAM_BOOL);

        // ✅ Execute Query
        if ($stmt->execute()) {
            // 🎯 Transaction Commit (If everything is OK)
            $conn->commit();
            return "✅ Message Sent Successfully!";
        } else {
            // ❌ Transaction Rollback (If something goes wrong)
            $conn->rollBack();
            return "❌ Error: Unable to send message.";
        }

    } catch (PDOException $e) {
        // ❌ Rollback on Exception
        $conn->rollBack();
        return "❌ Error: " . $e->getMessage();
    }
}
?>
