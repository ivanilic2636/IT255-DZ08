<?php 

function db(){
	
	$con = new PDO("mysql:host=localhost;dbname=carpool", "root", "");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $con;
	
	
	
}
function login($ime,$password){
	
	$con = db();
	$stmt = $con->prepare("SELECT count(*) as broj,id,ime,password,admin FROM korisnik WHERE ime=:username AND password=:password");
	
	$stmt->bindParam(":username", $ime);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
		$row = $stmt->fetch();
			if($row['broj']==1){
				
				session_start();
				$_SESSION['user'] = array('id' => $row['id'], 'ime' => $row['ime'], 'admin' =>$row['admin']);
				header("Location:index.php");
			}
			else{
				header("Location:login.php");
				
			}
			
		
	}
	
	
		
		function getUserID($ime){
			$con = db();
			
			$stmt = $con->prepare("SELECT * FROM korisnik WHERE ime=:username");
			
			$stmt->bindParam(":username",$ime);  
			$stmt->execute();
			$row = $stmt->fetch();
			
			return $row['id'];
		}


		function registracijaKorisnika($ime,$password){
			
			$con = db();
			
			$tabela = "SELECT ime FROM korisnik WHERE ime=:username";
			
			$stmt = $con->prepare($tabela);
			
			$stmt->bindParam(":username",$ime);
			$stmt->execute();
			if($stmt->fetch()){
				header("Location:registrovanje.php?vecPostoji=true");
				
			}else{
				
				$unosTabela = "INSERT INTO korisnik (ime , password) VALUES (?,?)";
				
				$unosStmt = $con->prepare($unosTabela);
				$unosStmt->bindParam(1,$ime);
				$unosStmt->bindParam(2,$password);
				$unosStmt->execute();
				header("Location:registrovanje.php?nepostoji=true");	
				
			}
			}
		
		function listaRuta(){
			
			$con = db();
			$tabelaRuta = "SELECT * FROM ruta";
			$vracanje = $con->query($tabelaRuta);
			$row = $vracanje->fetch();
			
			
			return $row;
		}
		
		function upisivanjeUTabelu($id_korisnika,$id_rute){
				
			$con = db();	
				
			$tabela = "SELECT ime FROM korisnik WHERE ime=:username";
		
			$stmt = $con->prepare($tabela);
			
			$stmt->bindParam(":username",$id_korisnika);
			$stmt->execute();
			$ime_narucioca = $stmt->fetch();
			
			$tabela0 = "SELECT * FROM ruta WHERE id =:id_rute"; 
			$stmt1 = $con->prepare($tabela0);
			
			$stmt1->bindParam(":id_rute",$id_rute);
			$stmt1->execute();
			$nesto=$stmt1->fetch();
			
			
			$nekiString = $nesto['pocetna_ruta']."    ".$nesto['krajnja_ruta'];
			
			$tabela1 = "INSERT INTO voznja(id_korisnik,ime_narucioca,ime_rute) VALUES (?,?,?)";
			
			$stmt2 = $con->prepare($tabela1);
			$stmt2->bindParam(1,$id_korisnika);
			$stmt2->bindParam(2,$ime_narucioca);
			$stmt2->bindParam(3,$nekiString);
			$stmt2->execute();
		
			
		}
		
		
		
		
		
		
		
		
		
		
		

?>