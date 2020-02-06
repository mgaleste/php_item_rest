<?php
/*
 * File : Item.php
 * Author : Michael Angelo T. Galeste
 * Class Name : Database
 * Definition : Class for defining the Item methods
 *
 *
*/
    class Item{
        private $conn;
        private $db_table = 'item';

        public $itemId;
        public $itemName;
        public $itemCategoryName;
        public $itemCategoryId;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
           $query = "SELECT
                i.itemId itemId,
                i.itemName itemName,
                i.itemCategoryId itemCategoryId,
                ic.itemCategoryName itemCategoryName
                FROM " . $this->db_table. " i INNER JOIN itemCategory ic on i.itemCategoryId=ic.itemCategoryId ORDER BY i.itemId";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function read_single(){
            $query = "SELECT
                i.itemId itemId,
                i.itemName itemName, 
                i.itemCategoryId itemCategoryId, 
                ic.itemCategoryName itemCategoryName
                FROM " . $this->db_table. " i INNER JOIN itemCategory ic on i.itemCategoryId=ic.itemCategoryId WHERE i.itemId = ?";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1,$this->itemId);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->itemId = $row['itemId'];
            $this->itemName = $row['itemName'];
            $this->itemCategoryId = $row['itemCategoryId'];
            $this->itemCategoryName = $row['itemCategoryName'];
        }

        public function create(){
            $query = "INSERT INTO " . $this->db_table. " SET itemName = :itemName,  itemCategoryId = :itemCategoryId";

            $stmt = $this->conn->prepare($query);

            $this->itemName = htmlspecialchars(strip_tags($this->itemName));
            $this->itemCategoryId = htmlspecialchars(strip_tags($this->itemCategoryId));

            $stmt->bindParam(':itemName',$this->itemName);
            $stmt->bindParam(':itemCategoryId',$this->itemCategoryId);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function update(){
            $query = "UPDATE " . $this->db_table. " SET itemName = :itemName,  itemCategoryId = :itemCategoryId where itemId= :itemId";

            $stmt = $this->conn->prepare($query);

            $this->itemName = htmlspecialchars(strip_tags($this->itemName));
            $this->itemCategoryId = htmlspecialchars(strip_tags($this->itemCategoryId));
            $this->itemId = htmlspecialchars(strip_tags($this->itemId));

            $stmt->bindParam(':itemName',$this->itemName);
            $stmt->bindParam(':itemCategoryId',$this->itemCategoryId);
            $stmt->bindParam(':itemId',$this->itemId);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function delete(){
            $query = "DELETE FROM " . $this->db_table. " where itemId= :itemId";

            $stmt = $this->conn->prepare($query);

            $this->itemId = htmlspecialchars(strip_tags($this->itemId));

            $stmt->bindParam(':itemId',$this->itemId);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }

?>
