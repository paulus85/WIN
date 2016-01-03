<?php
mb_internal_encoding('UTF-8');
require ('vendor/autoload.php');
use App\Test;
use App\Utils;

// Retrieving data
$db = \App\Factory::getDatabaseConnection();
$res = $db->query('SELECT name, count(*) nbEvents FROM categories,events WHERE events.category_id = categories.id GROUP BY events.category_id;')->fetchAll();

Utils::dd($res);
require ('header.php');
?>

    <ul class="list-group">
        <?php foreach($res as $item): ?>
        <a class="list-group-item">
            <div class="row vertical-align">
                <div class="col-xs-2 col-item date">
                    <p class="daynum"><?= $item->nbEvents ?></p>
                    <p class="weekday">events</p>
                </div>
                <div class="col-xs-8 col-item">
                    <p class="name"><?= $item->name ?></p>
                </div>
                <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
            </div>
        </a>
        <?php endforeach; ?>
    </ul>

<?php



require ('footer.php');
?>