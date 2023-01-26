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
    }
?>