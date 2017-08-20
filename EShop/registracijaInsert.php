<?php 

	
	
		if(isset($_GET['kor_ime'])&& isset($_GET['email']) && isset($_GET['lozinka'])){
			$korIme = $_GET['kor_ime'];
			$email =  $_GET['email'];
			$lozinka = $_GET['lozinka'];
			$lozinkaPonovo = $_GET['lozinkaPonovo'];
			$datum =date("Y:m:d");
			
			$regIme = '/^[A-Z][a-z]{1,}$/';
			$regEmail = '/^([a-z0-9]{1,}[\.]?[a-z0-9]{1,})@\w+[a-z][0-9]*(\.\w{2,3})+$/';
			$regSifra = '/^(([0-9]{1,}[A-z]{1,}[0-9A-z]{3,10})|([A-z]{1,}[0-9]{1,}[0-9A-z]{3,10})|([0-9]{2,}[A-z]{1,}[0-9A-z]{2,10})|([0-9]{3,}[A-z]{1,}[0-9A-z]{1,10})|([A-z]{2,}[0-9]{1,}[0-9A-z]{2,10})|([A-z]{3,}[0-9]{1,}[0-9A-z]{1,10})|([0-9]{1,}[A-z]{4,})|([A-z]{4,}[0-9]{1,})|([0-9]{4,}[A-z]{1,}))$/';
			
			
			if(!preg_match($regIme, $korIme )){
				?>
				<script>
				$("#greske").append("- Ime mora imati prvo veliko slovo, i bar jos jedno malo slovo<br/>");
				</script>
				<?php
			}
			if(!preg_match($regEmail, $email )){
				?>
				<script>
				$("#greske").append("- E-mail mora imati pravi format mail adrese<br/>");
				</script>
				<?php
			}
			if(!preg_match($regSifra, $lozinka )){
				?>
				<script>
				$("#greske").append("- Lozinka mora imati minimum 5, maksimum 12 karaktera, kombinacijom slova i brojeva<br/>");
				</script>
				<?php
			}
			if($lozinka!=$lozinkaPonovo){
				?>
				<script>
				$("#greske").append("- Polje 'potvrda lozinke' mora biti isto kao u polju 'Lozinka'<br/>");
				</script>
				<?php
			}
			else{
				$sifra = md5($lozinka);
				include_once("konekcija.inc");
				$insert="INSERT INTO `klijenti`(`id_klijenta`, `kor_ime`, `lozinka`, `mail`, `datum`) VALUES ('','$korIme','$sifra','$email','$datum')";
				$rezultat=mysql_query($insert,$con);
				if($rezultat){
					echo "Uspešno ste se registrovali! Sad se možete ulogovati sa vašom šifrom i korisničkim imenom";
				}
				
			
			}
		}
						
?>