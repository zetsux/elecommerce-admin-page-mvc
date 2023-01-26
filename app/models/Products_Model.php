<?php 
    class Products_Model {
        private $dbHandler;
        private $statement;

        public function __construct() {
            $dataSourceName = 'mysql: host=localhost; dbname=phplearn';

            try {
                $this->dbHandler = new PDO($dataSourceName, 'root', '');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAllProducts() {
            $this->statement = $this->dbHandler->prepare('SELECT * FROM products');
            $this->statement->execute();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>