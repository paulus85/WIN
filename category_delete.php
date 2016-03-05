<?php require ('vendor/autoload.php');

// The ID of the category to delete has to be in _GET
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    try{
        $res = \App\Factory::getDatabaseConnection()->query("DELETE FROM categories WHERE id = ?",[$categoryId])->rowCount();
        if ($res == 0) {
            //Flash error
            \App\Session::getInstance()->addFlash('Aucune catégorie à supprimer avec ce numéro','danger');
        } else {
            //Flash success
            \App\Session::getInstance()->addFlash('Catégorie supprimée.','success');
        }
    } catch (PDOException $e) {
        //Flash error
        \App\Session::getInstance()->addFlash('Erreur dans la base de données. Vérifiez en particulier si un événement ne subsiste pas avec cette catégorie.','danger');
    }
} else {
    // Flash : nothing happened
    \App\Session::getInstance()->addFlash('Error in parameter','danger');

}
header('Location:category_list.php');
exit();
