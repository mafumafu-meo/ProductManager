<?php
    class Users {
        private $username, $password;
        public function __construct($username,$password) {
            $this->username = $username;
            $this->password = $password;
        }
        public function getUsername() {return $this->username;}
        public function getPassword() {return $this->password;}
        public function setUsername($username) {$this->username = $username;}
        public function setPassword($password) {$this->password = $password;}

        public function login() {
            global $err_user, $err_pass;
            if (empty($this->username)) $err_user = "username is empty";
            if (empty($this->password)) $err_pass = "password is empty";

            // from database
            require('./library/connection.php');
            $sql = "SELECT * FROM USERS WHERE username = '$this->username' AND password = BINARY '$this->password'";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows!=0) return true;
            return false;

            // from an array
            // $list = array(
            //     'thanh' => 'thanh',
            //     'admin' => 'admin'
            // );
            // foreach ($list as $username => $password) {
            //     if ($this->username == $username && $this->password == $password) return true;
            // }
            // return false;

            // from a file
            // $file = fopen('users.txt','r') or die('Unable to open file!');
            // $list = array();
            // while(!feof($file)) {
            //     $line = fgets($file);
            //     array_push($list,array(explode('|',$line)[0],explode('|',$line)[1]));
            // }
            // fclose($file);
            // for ($i=0; $i < sizeof($list); $i++) { 
            //     if ($this->username == $list[$i][0] && $this->password == $list[$i][1]) return true;
            // }
            // return false;
        }
    }
?>