<?php

	session_start();
	if(!isset($_SESSION['user'])){
		
		header("Location:login.php");
		exit(0);
	}
	else{
		require_once('db.php');
		$user = $_SESSION['user'];
		$admin = ($user['admin']==0?true:false);
		
		
		
	}
	
		

?>

<!DOCTYPE html>
<html>
<head>
<title>Ivan</title>
<link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	<header>
	<a href = "index.php">Pocetna</a>
	
	<?php 
	
	echo ($admin?'<a href = "mojeRute.php">Sve rute</a>':'<a href = "mojeRute.php">Moje rute</a>');
	
?>


	<a href = "logout.php">Logout [<?php echo $user['ime'];  ?>]</a>
	
	
	
	</header>
