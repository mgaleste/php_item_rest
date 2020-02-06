<?php
/*
 * File : ItemCategory.php
 * Author : Michael Angelo T. Galeste
 * Class Name : Database
 * Definition : Class for defining the ItemCategory methods
 *
 *
*/
    class ItemCategory{
        private $conn;
        private $db_table = 'itemCategory';

        public $itemCategoryId;
        public $itemCategoryName;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT itemCategoryId, itemCategoryName FROM " . $this->db_table. " ORDER BY itemCategoryId";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function read_single(){
            $query = "SELECT itemCategoryId, itemCategoryName FROM " . $this->db_table. " WHERE itemCategoryId = ?";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1,$this->itemCategoryId);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->itemCategoryId = $row['itemCategoryId'];
            $this->itemCategoryName = $row['itemCategoryName'];
        }

        public function create(){
            $query = "INSERT INTO " . $this->db_table. " SET itemCategoryName = :itemCategoryName ";

            $stmt = $this->conn->prepare($query);

            $this->itemCategoryName = htmlspecialchars(strip_tags($this->itemCategoryName));

            $stmt->bindParam(':itemCategoryName',$this->itemCategoryName);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function update(){
            $query = "UPDATE " . $this->db_table. " SET itemCategoryName = :itemCategoryName where itemCategoryId= :itemCategoryId";

            $stmt = $this->conn->prepare($query);

            $this->itemCategoryName = htmlspecialchars(strip_tags($this->itemCategoryName));
            $this->itemCategoryId = htmlspecialchars(strip_tags($this->itemCategoryId));

            $stmt->bindParam(':itemCategoryName',$this->itemCategoryName);
            $stmt->bindParam(':itemCategoryId',$this->itemCategoryId);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function delete(){
            $query = "DELETE FROM " . $this->db_table. " where itemCategoryId= :itemCategoryId";

            $stmt = $this->conn->prepare($query);

            $this->itemCategoryId = htmlspecialchars(strip_tags($this->itemCategoryId));

            $stmt->bindParam(':itemCategoryId',$this->itemCategoryId);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }

?>
