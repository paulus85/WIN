<?php require ('vendor/autoload.php');

// The ID of the category to delete has to be in _GET
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    try{
        $res = \App\Factory::getDatabaseConnection()->query("DELETE FROM categories WHERE id = ?",[$categoryId])->rowCount();
        if ($res == 0) {
            //Flash error
        } else {
            //Flash success
        }
    } catch (PDOException $e) {
        //Flash error
    }
} else {
    // Flash : nothing happened
    \App\Session::getInstance()->addFlash('Error in parameter','danger');

}
header('Location:category_list.php');
exit();
