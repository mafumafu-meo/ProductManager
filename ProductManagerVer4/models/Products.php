<?php
    class Products {
        private $productID, $productName, $description, $cost;
        public function __construct($productID,$productName,$description,$cost) {
            $this->productID = $productID;
            $this->productName = $productName;
            $this->description = $description;
            $this->cost = $cost;
        }
        public function getProductID() {return $this->productID;}
        public function getProductName() {return $this->productName;}
        public function getDescription() {return $this->description;}
        public function getCost() {return $this->cost;}
        public function setProductID($productID) {$this->productID = $productID;}
        public function setProductName($productName) {$this->productName = $productName;}
        public function setDescription($description) {$this->description = $description;}
        public function setCost($cost) {$this->cost = $cost;}
        
        public function add() {
            $conn = new PDO("mysql:host=localhost;dbname=test", "root", "") or die('Cannot connect to db');
            $stm =  $conn->prepare("INSERT INTO Products(productName,productDes,productCost) VALUE (?,?,?)");
            $data = array($this->productName, $this->description, $this->cost);
            $stm->execute($data);
            echo "success";
        }
    }
