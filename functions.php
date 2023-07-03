<?php
    function getAllTasks() {
        $tasks = [];

        if (file_exists('tasks.json')) {
            $tasksJson = file_get_contents('tasks.json');
            $tasks = json_decode($tasksJson, true);
        }

        return $tasks;
    }

    function addTask($task) {
        $tasks = getAllTasks();
        $tasks[] = $task;
        saveTasks($tasks);
    }

    function deleteTask($taskIndex) {
        $tasks = getAllTasks();
        if (isset($tasks[$taskIndex])) {
            unset($tasks[$taskIndex]);
            saveTasks($tasks);
        }
    }

    function updateTask($taskIndex, $updatedTask) {
        $tasks = getAllTasks();
        if (isset($tasks[$taskIndex])) {
            $tasks[$taskIndex] = $updatedTask;
            saveTasks($tasks);
        }
    }

    function saveTasks($tasks) {
        $tasksJson = json_encode($tasks, JSON_PRETTY_PRINT);
        file_put_contents('tasks.json', $tasksJson);
    }

?>