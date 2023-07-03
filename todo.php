<?php 

   require_once 'functions.php';

    if($_SERVER['REQUEST_METHOD']=== 'POST')
      {
        if(isset($_POST['task']))
          {
             $task = $_POST['task'];
             addtask($task);
          }
        if(isset($_POST['delete']))
        {
          $taskdel = $_POST['delete'];
          deletetask($taskdel);
        }
      }
    $tasks = gettask();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todod list</title>
</head>
<body>
<h1>TODO LIST</h1>
<form action="todo.php" method="post" >
    <div>
    <input type="text" name="task" placeholder="Enter a task">
    </div>
    <div>
    <input type="number" name="delete" placeholder="Enter task ID to delete">
    </div>
    <br>
    <button type="submit">Add task</button> 
</form>

<?php if (empty($tasks)): ?>
    <p>No tasks available yet.</p>
<?php else: ?>
        <?php foreach ($tasks as  $index => $task): ?>
            <li><?= "Task.$index: ".$task ?></li>
        <?php endforeach; ?>
<?php endif; ?>

</body>
</html>

