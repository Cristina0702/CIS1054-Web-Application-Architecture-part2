<?php

require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//Get db object
$db = new Db();    
$result = $db -> select("SELECT id, position, image, name, surname, description FROM `about`");

// Render view
echo $twig->render('aboutUs.html', ['about' => $result]);
