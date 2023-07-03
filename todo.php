<?php
    require_once 'functions.php';
    date_default_timezone_set('Asia/Kolkata');
    $tasks = getAllTasks();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['addTask'])) {
            $task = $_POST['task'];
            addTask($task);
        } elseif (isset($_POST['deleteTask'])) {
            $taskIndex = $_POST['taskIndex'];
            deleteTask($taskIndex);
        } elseif (isset($_POST['updateTask'])) {
            $taskIndex = $_POST['taskIndex'];
            $updatedTask = $_POST['updatedTask'];
            updateTask($taskIndex, $updatedTask);
        }
        header('Location: todo.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Todo List</h1>
    
    <form method="post">
        <input type="text" name="task" placeholder="Enter task" required>
        <button type="submit" name="addTask">Add Task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Actions</th>
                <th>Date and time</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $index => $task) : ?>
                <tr>
                    <td><?php echo $task['task']; ?></td>
                    <td><?php echo $task['datetime']; ?></td> 
                    <td>
                        <form method="post" style="display: inline-block;">
                            <input type="hidden" name="taskIndex" value="<?php echo $index; ?>">
                            <input type="text" name="updatedTask" placeholder="Update task" required>
                            <button type="submit" name="updateTask">Update</button>
                        </form>
                        <form method="post" style="display: inline-block;">
                            <input type="hidden" name="taskIndex" value="<?php echo $index; ?>">
                            <button type="submit" name="deleteTask">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>