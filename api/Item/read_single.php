<?php
/*
 * File : read_single.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the read from the database from the table Item and return a single value base on
 * the id from the GET method
 *
*/
    header('Access-Control-Allow-Origin : *');
    header('Content-Type : application/json');

    include_once '../../config/Database.php';
    include_once '../../model/Item.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $item = new item($DB);

    $item->itemId = (isset($_GET['id'])) ? $_GET['id'] : die();

    $item->read_single();

    $item_arr = array(
        'itemId' => $item->itemId,
        'itemName' => $item->itemName,
        'itemCategoryName' => $item->itemCategoryName,
        'itemCategoryId' => $item->itemCategoryId
    );

    print_r(json_encode($item_arr));
?>
