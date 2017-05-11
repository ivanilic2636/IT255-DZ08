<?php
	
   require_once("header.php");
	
		$brgi = $_POST["brgi"];
		$stmt = db()->prepare("INSERT INTO voznja(id_korisnik,id_rute) VALUES (:korisnik,:rute)");
		$stmt->bindParam(":korisnik" , $user['id'] );
		$stmt->bindParam(":rute" , $brgi);
		$stmt->execute();
		header("Location:mojeRute.php");

?>