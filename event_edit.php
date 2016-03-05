<?php
require ('vendor/autoload.php');

require ('header.php');
?>

<h2>Éditer event</h2>
<form action="" method="POST" role="form">
    <div class="form-group">
        <label for="">Date de l'event</label>
        <input type="date" class="form-control" id="" placeholder="Date">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Repas ?
        </label>
    </div>
    <div class="form-group">
        <label for="">Remarque</label>
        <input type="text" class="form-control" id="" placeholder="Remarque">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
    <button type="button" class="btn btn-danger btn-block" id="deleteBtn">Supprimer</button>
</form>

<?php require ('footer.php');?>
