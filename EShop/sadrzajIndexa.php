<?php
 @session_start();


// KADA SE ODABERE JEDNA OD STRANICA WEB SHOPA 

	$idIndeksa = $_GET['id'];
	switch($idIndeksa){
		case "1":
			echo "<h2>O nama</h2>";
			break;
		case "2":
			?>
			<script>
				$("#sajt_sredina_gore").slideUp(500);
			</script>
			<?php
			echo "	<h2 class='sadrzaj_naslov'>O autoru<h2>
					<div id='o_autoru'>
						<div id='autor_header'>
							<h2 class='ime_autor'>Marko Vukadinović</h2>
							<img src='slike/autor.jpg'></img>
						</div>
						
						<div class='tekst2'>
							<div class='unos'>
								<p>Student sam druge godine Visoke ICT skole, smer Internet Tehnologije, izabrao sam modul Web Programiranje.</p></br>
								<p>Moji prethodni radovi:</p>
								<p><a href='http://markovukadinovic.byethost15.com/' target='_blank'>Pekara Marko - kurs 'Web Dizajn'</a></p>
								
								<p><a href='http://www.markohotel.byethost8.com/' target='_blank'>Hotel Marko - kurs 'Web Programiranje'</a></p>
								</br>
								<p>Možete posetiti moju stranicu na : </p>
								
								
								<div id='facebook'>
									<a href='http://www.facebook.com/m4r3ja' target='_blank'><img src='slike/facebook-logo1.jpg' height='50' width='160'></img></a>
								</div>
								
								<div id='twitter'>
									<a href='http://www.twitter.com/m4r3ja' target='_blank'><img src='slike/twitter-logo.png' height='50' width='140'></img></a>
								</div>
								
							</div>
							
						</div>
				</div>
					
			
			
			";
			break;
		case "3":
			
			?>
			<script>
				$("#sajt_sredina_gore").slideUp(500);
			</script>
			<?php
			echo "<h2 class='sadrzaj_naslov'>Kontakt</h2>";
			echo "<div id='kontakt_sve'>";
			
				if(!isset($_SESSION['id_klijenta']) || $_SESSION['id_klijenta']==''){
				
					
					echo "
							<div id='paznja'>
								<p>Obaveštenje : Možete nas kontaktirati SAMO ako ste registrovani korisnik! Ukoliko se niste registrovali do sada, molimo da kliknete <a href='registracija.php'>ovde</a>, kako biste mogli da nam pošaljete poruku.</p>
							</div>
							<table id='tabela_kontakt' align='center'>
								<tr>
									<th>Korisničko ime</th>
									<td><input type='text' name='kor_ime' disabled /></td>
								</tr>
								<tr>
									<th>e-mail korisnika</th>
									<td><input type='text' name='kor_email' disabled /></td>
								</tr>
								<tr>
									<th>Naslov Poruke</th>
									<td><input type='text' name='naslov_poruke' disabled /></td>
								</tr>
								<tr>
									<th>Poruka</th>
									<td><textarea name='poruka' rows='10' cols='50' disabled ></textarea></td>
								</tr>
								<tr>
									<td colspan='2' align='right'><input type='submit' name='sbmPosaljiPoruku' value='Pošalji Poruku' disabled/></td>
								</tr>
							</table></div>";
							
							
					
				}
				else if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta']!=''){
					include_once("konekcija.inc");
					$idKorisnika = $_SESSION['id_klijenta'];
					$select = "SELECT * FROM `klijenti` WHERE id_klijenta =  '$idKorisnika'";
					$rezultat=mysql_query($select,$con);
					
					echo "	
						<form action='{$_SERVER['PHP_SELF']}' method='POST'>
							<table id='tabela_kontakt' align='center'>";
							while($klijenti = mysql_fetch_assoc($rezultat)){
						echo "	<tr>
									<th>Korisničko ime</th>
									<td><input type='text' id='kor_ime' value='{$klijenti['kor_ime']}' readonly/></td>
								</tr>
								<tr>
									<th>e-mail korisnika</th>
									<td><input type='text' id='kor_email' value='{$klijenti['mail']}' readonly/></td>
								</tr>
								<tr>
									<th>Naslov Poruke</th>
									<td><input type='text' id='kor_naslov_poruke'  /></td>
								</tr>
								<tr>
									<th>Poruka</th>
									<td><textarea id='kor_poruka' rows='10' cols='50' ></textarea></td>
								</tr>
								<tr >
									<td colspan='2' align='right'><input type='button' onClick='kontakt();'name='sbmPosaljiPoruku' value='Pošalji Poruku' /></td>
								</tr>";
							}
					echo "</table>
						</form>
						
				</div>";

				}
				?>
				<div id='status'></div>
			<?php
			
			break;
		case "4":
			echo "Sitemap";
			break;
		case "5":
			echo "<h3>Dokumentacija </h3>";
			break;
			
	}



							
?>