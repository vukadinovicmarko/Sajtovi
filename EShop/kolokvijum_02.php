<html>
	<head>
		<script>
			function provera()
			{
				var tbIme=document.getElementsByName('tbIme').value;
				var tbPrezime=document.getElementsByName('tbPrezime').value;
				var rbTelefon=document.getElementsByName('rbTelefon').value;
				var tbBrojTelefona=document.getElementsByName('tbBrojTelefona').value;
				var ddlStaz=document.getElementsByName('ddlStaz').value;
				var tbUkupniStaz=document.getElementsByName('tbUkupniStaz').value;
				
				var reIme=/^[A-Z][a-b]{2,}$/;
				var rePrezime=/^[A-Z][a-b]{2,}$/;
				var reBrojTelefona=/^06[0-6,9]\/[0-9]{6,7}$/;
				var reUkupniStaz=/^[1-9][0-9]?$/;
				
				var greske=new Array();
				var podaci=new Array();
				
				if(reIme.test(tbIme))
				{
					podaci.push(tbIme);
				}
				else
				{
					greske.push("Ime nije dobro.");
				}
				if(rePrezime.test(tbPrezime))
				{
					podaci.push(tbPrezime);
				}
				else
				{
					greske.push("Prezime nije dobro.");
				}
				
				if(reBrojTelefona.test(tbBrojTelefona))
				{
					podaci.push(tbBrojTelefona);
				}
				else
				{
					greske.push("Nije dobar telefon.");
				}
				
				if(reUkupniStaz.test(tbUkupniStaz))
				{
					podaci.push(tbUkupniStaz);
				}
				else
				{
					greske.push("Staz mora da bude od 1-99.");
				}
				var text="";
				
				if(greske.length>0)
				{
					text="<ol>";
					for(i in greske)
					{
						text+="<li>"+greske[i]+"</li>"
					}
					text+="</ol>";
				}
				else
				{
					text="<ol>";
					for(i in podaci)
					{
						text+="<li>"+podaci[i]+"</li>"
					}
					text+="</ol>";
				}
				document.getElementById('ispis').innerHTML=text;
				
				if(greske.length>0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
		</script>
	</head>
	<body>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="anketa" method='post' enctype="multipart/form-data" >
			<table>
				<tr>
					<td>Ime:</td>
					<td><input 
					<?php 
						if(isset($_POST['btPrijava']) && empty($_POST['tbIme'])){
					?>
					style='border:1px solid red;'
					<?php
						}
					?>
					type="text" name="tbIme" </td>
				</tr>
				<tr>
					<td>
						Prezime:
					</td>
					<td>
						<input type="text" name="tbPrezime"/>
					</td>
				</tr>
				<tr>
					<td>
						Da li imate telefon:
					</td>
					<td>
						<input type="radio" name="rbTelefon" value="da"/>Da</input>
						<input type="radio" name="rbTelefon" value="ne">Ne</input>
					</td>
				</tr>
				<tr>
					<td>Broj tel:</td>
					<td><input type="text" name="tbBrojTelefona"></input></td>
				</tr>
				<tr>
					<td>Radni staz:</td>
					<td>
						<select name="ddlStaz">
							<option value="Staz">Staz</option>
							<option value="Nema">Nemam</option>
							<option value="Ima">Imam</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Prilozite sliku</td>
					<td><input type="file" name="fajl"></td>
				</tr>
				<tr>
					<td>Ukupni staz:</td>
					<td><input type="text" name="tbUkupniStaz"></input></td>
				</tr>
				<?php
			if( date('H') < 23 && date("G") > 8 ){
				?>
				<tr>
					<td><input type="submit" name="btPrijava"  value="Prijava"></input></td>
				</tr>
				<?php
			}
			else {
				echo "<tr><td>kasno je! Pokusajte sutra posle 8 ujutro...</td></tr>";
			}
				?>
			</table>
		</form>
		<div id="ispis"></div>
		<?php
			if(isset($_POST['btPrijava']))
			{
				$tbIme=$_POST['tbIme'];
				$tbPrezime=$_POST['tbPrezime'];
				$rbTelefon=$_POST['rbTelefon'];
				$tbBrojTelefona=$_POST['tbBrojTelefona'];
				$ddlStaz=$_POST['ddlStaz'];
				$nazivFajla=$_FILES['fajl']['name'];
				$tempLokacijaFajla=$_FILES['fajl']['tmp_name'];
				//sad ce ga upload-ujemo (mislim na fajl)
				$noviNazivFajla="slike/marko_".$nazivFajla;
				$tbUkupniStaz=$_POST['tbUkupniStaz'];
				
				
				$podaci=array();
				$greske=array();
				
				if(preg_match('/^[A-Z][a-z]{2,}$/', $tbIme))
				{
					$podaci[]=$tbIme;
				}
				else
				{
					$greske[]="Ime nije dobro";
				}
				if(preg_match("/^[A-Z][a-z]{2,}$/", $tbPrezime))
				{
					$podaci[]=$tbPrezime;
				}
				else
				{
					$greske[]="Prezime nije dobro";
				}
				if(empty($rbTelefon))
				{
					$greske[]="morate izabrati da li imate telefon";
				}
				else
				{
					$podaci[]="Telefon: ".$rbTelefon;
				}
				
				if(preg_match("/^06[0-6,9]\/[0-9]{6,7}$/", $tbBrojTelefona))
				{
					$podaci[]=$tbBrojTelefona;
				}
				else
				{
					$greske[]="broj telefona nije dobro upisan";
				}
				if(empty($ddlStaz))
				{
					$greske[]="morate izabrati da li imate staz";
				}
				else
				{
					$podaci[]="Staz : ".$ddlStaz;
				}
				
				if(move_uploaded_file($tempLokacijaFajla, $noviNazivFajla))
				{
					$podaci[]= $noviNazivFajla;
				}
				else{
					$greske[]="ne valja slika";
				}
				
				if(preg_match("/^[1-9][0-9]?$/", $tbUkupniStaz))
				{
					$podaci[]=$tbUkupniStaz;
				}
				else
				{
					$greske[]="Ukupni staz mora biti od 1-99";
				}
				
				if($greske)
				{
					echo "Greske: <ol>";
					foreach($greske as $i)
					{
						echo "<li>$i</li>";
					}
					echo "</ol>";
				}
				else
				{
					echo "Podaci: <ol>";
					foreach($podaci as $i)
					{
						echo "<li>$i</li>";
					}
					echo "</ol>";
				}
				
				if(count($greske) == 0 ){
					include_once("konekcija_sa_bazom.inc");
					$upit_za_upisivanje="INSERT INTO baza_02.ANKETE VALUES('','$tbIme','$tbPrezime','$rbTelefon','$tbBrojTelefona','$ddlStaz','$noviNazivFajla','$tbUkupniStaz')";
					$rezultat_upisa=mysql_query($upit_za_upisivanje, $con) or die("Nije uspelo upisivanje zapisa u tabelu ANEKETE!".mysql_error());
					if($rezultat_upisa)
					{
						echo "<br/>Uspesno je dodat zapis u tabelu ANKETA!";
					}
					mysql_close($con);
				}
				else{
					die ("Doslo je do greske");
				}
			}
		?>
	</body>
</html>