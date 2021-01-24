<?php
    class Admins{
        private $username,$password;
        public function __construct($username,$password) {
            $this->username = $username;
            $this->password = $password;
        }
        public function getUsername() {return $this->username;}
        public function getPassword() {return $this->password;}
        public function checkLogin() {
            $conn = new PDO('mysql:host=localhost;dbname=test','root','') or die('Cannot connect to db');
            $stm = $conn->prepare ("SELECT * FROM Admins WHERE username='$this->username' AND password= BINARY '$this->password'");
            $stm->execute();
            return ($stm->rowCount!==0);
        }
    }
?>