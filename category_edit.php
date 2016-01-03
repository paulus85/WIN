<?php
require ('vendor/autoload.php');
use App\Utils;
use App\Factory;



// Editing a category requires to have a category id in GET array
$categoryId = $_GET['categoryid'];
if($categoryId) {
    $categoryId = $_GET['categoryid'];
    $res = Factory::getDatabaseConnection()->query('SELECT * FROM categories WHERE id = ?',[$categoryId])->fetch();
    var_dump($res);
    Utils::dd($res);
} else {
    header('Location:category_list.php');
}


require ('header.php');
?>

<h2>Éditer catégorie</h2>
<form action="category_register.php?id=<?= $categoryId ?>" method="POST" role="form" id="editform">
    <div class="form-group">
        <label for="">Nom de la catégorie</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nom">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
    <button type="button" class="btn btn-danger btn-block" id="deleteBtn">Supprimer</button>
</form>


<?php require ('footer.php');?>
