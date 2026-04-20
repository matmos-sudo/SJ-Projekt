<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

function checkLogin(){
    if(!isset($_SESSION['name'])){
        header('Location: login.php');
        exit();
    }
}