<?php

require_once("header.php");

$brgi = intval($_POST["brgi"]);
$id = intval($_POST['id']);
		$stmt = db()->prepare("UPDATE voznja SET id_rute=:brgi WHERE id = $id");
		$stmt->bindParam(":brgi" , $brgi);
		
		$stmt->execute();
		header("Location:mojeRute.php");




?>	