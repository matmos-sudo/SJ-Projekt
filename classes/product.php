<?php
require_once"classes/db.php";

class Product extends Database{
    private $db_conn;

    public function __construct(){
        $this->db_conn = $this->getConnection();
    }

    public function getProducts(){
        $sql = "SELECT * FROM products";
        $stmt = $this->db_conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}