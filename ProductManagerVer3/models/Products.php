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
        
        public function addToFile() {
            global $err_name, $err_des, $err_cost;
            $check_data = true;
            if (empty($this->productName)) {
                $err_name = 'Product Name must not be empty';
                $check_data = false;
            }
            if (empty($this->description)) {
                $err_des = 'Product Description must not empty';
                $check_data = false;
            }
            if (empty($this->cost)) {
                $err_cost = 'Product Cost must not be empty';
                $check_data = false;
            }

            if ($check_data) {
                $read = file('../products.txt');
                $sum = 1000 + sizeof($read);
                $file = fopen("../products.txt","a");
                fputs($file,"\n".$sum.'|'.$this->productName.'|'.$this->description.'|'.$this->cost);
                fclose($file);
                echo "<h1>Success</h1>";
            } else {
                echo "<h1>Pless fill out all of field!</h1>";
            }
        }
    }
