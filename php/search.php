<?php
    require_once "db.inc";

    if(isset($_GET["search"]))
        $pattern = $_GET["search"];

    $db = new Database("localhost", "root", "", "pperek", "post");
    $req = $db->get();
    
    $posts = array();

    foreach($req as $r) {
        $post = array("author" => $r[1], "topic" => $r[2], "content" => $r[3], "date" => $r[4]);
        if(isset($pattern)) {
            $q = preg_quote($pattern);
            if(preg_match("/$q/", $post["topic"])) {
                array_push($posts, $post);
            }
        } else {
            array_push($posts, $post);
        }
    }
	
    echo json_encode($posts);