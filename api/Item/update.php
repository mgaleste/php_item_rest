<?php
/*
 * File : update.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the update of Item Cateogory and save it into the database into the table Item Categories
 *
*/
    header('Access-Control-Allow-Origin : *');
    header('Content-Type : application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../model/Item.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $item = new item($DB);

    $data = json_decode(file_get_contents("php://input"));

    $item->itemName = $data->itemName;
    $item->itemCategoryId = $data->itemCategoryId;
    $item->itemId = $data->itemId;

    if($item->update()){
        echo json_encode(
                array('message' => 'Item Updated')
        );
    }else{
       echo json_encode(
                array('message' => 'Item Not Updated')
        );
    }
?>
