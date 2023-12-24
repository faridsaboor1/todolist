<?php
require 'bootstrap/init.php' ;

if (isset($_GET['update_task']) && is_numeric($_GET['update_task'])) {
    $task_data = getTaskById($_GET['update_task']) ?? null;
    $task_id = $_GET['update_task'] ?? null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['upTitle'];
    updateTask($task_id,$title) ;    
    header('Location: '. 'http://start/git%20hub/2project/todolist/');     
}

require 'tpl/update_tpl.php' ;