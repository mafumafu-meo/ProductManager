<?php
    class Products {
        private $id, $name, $description, $image, $price;

        public function __construct($name,$description,$image,$price) {
            $this->name = $name;
            $this->description = $description;
            $this->image = $image;
            $this->price = $price;
        }

        public function getName() { return $this->name; }
        public function getDescription() { return $this->description; }
        public function getImage() { return $this->image; }
        public function getPrice() { return $this->price; }
        public function setName($name) { $this->name = $name;}
        public function setDescription($description) { $this->description = $description;}
        public function setImage($image) { $this->image = $image;}
        public function setPrice($price) { $this->price = $price;}

        public function add() {
            $db = new DB();
            $stmt = $db->getPDO()->prepare("insert into products(name,description,image,price) value (?, ?, ?, ?)");
            $data = array($this->name, $this->description, $this->image, $this-> price);
            $stmt->execute($data);
        }
    }
?>