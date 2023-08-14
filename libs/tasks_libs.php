<?php

function getTasks() {
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = "SELECT * FROM `tasks` WHERE user_id=:user_id" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute([':user_id'=>$user_id]) ;
    return $stmt->fetchAll() ;
}

function addTask(string $task_data){
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = 'INSERT INTO `tasks`(name,user_id)VALUES(:name,:user_id) ' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute([':name'=>$task_data['name'] , 'user_id'=>$user_id]) ;
    return $stmt->rowCount() ? true : false;
}

function deleteTask(int $task_id):bool{
    global $pdo ;
    $sql = "DELETE  FROM `tasks` WHERE id=:id" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute([':id'=>$task_id]) ;
    return $stmt->rowCount() ? true : false;
}