<?php 
@session_start();
	if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta'] != "1"){
		header("Location:index.php");
	}
		$id = $_GET['id'];
		$idTipLinka = $_GET['idTipaLinka'];
			include_once("konekcija.inc");
			switch($idTipLinka){
				case "1" :
					$deleteQuery = "DELETE FROM glavni_meni WHERE id_linka = $id";
					$rezultat = mysql_query($deleteQuery, $con);
					if($rezultat){
						$response = "Uspešno ste obrisali glavni link";
					}
				break;
				case "2":	
					$deleteQuery = "DELETE FROM podmeni WHERE id_linka = $id";
					$rezultat = mysql_query($deleteQuery, $con);
					if($rezultat){
						$response = "Uspešno ste obrisali podlink";
					}
				break;
			}
			
			echo $response;
?>