<?php
mb_internal_encoding('UTF-8');
require ('vendor/autoload.php');
// Retrieving data
$db = \App\Factory::getDatabaseConnection();
$categories = $db->query('SELECT name,forTab FROM categories')->fetchAll();
$date = new DateTime('01-01-2016');
\App\Utils::dd($date);
require ('header.php');
?>

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
    <?php foreach($categories as $category): ?>
        <li role="presentation"><a href="#<?= $category->forTab ?>" aria-controls="<?= $category->forTab ?>" role="tab" data-toggle="tab"><?= $category->name ?></a></li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="all">
        <?php $eventsAll = $db->query('SELECT * FROM events')->fetchAll();
        \App\Utils::dd($eventsAll);?>
        <ul class="list-group">
        <?php foreach($eventsAll as $event) : ?>
            <?php  ?>
            <a class="list-group-item">
                <div class="row vertical-align">
                    <div class="col-xs-2 col-item date">
                        <p class="weekday">vendr.</p>
                        <p class="daynum">26</p>
                        <p class="weekday">août</p>
                    </div>
                    <div class="col-xs-8 col-item">
                        <p class="name">Régie &nbsp;<span class="badge">R</span></p>
                    </div>
                    <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
            </a>
            <?php endforeach; ?>
            <a class="list-group-item">
                <div class="row vertical-align">
                    <div class="col-xs-2 col-item date">
                        <p class="weekday">samedi</p>
                        <p class="daynum">27</p>
                        <p class="weekday">août</p>
                    </div>
                    <div class="col-xs-8 col-item name">
                        <p class="name">Cabane 10</p>
                        <p class="note">Soirée espagnole</p></div>
                    <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
            </a>
        </ul>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="regie">
        <ul class="list-group">
            <a class="list-group-item">
                <div class="row vertical-align">
                    <div class="col-xs-2 col-item date">
                        <p class="weekday">vendr.</p>
                        <p class="daynum">26</p>
                        <p class="weekday">août</p>
                    </div>
                    <div class="col-xs-8 col-item">
                        <p class="name">Régie &nbsp;<span class="badge">R</span></p>
                    </div>
                    <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
            </a>
        </ul>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cabane">
        <ul class="list-group">
            <a class="list-group-item">
                <div class="row vertical-align">
                    <div class="col-xs-2 col-item date">
                        <p class="weekday">samedi</p>
                        <p class="daynum">27</p>
                        <p class="weekday">août</p>
                    </div>
                    <div class="col-xs-8 col-item name">
                        <p class="name">Cabane 10</p>
                        <p class="note">Soirée espagnole</p></div>
                    <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
            </a>
        </ul>
    </div>

<?php require ('footer.php'); ?>