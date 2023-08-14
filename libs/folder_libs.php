<?php
function getCurentUserId(){
    return 1;
}

function getFolders() {
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = "SELECT * FROM `folders` WHERE user_id=:user_id" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute([':user_id'=>$user_id]) ;
    return $stmt->fetchAll() ;
}

function addFolder(string $folder_data):bool{
    global $pdo ;
    $user_id = getCurentUserId() ;
    $sql = 'INSERT INTO `folders`(name,user_id)VALUES(:name,:user_id) ' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute([':name'=>$folder_data, 'user_id'=>$user_id]) ;
    return $stmt->rowCount() ? true : false;
}

function deleteFolder(int $folder_id):bool{
    global $pdo ;
    $sql = "DELETE  FROM `folders` WHERE id=$folder_id" ;
    $stmt = $pdo -> prepare($sql) ;
    $stmt->execute() ;
    return $stmt->rowCount() ? true : false;
}