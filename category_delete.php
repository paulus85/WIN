<?php require ('vendor/autoload.php');

// The ID of the category to delete has to be in _GET
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    try{
        $res = \App\Factory::getDatabaseConnection()->query("DELETE FROM categories WHERE id = ?",[$categoryId])->rowCount();
        if ($res == 0) {
            //Flash error
            echo "no";
        } else {
            //Flash success
            header('Location:category_list.php');
        }
    } catch (PDOException $e) {
        //Flash error
        echo "event existe";
        die();
    }
} else {
    // Flash : nothing happened
    echo "nothing";
}