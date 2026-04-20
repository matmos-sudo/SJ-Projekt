<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('classes/db.php');
require_once ('classes/user.php');

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db_conn = $database->getConnection();

    $user = new User($db_conn);

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)) {
        $userData = $user->getUser($email);
        if($userData && password_verify($password, $userData['password'])) {
            $_SESSION['name'] = $userData['fullname'];
            $_SESSION['user_id'] = $userData['id'];
            header('Location: index.php?login=success');
            exit();
        }else{
            header('Location: login.php?login=failed');
            exit();
        }
    }else{
        header('Location: login.php?login=empty');
        exit();
    }

}

