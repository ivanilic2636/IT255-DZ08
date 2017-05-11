<?php

 require_once("header.php");
	


		$stmt = db()->query("SELECT v.*,k.ime,r.pocetna_ruta,r.krajnja_ruta FROM voznja v LEFT JOIN korisnik k ON (k.id=v.id_korisnik) LEFT JOIN ruta r ON (r.id=v.id_rute) " .($admin? "":"WHERE v.id_korisnik = ".$user['id']));
		$stmt->execute();
		$lista = '<center><table style="width:100%" table border="1"> <tr> <td> <b>Ime korisnika </b></td> <td><b> Pocetna ruta</b></td>  <td> <b>Krajnja ruta</td></b> <td> </td> </tr> ';
		
		
		$count = 0;
		
		
		while($row=$stmt->fetch()){
			
			$lista .= "<tr>
								<td>".$row['ime']."</td>
								<td>".$row['pocetna_ruta']."</td> 
								<td>".$row['krajnja_ruta']."</td>
								<td> <a href = \"izmeni.php?id=".$row['id']."\">Izmeni</a> <a href = \"obrisi.php?id=".$row['id']."\">Obrisi</a> </td>
						</tr>";
			
			$count++;
		}
		
		$lista .='</table></center>';
		if($count == 0){
			
			$lista = "<p> Niste rezervisali voznju BRGIIIII </p>";
		}
		echo $lista;


?>



<?php require_once("footer.php"); ?>