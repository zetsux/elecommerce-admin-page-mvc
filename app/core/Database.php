<?php 
    class Database {
        private $host = DB_HOST;
        private $uname = DB_UNAME;
        private $pass = DB_PWD;
        private $dbName = DB_NAME;

        private $dbHandler;
        private $statement;

        public function __construct() {
            $dataSourceName = "mysql: host=$this->host; dbname=$this->dbName";

            // Database Configuration Parameter
            $option = [
                // To stabilize the connection 
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                // Error mode as exception
            ];

            try {
                $this->dbHandler = new PDO($dataSourceName, $this->uname, $this->pass, $option);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function doQuery($query) {
            $this->statement = $this->dbHandler->prepare($query);
        }

        // Bind/clean value
        public function bindVal($param, $value, $type=NULL) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                        break;
                    
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;

                    default :
                        $type = PDO::PARAM_STR;
                }
            }

            $this->statement->bindValue($param, $value, $type);
        }

        public function fetchResults() {
            $this->executeStatement();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function fetchResult() {
            $this->executeStatement();
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        }

        public function executeStatement() {
            $this->statement->execute();
        }

        public function rowDiffCount() {
            return $this->statement->rowCount();
        }
    }
?>