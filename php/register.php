<?php
    require_once "db.inc";

    $db = new Database("localhost", "root", "", "pperek", "user");
    
    $login = $_POST["login"];
    $password = $_POST["password"];

    $db->insert($login, $password, 0);