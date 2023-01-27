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

        public function addNewProduct($newProduct, $newFile) {
            $aimage = $this->uploadFile($newFile["aimage"], ['jpg', 'png', 'jpeg'], 2000000);
            if ($aimage[0] < 0) return $aimage[0];

            $query = "INSERT INTO $this->tableName VALUES (
                        '', :name, :brand, :category, :price, :seller, :image)";

            $this->db->doQuery($query);
            $this->db->bindVal('name', $newProduct["aname"]);
            $this->db->bindVal('brand', $newProduct["abrand"]);
            $this->db->bindVal('category', $newProduct["acategory"]);
            $this->db->bindVal('price', $newProduct["aprice"]);
            $this->db->bindVal('seller', $newProduct["aseller"]);
            $this->db->bindVal('image', $aimage[1]);

            $this->db->executeStatement();
            return [$this->db->rowDiffCount(), 'success'];
        }

        public function uploadFile($file, $allowedExtensions, $maxSize) {
            $fileName = $file["name"];
            $fileSize = $file["size"];
            $fileTmp = $file["tmp_name"];
    
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));

            if ( !in_array($fileExtension, $allowedExtensions) ) {
                $allowedEString = implode(", ", $allowedExtensions);
                return [-1, "Invalid Extension (only accepts $allowedEString)"];
            }
    
            if ( $fileSize > $maxSize ) {
                return [-2, "File Size is too large (maximum allowed size is $maxSize)"];
            }
    
            $fileName = str_replace("." . $fileExtension, "", $fileName);
            $fileName = substr($fileName, 0, 75) . uniqid() . '.' . $fileExtension;
    
            move_uploaded_file($fileTmp, '../public/img/' . $fileName);
            return [1, $fileName];
        }
    }
?>