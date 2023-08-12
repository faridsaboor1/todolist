<?php
// function getCurentUserId(){
//     return 1;
// }

// function getTasks() {
//     global $pdo ;
//     $user_id = getCurentUserId() ;
//     $sql = "SELECT * FROM `tasks` WHERE user_id=$user_id" ;
//     $stmt = $pdo -> prepare($sql) ;
//     $stmt->execute() ;
//     return $stmt->fetchAll() ;
// }

// function addTask(string $folder_data){
//     global $pdo ;
//     $user_id = getCurentUserId() ;
//     $sql = 'INSERT INTO `tasks`(name,user_id)VALUES(:name,:user_id) ' ;
//     $stmt = $pdo->prepare($sql) ;
//     $stmt->execute([':name'=>$folder_data['name'] , 'user_id'=>$user_id]) ;
//     return $stmt->rowCount() ? true : false;
// }

// function deleteTask(int $task_id):bool{
//     global $pdo ;
//     $sql = "DELETE  FROM `tasks` WHERE id=$task_id" ;
//     $stmt = $pdo -> prepare($sql) ;
//     $stmt->execute() ;
//     return $stmt->rowCount() ? true : false;
// }