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
            if ($aimage[0] < 0) return $aimage;

            $query = "INSERT INTO $this->tableName VALUES (
                        '', :name, :brand, :category, :seller, :price, :image)";

            $this->db->doQuery($query);
            $this->db->bindVal('name', $newProduct["aname"]);
            $this->db->bindVal('brand', $newProduct["abrand"]);
            $this->db->bindVal('category', $newProduct["acategory"]);
            $this->db->bindVal('seller', $newProduct["aseller"]);
            $this->db->bindVal('price', $newProduct["aprice"]);
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
                $maxSize /= 1000000;
                return [-2, "File size is too large (maximum allowed size is $maxSize MB)"];
            }
    
            $fileName = str_replace("." . $fileExtension, "", $fileName);
            $fileName = substr($fileName, 0, 75) . uniqid() . '.' . $fileExtension;
    
            move_uploaded_file($fileTmp, '../public/img/' . $fileName);
            return [1, $fileName];
        }

        public function deleteProductById($id) {
            $query = "DELETE FROM $this->tableName WHERE id=:id";
            $this->db->doQuery($query);

            $this->db->bindVal('id', $id);

            $this->db->executeStatement();
            return $this->db->rowDiffCount();
        }

        public function editProduct($editedProduct, $editedFile) {
            if ($editedFile['aimage']['error'] === 4) {
                $eimage = [1, $editedProduct["aoldimg"]];
            } else {
                $eimage = $this->uploadFile($editedFile['aimage'], ['jpg', 'png', 'jpeg'], 2000000);
                if ($eimage[0] < 0) return $eimage;
            }

            $query = "UPDATE $this->tableName SET
                        name=:name, 
                        brand=:brand, 
                        category=:category, 
                        seller=:seller, 
                        price=:price, 
                        image=:image 
                    WHERE id=:id";

            $this->db->doQuery($query);
            $this->db->bindVal('name', $editedProduct["aname"]);
            $this->db->bindVal('brand', $editedProduct["abrand"]);
            $this->db->bindVal('category', $editedProduct["acategory"]);
            $this->db->bindVal('seller', $editedProduct["aseller"]);
            $this->db->bindVal('price', $editedProduct["aprice"]);
            $this->db->bindVal('image', $eimage[1]);
            $this->db->bindVal('id', $editedProduct["aid"]);

            $this->db->executeStatement();
            return [$this->db->rowDiffCount(), 'success'];
        }
    }
?>