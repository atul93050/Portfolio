<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$user_id = $user['user_id'];

include "../db/connection.php";
$conn = connection();

// Fetch task details
if (isset($_GET['id'])) {  // 'task_id' ko 'id' se replace kiya
    $stmt = $conn->prepare("SELECT * FROM todo_tasks WHERE task_id = :task_id AND user_id = :user_id");
    $stmt->bindParam(':task_id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $task = $stmt->fetch();

    if (!$task) {
        header("Location: to_do.php");
        exit();
    }
} else {
    header("Location: to_do.php");
    exit();
}

// Update task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE todo_tasks SET task_name = :task_name, due_date = :due_date WHERE task_id = :task_id AND user_id = :user_id");
    $stmt->bindParam(':task_name', $_POST['task_name']);
    $stmt->bindParam(':due_date', $_POST['due_date']);
    $stmt->bindParam(':task_id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        header("Location: to_do.php");
        exit();
    } else {
        echo "Task update failed!";
    }
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
            <input type="text" name="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>" required>
            <input type="date" name="due_date" value="<?php echo htmlspecialchars($task['due_date']); ?>" required>
            <button type="submit">Update</button>
            <button type="reset">Reset</button>
        </form>
    </main>
</body>
</html>
