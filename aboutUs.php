<?php

require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once __DIR__.'/menu.php';

//Get db object
$db = new Db();    
$result = $db -> select("SELECT email, contact, telephone, address FROM business");

//Start from in-mem object
$business = [
    'email'     => $result[0]['email'],
    'contact'   => $result[0]['contact'],
    'telephone' => $result[0]['telephone'],
    'address'   => $result[0]['address']
];

// Render view
echo $twig->render('aboutUs.html', ['business' => $business, 'menuTypes' => $menuTypes]);
