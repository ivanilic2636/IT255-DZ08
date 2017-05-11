<?php

require_once("header.php");


 $id = intval($_GET['id']);

 
 if($admin){
	 
	 $stmt= db()->query("DELETE FROM voznja WHERE id = $id");
	 
	 header("Location:mojeRute.php");
 }
else{
	
	 $stmt= db()->query("SELECT id_korisnik FROM voznja WHERE id = $id");
	$stmt->execute();
	$row = $stmt->fetch();
	if($row['id_korisnik']==$user['id']){
		
		 $stmt= db()->query("DELETE FROM voznja WHERE id = $id");
	 
	 header("Location:mojeRute.php");
		
		
	}
	else{
		 header("Location:mojeRute.php");
		
	}
	
}





?>