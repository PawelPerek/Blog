<?php
    require_once "db.inc";

    $db = new Database("localhost", "root", "", "pperek", "user");
    
    $login = $_POST["login"];
    $password = $_POST["password"];

    $db->find(array(
        "login" => $login,
        "password" => $password
    ));

    if(count($db) > 0)
        setcookie("login", $password, time() + 3600);

    header("Refresh:0; url=/");