<?php
require '../bootstrap/init.php' ;

if (!issAjaxRequest()) {
    echo 'erorr to ajax !' ;
    die() ;
}

if(!isset($_POST['action']) && empty($_POST['action'])){
    echo 'erorr to ajax !' ;
    die() ;
}

switch ($_POST['action']) {
    case 'addFolder':
        $folder_name = $_POST['folderName'] ;
        if (!isset($folder_name) || empty($folder_name)) {
            echo 'please chose name folder and enter !' ;
            die() ;
        }
        echo addFolder($folder_name) ;
        break;
    case 'addTask':
        $task_name = $_POST['taskTitle'] ;
        $folder_id = $_POST['folderId'] ;
        // validation folder id
        if (!isset($folder_id) || empty($folder_id)) {
            echo 'please chose folder !' ;
            die() ;
        }
        //  validation task name
        if (!isset($task_name) || empty($task_name)) {
            echo 'please enter to title task !' ;
            die() ;
        }
        //  query add task to database
        echo addTask($task_name,$folder_id) ;
        break;
    default:
        echo 'invalid action !' ;
        die() ;
        break;
}
