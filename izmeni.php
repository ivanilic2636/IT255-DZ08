<?php

require_once("header.php");
$id = intval($_GET['id']);


$stmt = db()->query("SELECT id_rute FROM  voznja WHERE id = $id");
$stmt->execute();
$red = $stmt->fetch();
$stmt = db()->query("SELECT * FROM ruta");
	$stmt->execute();
	$lista = '<select name = "brgi">';
	while($row = $stmt->fetch()){
		$lista .= " <option name='tabela' ".($row['id']==$red['id_rute']?"selected":"")." value=".$row['id'].">".$row['pocetna_ruta']." -- ".$row['krajnja_ruta']."</option>";
		
		
	}
	
	$lista.= "</select>";












?>	


<form action= "saveRuta.php" method="post">
	
		<?php echo $lista; ?>
					<input type ="hidden" name = "id" value ="<?php  echo $id   ?>">
					<input type = "submit" value ="rezervisi">
						
	
	</form>