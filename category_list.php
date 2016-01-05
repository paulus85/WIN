<?php
mb_internal_encoding('UTF-8');
require ('vendor/autoload.php');
use App\Test;
use App\Utils;

// Retrieving data
$db = \App\Factory::getDatabaseConnection();
$res = $db->query('SELECT * FROM (
                    SELECT categories.id,name,count(events.id) nbEvents
                    FROM categories LEFT JOIN events ON categories.id = events.category_id
                    GROUP BY category_id,name,categories.id
                  ) AS T ORDER BY name')->fetchAll();
require ('header.php');
?>

    <ul class="list-group">
        <?php foreach($res as $item): ?>
        <a class="list-group-item" href="category_edit.php?id=<?= $item->id; ?>">
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