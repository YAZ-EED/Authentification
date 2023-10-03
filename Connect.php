<?php
    $con = new PDO('mysql:host=localhost;dbname=authentification','root','',[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);