<?php
include("../db/connection.php");

// Delete task
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM todo_table WHERE Sno = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
}

// Add task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['date'])) {
        $stmt = $conn->prepare("INSERT INTO todo_table (Name, Date) VALUES (:name, :date)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':date', $_POST['date']);
        $stmt->execute();
    }
}

// Fetch all tasks
$stmt = $conn->prepare("SELECT * FROM todo_table ORDER BY Sno ASC");
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
   <style>
     body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #e3f2fd; /* Light blue background for a refreshing look */
}

main {
    width: 90%;
    max-width: 700px;
    background: #ffffff; /* White card-like container */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); /* Softer shadow for depth */
    border-radius: 12px;
    padding: 25px;
    margin: 20px;
}

h1 {
    text-align: center;
    font-size: 2em;
    color: #37474f; /* Dark slate for elegance */
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-wrap: wrap; /* Allows form to wrap on smaller screens */
    gap: 15px;
    margin-bottom: 20px;
}

input[type="text"],
input[type="date"] {
    flex: 1;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #b0bec5; /* Subtle border */
    border-radius: 8px;
    transition: all 0.3s ease;
}

input[type="text"]:focus,
input[type="date"]:focus {
    border-color: #1e88e5; /* Blue accent on focus */
    outline: none;
    box-shadow: 0 0 5px rgba(30, 136, 229, 0.5);
}

button {
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.add-button {
    background-color: #43a047; /* Vibrant green */
    color: #fff;
}

.add-button:hover {
    background-color: #388e3c;
}

.reset-button {
    background-color: #757575; /* Neutral gray */
    color: #fff;
}

.reset-button:hover {
    background-color: #616161;
}

.todo-list {
    border-top: 2px solid #1e88e5; /* Strong blue accent */
    padding-top: 20px;
}

.todo-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px;
    border-bottom: 1px solid #eceff1; /* Light separator */
    transition: background-color 0.3s ease;
}

.todo-item:hover {
    background-color: #f5f5f5; /* Light hover effect */
}

.todo-item:last-child {
    border-bottom: none;
}

.todo-item span {
    font-size: 16px;
    color: #455a64; /* Darker gray for better visibility */
}

.todo-actions a {
    text-decoration: none;
    margin: 0 5px;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    transition: all 0.3s ease;
}

.delete-button {
    background-color: #e53935; /* Brighter red */
}

.delete-button:hover {
    background-color: #d32f2f;
}

.update-button {
    background-color: #1e88e5; /* Consistent with the accent color */
}

.update-button:hover {
    background-color: #1565c0;
}

.no-tasks {
    text-align: center;
    color: #90a4ae; /* Muted gray-blue */
    font-size: 16px;
    margin-top: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        flex-direction: column; /* Stack form elements vertically on smaller screens */
    }

    .todo-item {
        flex-direction: column; /* Stack items on smaller screens */
        align-items: flex-start;
        gap: 8px;
    }

    .todo-actions a {
        padding: 10px 12px;
        font-size: 14px;
    }
}

   </style>
</head>
<body>
    <main>
        <h1>Todo List</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Task Name" required>
            <input type="date" name="date" required>
            <button type="submit" class="add-button">Add</button>
            <button type="reset" class="reset-button">Reset</button>
        </form>

        <div class="todo-list">
            <?php if ($tasks): ?>
                <?php foreach ($tasks as $task): ?>
                    <div class="todo-item">
                        <span><?php echo htmlspecialchars($task['Name']); ?> (<?php echo htmlspecialchars($task['date']); ?>)</span>
                        <div class="todo-actions">
                            <a class="update-button" href="update.php?id=<?php echo $task['Sno']; ?>">Update</a>
                            <a class="delete-button" href="to_do.php?id=<?php echo $task['Sno']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
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
