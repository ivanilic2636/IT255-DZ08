<?php

   require_once("db.php");
	
	$ime = $_POST["username"];
	$password = $_POST["password"];
	

	try{
		
		 login($ime,$password);
		
		
		
	}
	catch(PDOException $e)
{

    echo "greska" .$e->getMessage();
	
}


	




?>