<?php

    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';

    //Read menu id passed in the URL
    if(isset($_GET['id'])) 
    {
        //Get db object
        $db = new Db();    
        //id is a querystring representing the id of the food
        $foodId = $_GET['id']; //storing id value to be used in select statement

        $result = $db -> select("SELECT * FROM `food` WHERE food.id='$foodId'");
        //getting the db values according to the given id
    
        $food = [
                'id'                => $result[0]['id'],
                'type'              => $result[0]['type'],
                'image'             => $result[0]['image'],
                'name'              => $result[0]['name'],
                'details'           => $result[0]['details'],
                'ingredients'       => $result[0]['ingredients'],
                'gluten'            => $result[0]['gluten'],
                'vegan'             => $result[0]['vegan']
        ];
        //storing the values in food

        // Render view, passing the values
        echo $twig->render('menuDetails.html', ['food' => $food] );
    }
    else
        echo $twig->render('404.html');



