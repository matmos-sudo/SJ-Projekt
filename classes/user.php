<?php
class User{
    private $db;
    private $table_name = 'udaje';

    public function __construct($conn){
        $this->db = $conn;
    }
    public function Register($fullname, $email, $password){
        $sql = "INSERT INTO " . $this->table_name . " (fullname, email, password) VALUES (:fullname, :email, :password)";
        $stmt = $this->db->prepare($sql);

        $fullname = htmlspecialchars(strip_tags($fullname));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $hashed_pswd = password_hash($password, PASSWORD_DEFAULT);

        try{
            return $stmt->execute([
                'fullname' => $fullname,
                'email' => $email,
                'password' => $hashed_pswd
            ]);
        }catch(PDOException $e){
            return false;
        }

    }
}
