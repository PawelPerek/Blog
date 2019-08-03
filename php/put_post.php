<?php
    require_once "db.inc";

    $author = "peru";
    $topic = $_POST["topic"];
    $content = $_POST["content"];

    $db = new Database("localhost", "root", "", "pperek", "post");

    $db->insert($author, $topic, $content, date(DATE_RFC2822));

    header('Location: ../');