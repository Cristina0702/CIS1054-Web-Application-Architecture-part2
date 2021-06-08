<?php

    require_once __DIR__.'/database.php';
    $db = new Db();    

    $menuTypes = $db -> select("SELECT id, name FROM type order by name");
