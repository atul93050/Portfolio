<?php
session_start();
$user = $_SESSION['user'];
if ($user){
   $user_id = $user['user_id'];

} else {
    header('Location: login.php');
    exit;
}
$user_id = $user['user_id'];
include "../db/connection.php";
$conn = connection();

// Delete task
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM todo_tasks WHERE task_id = :id AND user_id = :user_id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
}

// Add task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['task_name']) && !empty($_POST['due_date'])) {
        $stmt = $conn->prepare("INSERT INTO todo_tasks (user_id, task_name, due_date) VALUES (:user_id, :task_name, :due_date)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':task_name', $_POST['task_name']);
        $stmt->bindParam(':due_date', $_POST['due_date']);
        $stmt->execute();
    }
}

// Fetch all tasks
$stmt = $conn->prepare("SELECT * FROM todo_tasks WHERE user_id = :user_id ORDER BY task_id ASC");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    <main>
        <h1>Todo List</h1>
        <h3><?php echo "Welcome, " . $user['username'] . "!" ?></h3>
        <form method="POST">
            <input type="text" name="task_name" placeholder="Task Name" required>
            <input type="date" name="due_date" required>
            <button type="submit" class="add-button">Add</button>
            <button type="reset" class="reset-button">Reset</button>
        </form>

        <div class="todo-list">
            <?php if ($tasks): ?>
                <?php foreach ($tasks as $task): ?>
                    <div class="todo-item">
                        <span><?php echo htmlspecialchars($task['task_name']); ?> (<?php echo htmlspecialchars($task['due_date']); ?>)</span>
                        <div class="todo-actions">
                            <a class="update-button" href="update.php?id=<?php echo $task['task_id']; ?>">Update</a>
                            <a class="delete-button" href="to_do.php?id=<?php echo $task['task_id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #888;">No tasks found. Add your first task!</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
