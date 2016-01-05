<?php
require ('vendor/autoload.php');
use App\Utils;
use App\Factory;



// Editing a category requires to have a category id in GET array
$categoryId = $_GET['id'];
if($categoryId) {
    $categoryId = $_GET['id'];
    $res = Factory::getDatabaseConnection()->query('SELECT name FROM categories WHERE id = ?',[$categoryId])->fetch();
    if (!$res) {
        //Flash error
        header('Location:category_list.php');
    } else {
        // Display the page
    }
} else {
    header('Location:category_list.php');
}


require ('header.php');
?>

<h2>Éditer catégorie</h2>
<form action="category_register.php?id=<?= $categoryId ?>" method="POST" role="form" id="editform" data-id="<?= $categoryId ?>">
    <div class="form-group">
        <label for="">Nom de la catégorie</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $res->name; ?>">
<!--        TODO-->
    </div>
    <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
    <button type="button" class="btn btn-danger btn-block" id="deleteBtn">Supprimer</button>
</form>


<?php require ('footer.php');?>
