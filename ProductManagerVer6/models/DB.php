<?php
class DB {
    const DB_NAME = 'test';
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';

    protected $conn;
    public function __construct() {
        $this->conn = new PDO(
            'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,
            self::DB_USERNAME,
            self::DB_PASSWORD
        ) or die('Cannot connect to db');
        return $this->conn;
    }

    function getPDO() { return $this->conn; }
    function close() { $this->conn = null; }

    function getAll($table) {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array('name'=>'a'));
        return $stmt->fetchAll();
    }
    
    
}
