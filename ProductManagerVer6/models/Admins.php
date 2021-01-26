<?php
    class Admins{
        private $id,$username,$password;
        public function __construct($username,$password) {
            $this->username = $username;
            $this->password = $password;
        }
        public function getUsername() {return $this->username;}
        public function getPassword() {return $this->password;}
        
        public function checkLogin() {
            require_once('../models/DB.php');
            $db = new DB();
            $stm = $db->getPDO()->prepare ("SELECT * FROM admins WHERE username='$this->username' AND password= BINARY '$this->password'");
            $stm->execute();
            return (sizeof($stm->fetchAll()) !== 0);
        }
    }
?>