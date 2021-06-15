<?php
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';

    //Get db object
    $db = new Db();   
    $food = $db -> select("SELECT f.id, f.image, f.name as foodName, f.details FROM food f order by f.type asc");

    echo $twig->render('menu.html', ['food' => $food] );