<?php
	require_once "db.inc";
	
	$db = new Database("localhost", "root", "", "pperek", "post");
	
	$res = $db->get();
	
	echo count($res);