<?php
	@session_start();
		if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta']!='1'){
			header("Location:index.php");
		}
		
		$id = $_GET['id'];
		$idTipaRacunara = $_GET['idTipaRacunara'];
		include_once("konekcija.inc");
		switch($idTipaRacunara){
			case "1" :
					$deleteQuery = "DELETE FROM desktop_racunari WHERE id_racunara = $id";
					$rezultat = mysql_query($deleteQuery, $con);
					if($rezultat){
						$response = "Uspešno ste obrisali glavni link";
					}
			
			
			break;
			case "2" :
					$deleteQuery = "DELETE FROM notebook_racunari WHERE id_racunara = $id";
					$rezultat = mysql_query($deleteQuery, $con);
					if($rezultat){
						$response = "Uspešno ste obrisali glavni link";
					}
			
			
			break;
		}
			
		
?>
										