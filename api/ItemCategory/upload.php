<?php
/*
 * File : read.php
 * Author : Michael Angelo T. Galeste
 *
 * Definition : File that will handle the upload of a csv file into the database to the table Item Categories
 *
 *
*/
    header('Access-Control-Allow-Origin : *');

    include_once '../../config/Database.php';
    include_once '../../model/ItemCategory.php';

    $database = new Database();
    $DB = $database->dbConnect();

    $itemCategory = new ItemCategory($DB);

    if (isset($_FILES['csv']) && $_FILES['csv']['error']==0){
        $ext = strtolower(end(explode('.',$_FILES['csv']['name'])));
        $filename = $_FILES['csv']['name'];
        $type = $_FILES['csv']['type'];
        $tmpname = $_FILES['csv']['tmp_name'];

        set_time_limit(0);

        if($ext=='csv'){
           if(($handle = fopen($tmpname,'r')) !== FALSE ){
               while(($data = fgetcsv($handle, 1000, ',')) !== FALSE){
                  $itemCategory->itemCategoryName=$data[0];

                   $itemCategory->create();

               }
           }
        }
        
        echo "<script type='text/javascript'>window.location.href='http://localhost/php_item_rest/list_category.html'</script>";
    }else{
        echo json_encode(
                array('message' => 'No Item Categories found')
        );
       

    }

    
?>
