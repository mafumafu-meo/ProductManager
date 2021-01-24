<?php
    class Products {
        private $name,$image,$price;
        public function __construct($name,$image,$price) {
            $this->name = $name;
            $this->image = $image;
            $this->price = $price;
        }
        public function getName() { return $this->name; }
        public function getImage() { return $this->image; }
        public function getPrice() { return $this->price; }
        public function setName($name) { $this->name = $name;}
        public function setImage($image) { $this->image = $image;}
        public function setPrice($price) { $this->price = $price;}
        
        public function add() {
            $conn = new PDO("mysql:host=localhost;dbname=test", "root", "") or die('Cannot connect to db');
            $stm =  $conn->prepare("INSERT INTO Products(name,image,price) VALUE (?,?,?)");
            $data = array($this->name,$this->image,$this->price);
            $stm->execute($data);
            header("location: ../index.php");
        }
    }
