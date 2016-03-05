<?php require ('vendor/autoload.php');

// The ID of the category to delete has to be in _GET
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    try{
        $res = \App\Factory::getDatabaseConnection()->query("DELETE FROM events WHERE id = ?",[$categoryId])->rowCount();
        if ($res == 0) {
            //Flash error
            \App\Session::getInstance()->addFlash('Aucun event à supprimer avec ce numéro','danger');
        } else {
            //Flash success
            \App\Session::getInstance()->addFlash('Event supprimé.','success');
        }
    } catch (PDOException $e) {
        //Flash error
        \App\Session::getInstance()->addFlash('Erreur dans la base de données.','danger');
    }
} else {
    // Flash : nothing happened
    \App\Session::getInstance()->addFlash('Error in parameter','danger');

}
header('Location:index.php');
exit();
