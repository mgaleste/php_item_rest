<?php
/*
 * File : read.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the read from the database from the table Item and list them all
 *
 *
*/
    header('Access-Control-Allow-Origin : *');
    header('Content-Type : application/json');

    include_once '../../config/Database.php';
    include_once '../../model/Item.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $item = new item($DB);

    $result = $item->read();

    $number_of_rows = $result->rowCount();

    if ($number_of_rows > 0){

        $item_arr = array();

        $item_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $itemItem = array(
                'itemId' => $itemId,
                'itemName' => $itemName,
                'itemCategoryName' => $itemCategoryName
            );

            array_push($item_arr['data'],$itemItem);
        }

        echo json_encode($item_arr);

    }else{

        echo json_encode(
                array('message' => 'No Item Categories found')
        );
    
        
    }
?>
