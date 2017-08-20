<?php 
@session_start();
if(!isset($_SESSION['id_klijenta']) || $_SESSION['id_klijenta'] != "1"){
		header("Location: index.php");
		
	}
	include_once("header_admin.php");
?>

		
		<div id="sajt_sve_admin">
			
			<div id="sajt_sve_prvo_admin">
				<div id="prviDiv">
				</div>
				<div id='prviDDL'>
					<select onChange="dodajResponse(this.value)" id='izaberi_akciju_admin' >
						<option value="0"> Izaberite ...</option>
						<option value="1"> Glavni Meni</option>
						<option value="2"> Podmeni </option>
						<option value="3"> Računari</option>
						<option value="4"> Komponente</option>
					</select>
				</div>
				<div id="drugiDiv">
				</div>
				<div id="dodatniDDL">
				</div>
				
			</div>
			<div class="ocisti">
			</div>
			<div id="sajt_sve_sredina_admin">
				<div id='tabela_select'>
				
				</div>
				<div id='tabele_izmene'>
					<div id='tabela_insert'>
					</div>
					<div id='tabela_update'>
					</div>
				</div>
			</div>
			
			<div class="ocisti">
			</div>
			
		</div>
		<div class="ocisti">
		</div>
		<div id="sajt_dole">
			
		</div>
		<?php 
	
	if(isset($_POST['prijavi'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		
		//PROVERA DA LI SU PODACI ZA LOGIN ISPRAVNI ZA ADMIN-A
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//POSTAVLJA SE UPIT ZA PROVERU, I IZBACUJE SE U REZULTAT, AKO SU PODACI ISPRAVNI
		$query = "SELECT * FROM klijenti WHERE kor_ime ='$username' AND lozinka ='".md5($password)."'";
		$result = mysql_query($query,$con);
		echo "<p class='error_reg'> Doslo je do greske </p>";
		//UKOLIKO JE REZULTAT VRATIO SAMO JEDAN RED, ONDA U SESIJU UBACI ID_KLIJENTA, I PREBACI ME NA ADMIN.PHP
		if(mysql_num_rows($result) == 1){
			$korisnikPodaci = mysql_fetch_assoc($result);
			$_SESSION['id_klijenta'] = $korisnikPodaci['id_klijenta'];
			header("Location:admin.php");
		}
		else{
			echo "<p class='error_reg'> Doslo je do greske </p>";
		}
	}
	
/* --------------------I N S E R T--------------------------- */
/* ---------------------------------------------------------- */

	//DODAVANJE U GLAVNI MENI
	//UKOLIKO JE KLIKNUTO NA DODAJ GLAVNI LINK
	if(isset($_POST['dodajGlavniLink'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		//PRAVE SE PROMENLJIVE U KOJE SE DODAJU PROIZVOLJNE VREDNOSTI, OD STRANE ADMIN-A
		//TE VREDNOSTI SE UBACUJU U BAZU UPITOM
		$naziv = $_POST['nazivLinka'];
		$pozcijaLinka = $_POST['pozcijaLinka'];
		$putanja = $_POST['putanja'];
		
		
		//UPIT
		$insertQuery = "INSERT INTO `glavni_meni`(`id_linka`, `naziv_linka`, `poz_linka`, `putanja_linka`) VALUES ('','$naziv','$pozcijaLinka','$putanja')";
		print($insertQuery);
		$result = mysql_query($insertQuery,$con);
		if($result){
			print "Uspesno ste dodali link!";
			echo "	<script>
						
						$('#izaberi_akciju_admin').val(1);
						dodajResponse(1);
					</script>";
		}
		else{
			echo "<p class='error_reg'> Doslo je do greske </p>";
		}
		
	}
	else if(isset($_POST['dodajPodlink'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		//PRAVE SE PROMENLJIVE U KOJE SE DODAJU PROIZVOLJNE VREDNOSTI, OD STRANE ADMIN-A
		//TE VREDNOSTI SE UBACUJU U BAZU UPITOM
		$naziv = $_POST['nazivLinka'];
		$pozcijaLinka = $_POST['pozcijaLinka'];
		$putanja = $_POST['putanja'];
		$slika = $_FILES['slikaLinka'];
		$slikaTMPIme = $slika['tmp_name'];
		$slikaNaziv = $slika['name'];
		$folder = "slike/";
		$kategorija = $_POST['kategorija'];
		//UPIT
		$insertQuery = "INSERT INTO `podmeni`(`id_linka`, `naziv_linka`, `slika`, `poz_linka`, `putanja_linka`) VALUES ('','$naziv','$folder$slikaNaziv','$pozcijaLinka','$putanja')";
		$result = mysql_query($insertQuery,$con);
		if($result){
			$lastInsertId =  mysql_insert_id($con);
			$insertUVezivnu = "INSERT INTO `gl_meni_podmeni`(`id_gl_linka`, `id_pod_linka`) VALUES ($kategorija,$lastInsertId)";
			$resultVezivna = mysql_query($insertUVezivnu,$con);
			if($resultVezivna){
				move_uploaded_file($slikaTMPIme,$folder.$slikaNaziv);
				print "Uspesno ste dodali podlink!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}

		}
		else{
			echo "<p class='error_reg'> Doslo je do greske </p>";
		}
		
	}
	else if(isset($_POST['sbmDodajDesktop'])){
		include_once("konekcija.inc");
		
		$desktopNaziv = $_POST['desktopNaziv'];
		$desktopGraficka = $_POST['desktopGraficka'];
		$desktopHardDisk = $_POST['desktopHardDisk'];
		$desktopMemorija = $_POST['desktopMemorije'];
		$desktopProcesor = $_POST['desktopProcesor'];
		
		$slika1 = $_FILES['desktopSlika1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		
		if(isset($_FILES['desktopSlika2'])){
			$slika2 = $_FILES['desktopSlika2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slikaNaziv2 = "";
		}
		if(isset($_FILES['desktopSlika3'])){
			$slika3 = $_FILES['desktopSlika3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slikaNaziv3 = "";
		}
		
		$folder = "slike/";
		$cena = $_POST['desktopCena'];
		$datum = date(mktime());
		$opis = $_POST['desktopOpis'];
		
		$insertQuery = "INSERT INTO `desktop_racunari`(`id_racunara`, `naziv_racunara`, `graficka`, `hard`, `memorija`, `procesor`, `slika1`, `slika2`, `slika3`, `cena`, `datum`, `opis`) VALUES ('','$desktopNaziv','$desktopGraficka','$desktopHardDisk','$desktopMemorija','$desktopProcesor','$folder$slikaNaziv1','$folder$slikaNaziv2','$folder$slikaNaziv3','$cena','$datum','$opis')";
		$rezultat = mysql_query($insertQuery,$con);
		if($rezultat){
			
				move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
				
				if(isset($_FILES['desktopSlika2'])){
					move_uploaded_file($slikaTMPIme2,$folder.$slikaNaziv2);
				}
				if(isset($_FILES['desktopSlika3'])){
					move_uploaded_file($slikaTMPIme3,$folder.$slikaNaziv3);
				}
				
				
				print "Uspesno ste dodali u bazu";
		}
		else{
			echo "<p class='error_reg'>Doslo je do greske!</p>";
		}
		
		
	}
	
	else if(isset($_POST['sbmDodajNotebook'])){
		include_once("konekcija.inc");
		
		$notebookNaziv = $_POST['notebookNaziv'];
		$notebookGraficka = $_POST['notebookGraficka'];
		$notebookHardDisk = $_POST['notebookHardDisk'];
		$notebookMemorije = $_POST['notebookMemorije'];
		$notebookProcesor = $_POST['notebookProcesor'];
		
		$slika1 = $_FILES['notebookSlika1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		
		if(isset($_FILES['notebookSlika2'])){
			$slika2 = $_FILES['notebookSlika2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slikaNaziv2 = "";
		}
		if(isset($_FILES['notebookSlika3'])){
			$slika3 = $_FILES['notebookSlika3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slikaNaziv3 = "";
		}
		
		$folder = "slike/";
		$cena = $_POST['notebookCena'];
		$datum = date(mktime());
		$opis = $_POST['notebookOpis'];
		
		$insertQuery = "INSERT INTO `notebook_racunari`(`id_racunara`, `naziv_racunara`, `graficka`, `hard`, `memorija`, `procesor`, `slika1`, `slika2`, `slika3`, `cena`, `datum`, `opis`) VALUES ('','$notebookNaziv','$notebookGraficka','$notebookHardDisk','$notebookMemorije','$notebookProcesor','$folder$slikaNaziv1','$folder$slikaNaziv2','$folder$slikaNaziv3','$cena','$datum','$opis')";
		$rezultat = mysql_query($insertQuery,$con);
		if($rezultat){
			
				move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
				
				if(isset($_FILES['notebookSlika2'])){
					move_uploaded_file($slikaTMPIme2,$folder.$slikaNaziv2);
				}
				if(isset($_FILES['notebookSlika3'])){
					move_uploaded_file($slikaTMPIme3,$folder.$slikaNaziv3);
				}
				
				
				print "Uspesno ste dodali u bazu";
		}
		else{
			echo "<p class='error_reg'>Doslo je do greske!</p>";
		}
		
		
	}
	
	
	else if(isset($_POST['sbmDodajProcesor'])){
		include_once("konekcija.inc");
		
		$nazivProcesora = $_POST['nazivProcesora'];
		$frekvencijaProcesora = $_POST['frekvencijaProcesora'];
		$brojProcesora = $_POST['brojProcesora'];
		$slika1 = $_FILES['slikaProcesora1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		
		if(isset($_FILES['slikaProcesora2'])){
			$slika2 = $_FILES['slikaProcesora2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slika2 = "";
		}
		
		if(isset($_FILES['slikaProcesora3'])){
			$slika3 = $_FILES['slikaProcesora3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slika3 = "";
		}
		$folder = "slike/";
		$opisProcesora = $_POST['opisProcesora'];
		$cenaProcesora = $_POST['cenaProcesora'];
		$datumObjave = date(mktime());
		
		$insertQuery = "INSERT INTO `procesori`(`id_procesora`, `naziv_procesora`, `frekvencija`, `broj_procesora`, `slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES ('','$nazivProcesora','$frekvencijaProcesora','$brojProcesora','$folder$slikaNaziv1','$folder$slikaNaziv2','$folder$slikaNaziv3','$opisProcesora','$cenaProcesora','$datumObjave')";
		
		$rezultat = mysql_query($insertQuery,$con);
		print_r($insertQuery);
		if($rezultat){
			move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
			print ("Uspesno ste uneli u tabelu 'Procesori'!");
		}
		else{
			echo "<p class='error_reg'>Doslo je do greske!</p>";
		}
		
	}
	else if(isset($_POST['sbmDodajGraficku'])){
		include_once("konekcija.inc");
		
		$nazivGraficke = $_POST['nazivGraficke'];
		$memorijaGraficke = $_POST['memorijaGraficke'];
		$slika1 = $_FILES['slikaGraficke1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		
		if(isset($_FILES['slikaGraficke2'])){
			$slika2 = $_FILES['slikaGraficke2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slika2 = "";
		}
		
		if(isset($_FILES['slikaGraficke3'])){
			$slika3 = $_FILES['slikaGraficke3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slika3 = "";
		}
		$folder = "slike/";
		$opisGraficke = $_POST['opisGraficke'];
		$cenaGraficke = $_POST['cenaGraficke'];
		$datumObjave = date(mktime());
		
		$insertQuery = "INSERT INTO `graficke`(`id_graficke`, `naziv_graficke`, `memorija`,`slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES ('','$nazivGraficke','$memorijaGraficke','$folder$slikaNaziv1','$folder$slikaNaziv2','$folder$slikaNaziv3','$opisGraficke','$cenaGraficke','$datumObjave')";
		
		$rezultat = mysql_query($insertQuery,$con);
		print_r($insertQuery);
		if($rezultat){
			move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
			print ("Uspesno ste uneli u tabelu 'graficke'!");
		}
		else{
			echo "<p class='error_reg'>Doslo je do greske!</p>";
		}
		
	}
	
	else if(isset($_POST['sbmDodajMemoriju'])){
		include_once("konekcija.inc");
		
		$nazivMemorije = $_POST['nazivMemorije'];
		$kolicinaMemorije = $_POST['kolicinaMemorije'];
		$slika1 = $_FILES['slikaMemorije1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		
		if(isset($_FILES['slikaMemorije2'])){
			$slika2 = $_FILES['slikaMemorije2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slika2 = "";
		}
		
		if(isset($_FILES['slikaMemorije3'])){
			$slika3 = $_FILES['slikaMemorije3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slika3 = "";
		}
		$folder = "slike/";
		$opisMemorije = $_POST['opisMemorije'];
		$cenaMemorije = $_POST['cenaMemorije'];
		$datumObjave = date(mktime());
		
		$insertQuery = "INSERT INTO `memorije`(`id_memorije`, `naziv_memorije`, `kolicina`,`slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES ('','$nazivMemorije','$kolicinaMemorije','$folder$slikaNaziv1','$folder$slikaNaziv2','$folder$slikaNaziv3','$opisMemorije','$cenaMemorije','$datumObjave')";
		
		$rezultat = mysql_query($insertQuery,$con);
		print_r($insertQuery);
		if($rezultat){
			move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
			print ("Uspesno ste uneli u tabelu 'memorije'!");
		}
		else{
			echo "<p class='error_reg'>Doslo je do greske!</p>";
		}
		
	}
	
	else if(isset($_POST['sbmDodajHardDisk'])){
		include_once("konekcija.inc");
		
		$nazivHardDiska = $_POST['nazivHardDiska'];
		$memorijaHardDiska = $_POST['memorijaHardDiska'];
		$slika1 = $_FILES['slikaHardDiska1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		
		if(isset($_FILES['slikaHardDiska2'])){
			$slika2 = $_FILES['slikaHardDiska2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slika2 = "";
		}
		
		if(isset($_FILES['slikaHardDiska3'])){
			$slika3 = $_FILES['slikaHardDiska3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slika3 = "";
		}
		$folder = "slike/";
		$opisHardDiska = $_POST['opisHardDiska'];
		$cenaHardDiska = $_POST['cenaHardDiska'];
		$datumObjave = date(mktime());
		
		$insertQuery = "INSERT INTO `hard_diskovi`(`id_hard_diska`, `naziv_hard_diska`, `kolicina_memorije`,`slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES ('','$nazivHardDiska','$memorijaHardDiska','$folder$slikaNaziv1','$folder$slikaNaziv2','$folder$slikaNaziv3','$opisHardDiska','$cenaHardDiska','$datumObjave')";
		
		$rezultat = mysql_query($insertQuery,$con);
		print_r($insertQuery);
		if($rezultat){
			move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
			print ("Uspesno ste uneli u tabelu 'hard_diskovi'!");
		}
		else{
			echo "<p class='error_reg'>Doslo je do greske!</p>";
		}
		
	}
	
/* -----------------U P D A T E---S T A R T---------------------- */
/* -------------------------------------------------------------- */	
	
	
	
/* ---------------G L A V N I---M E N I-------------------- */
/* -------------------------------------------------------- */

	
	//IZMENA GLAVNOG MENIJA
	//UKOLIKO JE KLIKNUTO NA IZMENI
	if(isset($_POST['sbmIzmeniGlavniLink'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		
		//PRAVE SE PROMENLJIVE U KOJE SE DODAJU PROIZVOLJNE VREDNOSTI, OD STRANE ADMIN-A
		//TE VREDNOSTI SE KORISTE DA BI UPITOM AŽURIRALE BAZU, SA VEĆ POSTOJEĆIM PODACIMA
		$naziv = $_POST['izmeniNazivLinka'];
		$pozcijaLinka = $_POST['izmeniPozicijuLinka'];
		$putanja = $_POST['izmeniPutanjuLinka'];
		$sakrivenId = $_POST['sakrivenId'];
		
		//PROVERA SE DA LI SE UNETA POZICIJA (ID_POZ), PODUDARA SA NEKIM DRUGIM PODATKOM, VEĆ POSTOJEĆIM  
		$selectPozicija = "SELECT * FROM glavni_meni WHERE poz_linka = $pozcijaLinka";
		$result = mysql_query($selectPozicija,$con);
		$linkCeo = mysql_fetch_assoc($result);
		
		//UKOLIKO SE PODUDARA, AŽURIRA SE PODATAK ZA KOJI SMO HTELI DA UNESEMO
		//NOVU POZICIJU, SA NOVOM POZICIJOM
		if($linkCeo['id_linka'] == $sakrivenId){
			$updateQuery = "UPDATE `glavni_meni` SET `naziv_linka`='$naziv',`poz_linka`='$pozcijaLinka',`putanja_linka`='$putanja' WHERE id_linka=$sakrivenId";
			$result = mysql_query($updateQuery,$con);
			
			if($result){
				print "Uspesno ste izmenili link!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}
		}
		
		
		else{
				
				$selectPozicija3 = "SELECT * FROM glavni_meni WHERE id_linka=$sakrivenId";
				$result3 = mysql_query($selectPozicija3,$con);
				$oldLink = mysql_fetch_assoc($result3);
				$oldPosition = $oldLink['poz_linka'];
				print $oldPosition;
				$updateQuery1 = "UPDATE `glavni_meni` SET `poz_linka`='666' WHERE id_linka={$linkCeo['id_linka']}";
				$result1 = mysql_query($updateQuery1,$con);
				$updateQuery2 = "UPDATE `glavni_meni` SET `naziv_linka`='$naziv',`poz_linka`='$pozcijaLinka',`putanja_linka`='$putanja' WHERE id_linka=$sakrivenId";
				$result2 = mysql_query($updateQuery2,$con);
				$updateQuery4 = "UPDATE `glavni_meni` SET `poz_linka`='$oldPosition' WHERE poz_linka=666";
				$result5 = mysql_query($updateQuery4,$con);
				if($result5){
					print "Uspesno ste izmenili link!";
				}
				else{
					echo "<p class='error_reg'> Doslo je do greske </p>";
				}
			}
	}
	
/* -------------------P O D M E N I------------------------- */
/* --------------------------------------------------------- */	
	
	else if(isset($_POST['sbmIzmeniPodlink'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		//PRAVE SE PROMENLJIVE U KOJE SE DODAJU PROIZVOLJNE VREDNOSTI, OD STRANE ADMIN-A
		//TE VREDNOSTI SE KORISTE DA BI UPITOM AŽURIRALE BAZU, SA VEĆ POSTOJEĆIM PODACIMA
		$naziv = $_POST['izmeniNazivLinka'];
		$slika = $_FILES['izmeniSlikuLinka'];
		$slikaTMPIme = $slika['tmp_name'];
		$slikaNaziv = $slika['name'];
		$folder = "slike/";
		$pozcijaLinka = $_POST['izmeniPozicijuLinka'];
		$putanja = $_POST['izmeniPutanjuLinka'];
		$sakrivenId = $_POST['sakrivenId'];
		
		//PROVERA SE DA LI SE UNETA POZICIJA (ID_POZ), PODUDARA SA NEKIM DRUGIM PODATKOM, VEĆ POSTOJEĆIM  
		$selectPozicija = "SELECT * FROM podmeni WHERE poz_linka = $pozcijaLinka";
		$result = mysql_query($selectPozicija,$con);
		$linkCeo = mysql_fetch_assoc($result);
		
		//UKOLIKO SE PODUDARA, AŽURIRA SE PODATAK ZA KOJI SMO HTELI DA UNESEMO
		//NOVU POZICIJU, SA NOVOM POZICIJOM
		if($linkCeo['id_linka'] == $sakrivenId){

			if($slikaNaziv != ""){
				$updateSlika = ",`slika`='$folder$slikaNaziv'";
			}
			else{
				$updateSlika = "";
			}
			$updateQuery = "UPDATE `podmeni` SET `naziv_linka`='$naziv' $updateSlika,`poz_linka`=$pozcijaLinka,`putanja_linka`='$putanja' WHERE id_linka=$sakrivenId";
			$result = mysql_query($updateQuery,$con);
			if($result){
				move_uploaded_file($slikaTMPIme,$folder.$slikaNaziv);
				print "Uspesno ste izmenili link!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}
		}
		
		else{
				
				$selectPozicija3 = "SELECT * FROM podmeni WHERE id_linka=$sakrivenId";
				$result3 = mysql_query($selectPozicija3,$con);
				$oldLink = mysql_fetch_assoc($result3);
				$oldPosition = $oldLink['poz_linka'];
				print $oldPosition;
				$updateQuery1 = "UPDATE `podmeni` SET `poz_linka`='666' WHERE id_linka={$linkCeo['id_linka']}";
				$result1 = mysql_query($updateQuery1,$con);
				$updateQuery2 = "UPDATE `podmeni` SET `naziv_linka`='$naziv',`poz_linka`='$pozcijaLinka',`putanja_linka`='$putanja' WHERE id_linka=$sakrivenId";
				$result2 = mysql_query($updateQuery2,$con);
				$updateQuery4 = "UPDATE `podmeni` SET `poz_linka`='$oldPosition' WHERE poz_linka=666";
				$result5 = mysql_query($updateQuery4,$con);
				if($result5){
					print "Uspesno ste izmenili link!";
				}
				else{
					echo "<p class='error_reg'> Doslo je do greske </p>";
				}
			}
	}
	
/* ----------------------P R O C E S O R------------------------ */
/* ------------------------------------------------------------- */	
	
	else if(isset($_POST['sbmIzmeniProcesor'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		
		$naziv = $_POST['izmeniNazivProcesora'];
		$frekvencijaProcesora = $_POST['izmeniFrekvencijuProcesora'];
		$brojProcesora = $_POST['izmeniBrojProcesora'];
		
		
		$slika1 = $_FILES['izmeniSlikuProcesora1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		if(isset($_FILES['izmeniSlikuProcesora2'])){
			
			$slika2 = $_FILES['izmeniSlikuProcesora2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slikaNaziv2 = "";
		}
		if(isset($_FILES['izmeniSlikuProcesora3'])){
			$slika3 = $_FILES['izmeniSlikuProcesora3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slikaNaziv3 = "";
		}
		
		$folder = "slike/";
		$sakrivenId = $_POST['hiddenId'];
		$opis = $_POST['izmeniOpisProcesora'];
		$cena = $_POST['izmeniCenuProcesora'];
		$datum = date(mktime());
		
		$selectProcesor = "SELECT * FROM `procesori` WHERE id_procesora = $sakrivenId";
		$result = mysql_query($selectProcesor,$con);
		$linkCeo = mysql_fetch_assoc($result);
		if($linkCeo['id_procesora'] == $sakrivenId){
			$updateQuery = "UPDATE `procesori` SET `naziv_procesora`='$naziv',`frekvencija`='$frekvencijaProcesora',`broj_procesora`='$brojProcesora',`slika1`='$folder$slikaNaziv1',`slika2`='$folder$slikaNaziv2',`slika3`='$folder$slikaNaziv3',`opis`='$opis',`cena`='$cena',`datum`='$datum' WHERE id_procesora = $sakrivenId";
			$result = mysql_query($updateQuery,$con);
			if($result){
				move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
				if(isset($_FILES['izmeniSlikuProcesora2'])){
					move_uploaded_file($slikaTMPIme2,$folder.$slikaNaziv2);
				}
				if(isset($_FILES['izmeniSlikuProcesora3'])){
					move_uploaded_file($slikaTMPIme3,$folder.$slikaNaziv3);
				}
				print "Uspesno ste izmenili link!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}
		}
		
		else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
				
			}
	}

/* -----------G R A F I Č K A -- K A R T I C A---------------- */
/* ----------------------------------------------------------- */	
	
	
	else if(isset($_POST['sbmIzmeniGraficku'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		
		$naziv = $_POST['izmeniNazivGraficke'];
		$memorijaGraficke = $_POST['izmeniMemorijuGraficke'];
		
		$slika1 = $_FILES['izmeniSlikuGraficke1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		if(isset($_FILES['izmeniSlikuGraficke2'])){
			
			$slika2 = $_FILES['izmeniSlikuGraficke2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slikaNaziv2 = "";
		}
		if(isset($_FILES['izmeniSlikuGraficke3'])){
			$slika3 = $_FILES['izmeniSlikuGraficke3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slikaNaziv3 = "";
		}
		
		$folder = "slike/";
		$sakrivenId = $_POST['hiddenId'];
		$opis = $_POST['izmeniOpisGraficke'];
		$cena = $_POST['izmeniCenuGraficke'];
		$datum = date(mktime());
		
		$selectProcesor = "SELECT * FROM `graficke` WHERE id_graficke = $sakrivenId";
		$result = mysql_query($selectProcesor,$con);
		$linkCeo = mysql_fetch_assoc($result);
		if($linkCeo['id_graficke'] == $sakrivenId){
			$updateQuery = "UPDATE `graficke` SET `naziv_graficke`='$naziv',`memorija`='$memorijaGraficke',`slika1`='$folder$slikaNaziv1',`slika2`='$folder$slikaNaziv2',`slika3`='$folder$slikaNaziv3',`opis`='$opis',`cena`='$cena',`datum`='$datum' WHERE id_graficke = $sakrivenId";
			$result = mysql_query($updateQuery,$con);
			if($result){
				move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
				if(isset($_FILES['izmeniSlikuGraficke2'])){
					move_uploaded_file($slikaTMPIme2,$folder.$slikaNaziv2);
				}
				if(isset($_FILES['izmeniSlikuGraficke3'])){
					move_uploaded_file($slikaTMPIme3,$folder.$slikaNaziv3);
				}
				print "Uspesno ste izmenili link!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}
		}
		
		else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
				
			}
	}
	
/* ------------------------M E M O R I J A------------------------------ */
/* --------------------------------------------------------------------- */	

	
	else if(isset($_POST['sbmIzmeniMemoriju'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		
		$naziv = $_POST['izmeniNazivMemorije'];
		$kolicinaMemorije = $_POST['izmeniKolicinuMemorije'];
		
		$slika1 = $_FILES['izmeniSlikuMemorije1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		if(isset($_FILES['izmeniSlikuMemorije2'])){
			
			$slika2 = $_FILES['izmeniSlikuMemorije2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slikaNaziv2 = "";
		}
		if(isset($_FILES['izmeniSlikuMemorije3'])){
			$slika3 = $_FILES['izmeniSlikuMemorije3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slikaNaziv3 = "";
		}
		
		$folder = "slike/";
		$sakrivenId = $_POST['hiddenId'];
		$opis = $_POST['izmeniOpisMemorije'];
		$cena = $_POST['izmeniCenuMemorije'];
		$datum = date(mktime());
		
		$selectProcesor = "SELECT * FROM `memorije` WHERE id_memorije = $sakrivenId";
		$result = mysql_query($selectProcesor,$con);
		$linkCeo = mysql_fetch_assoc($result);
		if($linkCeo['id_memorije'] == $sakrivenId){
			$updateQuery = "UPDATE `memorije` SET `naziv_memorije`='$naziv',`kolicina`='$kolicinaMemorije',`slika1`='$folder$slikaNaziv1',`slika2`='$folder$slikaNaziv2',`slika3`='$folder$slikaNaziv3',`opis`='$opis',`cena`='$cena',`datum`='$datum' WHERE id_memorije = $sakrivenId";
			$result = mysql_query($updateQuery,$con);
			if($result){
				move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
				if(isset($_FILES['izmeniSlikuMemorije2'])){
					move_uploaded_file($slikaTMPIme2,$folder.$slikaNaziv2);
				}
				if(isset($_FILES['izmeniSlikuMemorije3'])){
					move_uploaded_file($slikaTMPIme3,$folder.$slikaNaziv3);
				}
				print "Uspesno ste izmenili link!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}
		}
		
		else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
				
			}
	}
	
	
/* ------------------------H A R D---D I S K-------------------------------- */
/* ------------------------------------------------------------------------- */	

	
	else if(isset($_POST['sbmIzmeniHardDisk'])){
		//KONEKCIJA SA BAZOM
		include_once("konekcija.inc");
		
		$naziv = $_POST['izmeniNazivHardDiska'];
		$kolicinaMemorije = $_POST['izmeniKolicinuMemorije'];
		
		$slika1 = $_FILES['izmeniSlikuHardDiska1'];
		$slikaTMPIme1 = $slika1['tmp_name'];
		$slikaNaziv1 = $slika1['name'];
		if(isset($_FILES['izmeniSlikuHardDiska2'])){
			
			$slika2 = $_FILES['izmeniSlikuHardDiska2'];
			$slikaTMPIme2 = $slika2['tmp_name'];
			$slikaNaziv2 = $slika2['name'];
		}
		else{
			$slikaNaziv2 = "";
		}
		if(isset($_FILES['izmeniSlikuHardDiska3'])){
			$slika3 = $_FILES['izmeniSlikuHardDiska3'];
			$slikaTMPIme3 = $slika3['tmp_name'];
			$slikaNaziv3 = $slika3['name'];
		}
		else{
			$slikaNaziv3 = "";
		}
		
		$folder = "slike/";
		$sakrivenId = $_POST['hiddenId'];
		$opis = $_POST['izmeniOpisHardDiska'];
		$cena = $_POST['izmeniCenuHardDiska'];
		$datum = date(mktime());
		
		$selectProcesor = "SELECT * FROM `hard_diskovi` WHERE id_hard_diska = $sakrivenId";
		$result = mysql_query($selectProcesor,$con);
		$linkCeo = mysql_fetch_assoc($result);
		if($linkCeo['id_hard_diska'] == $sakrivenId){
			$updateQuery = "UPDATE `hard_diskovi` SET `naziv_hard_diska`='$naziv',`kolicina_memorije`='$kolicinaMemorije',`slika1`='$folder$slikaNaziv1',`slika2`='$folder$slikaNaziv2',`slika3`='$folder$slikaNaziv3',`opis`='$opis',`cena`='$cena',`datum`='$datum' WHERE id_hard_diska = $sakrivenId";
			$result = mysql_query($updateQuery,$con);
			if($result){
				move_uploaded_file($slikaTMPIme1,$folder.$slikaNaziv1);
				if(isset($_FILES['izmeniSlikuHardDiska2'])){
					move_uploaded_file($slikaTMPIme2,$folder.$slikaNaziv2);
				}
				if(isset($_FILES['izmeniSlikuHardDiska3'])){
					move_uploaded_file($slikaTMPIme3,$folder.$slikaNaziv3);
				}
				print "Uspesno ste izmenili link!";
			}
			else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
			}
		}
		
		else{
				echo "<p class='error_reg'> Doslo je do greske </p>";
				
			}
	}	
	
/* -----------------------U P D A T E---K R A J--------------------------- */
/* ----------------------------------------------------------------------- */	
	
?>
	</body>
	
	
</html>