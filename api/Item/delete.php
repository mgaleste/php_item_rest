<?php
/*
 * File : delete.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the delete of Item and save it into the database into the table Item
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

    $item->itemId = $data->itemId;

    if($item->delete()){
        echo json_encode(
                array('message' => 'Item Deleted')
        );
    }else{
       echo json_encode(
                array('message' => 'Item Not Deleted')
        );
    }
?>
