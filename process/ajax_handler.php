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
        echo addFolder($folder_name) ;
        break;
    case 'addTask':
        $task_name = $_POST['taskName'] ;
        echo addTask($task_name) ;
        break;
    default:
        echo 'invalid action !' ;
        die() ;
        break;
}
