<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('classes/db.php');
require_once ('classes/user.php');

$message ="";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db_conn = $database->getConnection();

    $user = new User($db_conn);

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($name) && !empty($email) && !empty($password)){
        if($user->Register($name, $email, $password)){
            header("location: signup.php?status=success");
            exit();
        }else{
            header("location: signup.php?status=error");
            exit();
        }
    }else{
        header("location: signup.php?status=error&msg=empty");
        exit();
    }

}
