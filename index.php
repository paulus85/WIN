<?php
require ('vendor/autoload.php');
// Retrieving data
$db = \App\Factory::getDatabaseConnection();
$categories = $db->query('SELECT id,name,forTab FROM categories')->fetchAll();
$date = new DateTime('01-01-2016');
//\App\Utils::dd($date);
require ('header.php');
?>

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
    <?php foreach($categories as $category): ?>
        <li role="presentation"><a href="#<?= $category->id ?>" aria-controls="<?= $category->id ?>" role="tab" data-toggle="tab"><?= $category->name ?></a></li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="all">
        <?php $eventsAll = $db->query('SELECT * FROM events ORDER BY "date"')->fetchAll();
        \App\Utils::dd($eventsAll);?>
        <ul class="list-group">
        <?php foreach($eventsAll as $event) : ?>
            <?php $categoryName = $db->query('SELECT name FROM categories WHERE id=?',[$event->category_id])->fetch();
                $timestamp=strtotime($event->date);
                $day = strftime("%a",$timestamp);
                $numberOfDay = strftime("%d",$timestamp);
                $month = strftime("%b",$timestamp);
            ?>
            <a class="list-group-item">
                <div class="row vertical-align">
                    <div class="col-xs-2 col-item date">
                        <p class="weekday"><?= $day ?></p>
                        <p class="daynum"><?= $numberOfDay ?></p>
                        <p class="weekday"><?= $month ?></p>
                    </div>
                    <div class="col-xs-8 col-item name">
                        <p class="name"><?= $categoryName->name ?> <?php if($event->repas) echo '&nbsp;<span class="badge">R</span>' ?></p>
                        <p class="note"><?= $event->remarque ?></p>
                    </div>
                    <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
            </a>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php foreach ($categories as $category) :?>
        <div role="tabpanel" class="tab-pane fade" id="<?= $category->id ?>">
            <?php $eventsAll = $db->query('SELECT * FROM events WHERE category_id=? ORDER BY "date"',[$category->id])->fetchAll();
            if (!empty($eventsAll)) : ?>
            <ul class="list-group">
                <?php foreach($eventsAll as $event) : ?>
                    <?php
                    $timestamp=strtotime($event->date);
                    $day = strftime("%a",$timestamp);
                    $numberOfDay = strftime("%d",$timestamp);
                    $month = strftime("%b",$timestamp);
                    ?>
                    <a class="list-group-item">
                        <div class="row vertical-align">
                            <div class="col-xs-2 col-item date">
                                <p class="weekday"><?= $day ?></p>
                                <p class="daynum"><?= $numberOfDay ?></p>
                                <p class="weekday"><?= $month ?></p>
                            </div>
                            <div class="col-xs-8 col-item name">
                                <p class="name"><?= $category->name ?> <?php if($event->repas) echo '&nbsp;<span class="badge">R</span>' ?></p>
                                <p class="note"><?= $event->remarque ?></p>
                            </div>
                            <div class="col-xs-2 right-arrow col-item "><span class="glyphicon glyphicon-menu-right"></span></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>

    <?php endforeach; ?>



<?php require ('footer.php'); ?>