<?php

    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    require_once __DIR__.'/menu.php';

    //Read menu id passed in the URL
    if(isset($_GET['f'])) 
    {
        //Get db object
        $db = new Db();    
        //a is a querystring representing the id of the food
        $menuId = $db -> quote($_GET['f']); //makes param safe for use in query
        $result = $db -> select("SELECT f.*, t.name as typeName FROM food f inner join type t on f.type = t.id  WHERE f.id=". $menuId);

        if (count(self::$result) > 0) {
            // Food loaded from database
            $menu = [
                    'id'                => $result[0]['id'],
                    'type'              => $result[0]['typeName'],
                    'image'             => $result[0]['image'],
                    'name'              => $result[0]['name'],
                    'details'           => $result[0]['details'],
                    'gluten'            => $result[0]['gluten'],
                    'vegan'             => $result[0]['vegan']
            ];

            // Render view
            echo $twig->render('details.html', ['menu' => $menu, 'menuTypes' => $menuTypes] );
        }
        else
            echo $twig->render('404.html');
    }
    else
        echo $twig->render('404.html');



