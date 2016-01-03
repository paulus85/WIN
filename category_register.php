<?php
require ('vendor/autoload.php');
use App\Factory;
use App\Utils;

if(isset($_GET['id']) && isset($_POST['name'])) {
    $name = $_POST['name'];
    $id = $_GET['id'];

    $res = Factory::getDatabaseConnection()->query("UPDATE categories SET name = ? WHERE id = ?",[$name,$id])->rowCount();

    if ($res == 0) {
        //No update done --> Flash error
        header('Location:category_list.php');
    } else {
        //Update done
        // Flash ok
        header('Location:category_list.php');
    }
} else {
    //Flash error
    header('Location:category_list.php');
}

