<?php

    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';

    //Read menu id passed in the URL
    if(isset($_GET['id'])) 
    {
        //Get db object
        $db = new Db();    
        //id is a querystring representing the id of the food
        $foodId = $db -> quote($_GET['id']); //makes param safe for use in query
        $result = $db -> select("SELECT * FROM `food` WHERE food.id=$foodId");
       
        $gluten = $vegan = "";

        if (count(self::$result) > 0) {
            // Food loaded from database
            $food = [
                    'id'                => $result[0]['id'],
                    'type'              => $result[0]['typeName'],
                    'image'             => $result[0]['image'],
                    'name'              => $result[0]['name'],
                    'details'           => $result[0]['details'],
                    'gluten'            => $result[0]['gluten'],
                    'vegan'             => $result[0]['vegan']
            ];

            if($this -> $food->gluten == 0){
                $gluten = "No";
            }else{
                $gluten = "Yes";
            }
        
            if($this -> $food->vegan== 0){
                $vegan = "No";
            }else{
                $vegan = "Yes";
            }

            // Render view
            echo $twig->render('menuDetails.html', ['food' => $food, 'gluten' => $gluten, 'vegan' => $vegan] );
        }
        else
            echo $twig->render('404.html');
    }
    else
        echo $twig->render('404.html');



