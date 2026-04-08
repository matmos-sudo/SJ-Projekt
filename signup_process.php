<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = htmlspecialchars(strip_tags($_POST['fullname']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if(empty($fullname) || empty($email) || empty($password)) {
        echo '<div class="alert alert-danger">Error: Please fill in all your fields.</div>';
    }

    $file = 'data/data.json';

    if(file_exists($file)){
        $json = file_get_contents($file);
        $data = json_decode($json, true);
    }else{
        $data = array();
    }

    foreach($data as $key){
        if($key['email'] == $email){
            echo '<div class="alert alert-danger">Error: Email already exists.</div>';
            return;
        }
    }

    $new = array(
        "fullname" => $fullname,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)
    );
    $data[] = $new;

    if(file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))){
        echo'<div class="alert alert-success">Registration successful! <a>Login here</a></div>';
    }else {
        echo '<div class="alert alert-danger">Error: Could not save your data.</div>';
    }
}