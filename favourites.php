<?php
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';

    //Get the db object
    $db = new Db();
    session_start();

    //if a session variable is set
    //therefore user already has favs
    if(isset($_SESSION["favs"])){
        $array = array_map('intval', explode('|', $_SESSION["favs"]));
        $array = implode("','",$array);
        if(isset($_POST)){
        $array = array_push($_POST);
        echo $array;
        }
        
        $query = "SELECT f.id, f.image, f.name as foodName, f.details 
                  FROM food f 
                  WHERE f.id 
                  IN ('".$array."')
                  ORDER BY f.type asc";
        $food = $db -> select($query);
        
        echo $twig->render('favourites.html', ['food' => $food] );
    }else{
        if(isset($_POST['foodId'])){
            $arr = array(array_push($_POST['foodId']));
        }else{
            $arr;
        }
        
        $strFromArr=implode('|',$arr);
        $_SESSION["favs"] = $strFromArr;
           
        $array = array_map('intval', explode('|', $_SESSION["favs"]));
        $array = implode("','",$array);

        //Select no row as no favourites yet.
        $query = "SELECT f.id, f.image, f.name as foodName, f.details 
                  FROM food f 
                  WHERE f.id 
                  IN ('".$array."')
                  ORDER BY f.type asc";
        $food = $db -> select($query);
        
        echo $twig->render('favourites.html', ['food' => $food] );
    }
?> 