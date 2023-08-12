<?php

function siteUrl(string $url = ''):string{
    return BASE_URL . $url ;
}


function redirect(string $target = BASE_URL):void{
    header("Location:" .  $target) ;
    die();
}

function setMessageAndRedirect(string $message , string $erorr = null , string $target):void{
    $_SESSION['error'] = $message . '(' .  $erorr   .  ')';
    redirect( siteUrl($target) ) ;
}

function setMessage( $message):void{
    $_SESSION['error'] = $message ;
}

function dd($message){
    echo "<pre>" ;
    print_r($message) ;
    echo "</pre>" ;
}