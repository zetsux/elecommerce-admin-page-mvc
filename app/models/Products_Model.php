<?php 
    class Products_Model {
        private $tableName = 'products';
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllProducts() {
            $this->db->doQuery("SELECT * FROM $this->tableName ORDER BY ID ASC");
            return $this->db->fetchResults();
        }

        public function getProductById($id) {
            $this->db->doQuery("SELECT * FROM $this->tableName WHERE id=:id");
            $this->db->bindVal('id', $id);
            return $this->db->fetchResult();
        }

        public function addNewProduct($newProduct) {
            $query = "INSERT INTO $this->tableName VALUES (
                        '', :name, :brand, :category, :price, :seller, '')";

            $this->db->doQuery($query);
            $this->db->bindVal('name', $newProduct["aname"]);
            $this->db->bindVal('brand', $newProduct["abrand"]);
            $this->db->bindVal('category', $newProduct["acategory"]);
            $this->db->bindVal('price', $newProduct["aprice"]);
            $this->db->bindVal('seller', $newProduct["aseller"]);

            $this->db->executeStatement();
            return $this->db->rowDiffCount();
        }
    }
?>