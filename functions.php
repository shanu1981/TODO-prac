<?php 

   function gettask()
   {
      $tasks = [];
      if(file_exists('tasks.json'))
      {
        $tasks = json_decode(file_get_contents('tasks.json'));
      }
      return $tasks;
   }

   function addtask($task)
   {
     $tasks = gettask();
     $tasks[] = $task;
     file_put_contents('tasks.json',json_encode($tasks));
   }

   function saveTask($tasks)
   {
       $json = json_encode($tasks, JSON_PRETTY_PRINT);
       file_put_contents('tasks.json', $json);
   }

   function deletetask($taskdel)
   {
     $tasks=gettask();
     if(isset($tasks[$taskdel]))
     {    
      unset($tasks[$taskdel]);
      saveTask($tasks);
     }
   }


