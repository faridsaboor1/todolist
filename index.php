<?php
// link bank page
require 'bootstrap/init.php' ;


// delete folder
if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $folder_id = $_GET['delete_folder'] ;
    deleteFolder($folder_id) ;
    echo 'folder succesfully DELETED !' ;
}
// query find folder data
$folder_data = getFolders() ;
// tmplate index page
require 'tpl/index_tpl.php' ;