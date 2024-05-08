<?php
	$info = 'mysql:dbname=scolarite;host:localhost;charset=utf8mb4';
	try{
		$db = new PDO($info, 'root', null);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);

	}catch(PDOException $error){
		 die($error->getMessage());
	}
	$db->query("SET NAMES UTF8");
?>