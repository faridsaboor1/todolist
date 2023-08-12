<?php
session_start() ;
date_default_timezone_set('Asia/Tehran') ;

require 'constants.php' ;
require 'config.php' ;
require BASE_PATH . 'libs/helpers_libs.php' ;
require BASE_PATH . 'libs/folder_libs.php' ;
require BASE_PATH . 'libs/tasks_libs.php' ;
require BASE_PATH . 'libs/validation_libs.php' ;
require BASE_PATH . 'vendor/autoload.php' ;

#connect to database
try {
    $pdo = new PDO( "mysql: host=$database_config->host;dbname=$database_config->dbname;charset=$database_config->charset",$database_config->user, $database_config->pass) ;
    // setMessageAndRedirect('Connection Lose !' , 'index.php') . $e->getMessage() ;
} catch (PDOException $e) {
    setMessageAndRedirect('Connection Lose !' , $e->getMessage() , 'erorr_page.php')  ;
    die();
}