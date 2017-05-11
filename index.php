
<?php

	
	
	require_once('header.php');
	$stmt = db()->query("SELECT * FROM ruta");
	$stmt->execute();
	$lista = '<select name = "brgi">';
	while($row = $stmt->fetch()){
		$lista .= " <option name='tabela' value=".$row['id'].">".$row['pocetna_ruta']." -- ".$row['krajnja_ruta']."</option>";
		
		
	}
	
	$lista.= "</select>";

?>



		<form action= "pocetnaLogika.php" method="post">
	
		<?php echo $lista; ?>
		
					<input type = "submit" value ="rezervisi">
						
	
	</form>
	
	
	



	
	<?php
	
	require_once('footer.php');
	
	
	?>