<?php
/*
 * File : read.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the read from the database from the table Item Categories and list them all
 *
 *
*/
    header('Access-Control-Allow-Origin : *');
    header('Content-Type : application/json');

    include_once '../../config/Database.php';
    include_once '../../model/ItemCategory.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $itemCategory = new ItemCategory($DB);

    $result = $itemCategory->read();

    $number_of_rows = $result->rowCount();

    if ($number_of_rows > 0){

        $itemCategory_arr = array();

        $itemCategory_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $itemCategoryItem = array(
                'itemCategoryId' => $itemCategoryId,
                'itemCategoryName' => $itemCategoryName
            );

            array_push($itemCategory_arr['data'],$itemCategoryItem);
        }

        echo json_encode($itemCategory_arr);

    }else{

        echo json_encode(
                array('message' => 'No Item Categories found')
        );
    
        
    }
?>
