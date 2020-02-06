<?php
/*
 * File : create.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the creation of Item Category and save it into the database into the table Item Categories
 *
*/
    header('Access-Control-Allow-Origin : *');
    header('Content-Type : application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../model/ItemCategory.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $itemCategory = new ItemCategory($DB);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $itemCategory->itemCategoryName = $data->itemCategoryName;

    if($itemCategory->create()){
        echo json_encode(
                array('message' => 'Item Category Created')
        );
    }else{
       echo json_encode(
                array('message' => 'Item Category Not Created')
        );
    }
?>
