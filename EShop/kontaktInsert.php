<?php
	
	
		if(isset($_GET['naslovPoruke']) && isset($_GET['poruka']) ){
	
				$korIme = $_GET['imeKorisnika'];
				$korMail = $_GET['mailKorisnika'];
				$korNaslov = $_GET['naslovPoruke'];
				$korPoruka = $_GET['poruka'];
				include_once("konekcija.inc");
				
				$insert = "INSERT INTO `kontakt_forme`(`kontakt_id`, `kor_ime`, `mail`, `naslov_poruke`, `poruka`) VALUES ('','$korIme','$korMail','$korNaslov','$korPoruka')";
				$rezultatInserta=mysql_query($insert,$con);
				if($rezultatInserta){
					echo "Uspešno ste poslali poruku, u što kraćem roku ćemo vam odgovoriti";
					
				}
				
				
				
			}
			
?>