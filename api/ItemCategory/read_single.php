<?php
/*
 * File : read_single.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the read from the database from the table Item Categories and return a single value base on
 * the id from the GET method
 *
*/
    header('Access-Control-Allow-Origin : *');
    header('Content-Type : application/json');

    include_once '../../config/Database.php';
    include_once '../../model/ItemCategory.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $itemCategory = new ItemCategory($DB);

    $itemCategory->itemCategoryId = (isset($_GET['id'])) ? $_GET['id'] : die();

    $itemCategory->read_single();

    $itemCategory_arr = array(
        'itemCategoryId' => $itemCategory->itemCategoryId,
        'itemCategoryName' => $itemCategory->itemCategoryName
    );

    print_r(json_encode($itemCategory_arr));
?>
