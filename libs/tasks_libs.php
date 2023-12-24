<?php

function getTasks() {
    global $pdo ;

    $folder = $_GET['folder_id'] ?? null ;
    $folderCondition = '' ;

    if (isset($folder) and is_numeric($folder) and $folder!=0) {
        $folderCondition = "AND folder_id=$folder" ;
    }

    $user_id = getCurentUserId() ;
    $sql = "SELECT * FROM `tasks` WHERE user_id=:user_id $folderCondition" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute([':user_id'=>$user_id]) ;
    return $stmt->fetchAll() ;
}

function addTask(string $task_title, $folder_id):bool{
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = 'INSERT INTO `tasks`(title,user_id,folder_id)VALUES(:title,:user_id,:folder_id) ' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute([':title'=>$task_title, 'user_id'=>$user_id , ':folder_id' => $folder_id]) ;
    return $stmt->rowCount() ? true : false;
}

function deleteTask(int $task_id):bool{
    global $pdo ;
    $sql = "DELETE  FROM `tasks` WHERE id=:id" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute([':id'=>$task_id]) ;
    return $stmt->rowCount() ? true : false;
}

function doneSwitch(int $taskId):bool{
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = "UPDATE `tasks` SET is_done = 1-is_done WHERE user_id=:user_id AND id=:id" ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute([':id'=>$taskId,':user_id'=>$user_id]) ;
    return $stmt->rowCount() ? true : false ;
}

function updateTask(int $taskId , $title){
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = "UPDATE `tasks` SET title=:title WHERE id=:id" ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute([':title'=>$title,':id'=>$taskId]) ;
    return $stmt->rowCount() ? true : false ;
}

function getTaskById(int $id){
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = "SELECT * FROM `tasks` WHERE id=:id" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute([':id'=>$id]) ;
    return $stmt->fetch(PDO::FETCH_OBJ) ;
}