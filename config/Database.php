<?php
/*
 * File : Database.php
 * Author : Michael Angelo T. Galeste
 * Class Name : Database
 * Definition : Class for connecting to the database using PDO
 *
 * 
*/
    class Database {

        private $host = 'localhost';
        private $db_name = 'item_rest';
        private $db_user = 'root';
        private $db_password = 'mixerwars';
        private $conn;

        public function dbCzonnect(){
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host='. $this->host . ';dbname='. $this->db_name, $this->db_user, $this->db_password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Connection Error: '. $e->getMessage();
            }

            return $this->conn;
        }

    }


?>
