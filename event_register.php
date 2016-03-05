<?php
require ('vendor/autoload.php');
use App\Factory;
use App\Utils;

if(isset($_GET['id']) && isset($_POST['name'])) {
    // TODO : changer les paramètres en POST
    $name = $_POST['name'];
    $id = $_GET['id'];

    $res = Factory::getDatabaseConnection()->query("UPDATE events SET name = ? WHERE id = ?",[$name,$id])->rowCount();
// TODO
    if ($res == 0) {
        //No update done --> Flash error
        \App\Session::getInstance()->addFlash('Aucune mise à jour faite dans la base.','danger');
        header('Location:category_list.php');
    } else {
        //Update done
        // Flash ok
        \App\Session::getInstance()->addFlash('Modification enregistrée','success');
        header('Location:category_list.php');
    }
} else {
    //Flash error
    \App\Session::getInstance()->addFlash('Erreur d\'enregistrement','danger');
    header('Location:category_list.php');
}

