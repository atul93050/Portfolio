<?php
include("../db/connection.php");

// Fetch task details
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM todo_table WHERE Sno = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC) ;
}
else{
    $task = null;
    header("Location: to_do.php");
}

// Update task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE todo_table SET Name = :name, Date = :date WHERE Sno = :id");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':date', $_POST['date']);
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();

    header("Location: to_do.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Todo</title>
  <style>
     body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
        }

        main {
            width: 90%;
            max-width: 400px;
            background: #ffffff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 1.8em;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="date"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .update-button {
            background-color: #007bff;
            color: #fff;
        }

        .update-button:hover {
            background-color: #0056b3;
        }

        .reset-button {
            background-color: #6c757d;
            color: #fff;
        }

        .reset-button:hover {
            background-color: #5a6268;
        }
  </style>
</head>
<body>
    <main>
        <h1>Update Task</h1>
        <form method="POST">
            <input type="text" name="name" value="<?php echo htmlspecialchars($task['Name'] ?? null); ?>" required>
            <input type="date" name="date" value="<?php echo htmlspecialchars($task['date'] ?? null); ?>" required>
            <button type="submit" class="update-button">Update</button>
            <button type="reset" class="reset-button">Reset</button>
        </form>
    </main>
</body>
</html>
