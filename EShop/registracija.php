<?php 

	include_once("header.php");
	
	
	include_once("konekcija.inc");
     
?>

<div class="ocisti"></div>
	<div id="sajt_sredina_komponente">


				<div id="registracija">
					<form name="registracija" action='<?php echo $_SERVER['PHP_SELF'];?>' method='POST'>
						<fieldset id="fildset-registracija">
							<legend align="center" id="legenda">REGISTRACIJA</legend>
							<table id= "tbReg" align='center'>
								<tr>
									<td class="rgLevo" id = "rgLevoIme">Korisničko Ime:</td>
									<td class="rgDesno" id = "rgDesnoIme"><input type="text" size="25" id="rgIme" name='rgIme' value="" onBlur="proveraIme();" />&nbsp *</td>
								</tr>
								<tr>
									<td class="rgLevo" id = "rgLevoEmail">E-mail</td>
									<td class="rgDesno" id = "rgDesnoEmail"><input type="text" size="25" id="rgEmail" name='rgEmail' value="" onBlur="proveraEmail();" />&nbsp *</td>
								</tr>
								<tr>
									<td class="rgLevo" id = "rgLevoSifra">Lozinka</td>
									<td class="rgDesno" id = "rgDesnoSifra"><input type="password" size="25" id="rgSifra" name='rgSifra' value="" onBlur="proveraSifra();" />&nbsp *</td>
								</tr>
								<tr>
									<td class="rgLevo" id = "rgLevoPotvrdaSifre">Potvrda lozinke</td>
									<td class="rgDesno" id = "rgDesnoPotvrdaSifre"><input type="password" size="25" id="rgPotvrdaSifre" name='rgPotvrdaSifre' value="" onBlur="proveraPotvrdaSifre();" />&nbsp *</td>
								</tr>
							
									
								
								
								
								
								<tr>
									<td></td>
									<td align="center"></br>
										<input type="button" class="dugme" value="Registruj se" name='sbmDodaj' onClick="nastavak();"></input>
										<input type="reset" class="dugme" value="Poništi"></input>
									</td>
									</tr>
								
								
							</table>
							</br>
							<hr></hr>
							<p id="zvezdica">Sva polja označena zvezdicom (*) su obavezna!</p>
							
							
							<div id="greske"></div>
						</fieldset>
					
					</form>
					

				</div>
	</div>
	
	<div class="ocisti">
		</div>
		<div id="sajt_dole">
			<div id="footer">
				<div id="footer_sadrzaj">
						
						<div id="footer_sadrzaj_tekst">
							
								<div class='linkovi'>
									<div class="link_naslov">
										<a href='index.php'>e-Shop</a>
									</div>
									<div class="link_ostalo">
										<li><a href='index.php?id=2'>O AUTORU</a></li>
										<li><a href='index.php?id=3'>KONTAKT</a></li>
										<li><a href='index.php?id=4'>SITEMAP</a></li>
										<li><a href='Dokumentacija.pdf'>DOKUMENTACIJA</a></li>
									</div>
								</div>
								
												
								<div class='linkovi'>
									<div class="link_naslov">
										<a href='#'>Računarske Komponente</a>
									</div>
									<div class="link_ostalo">
										<li><a href='komponente.php?id=1'>Procesori</a></li>
										<li><a href='komponente.php?id=2'>Grafičke Kartice</a></li>
										<li><a href='komponente.php?id=3'>Memorije</a></li>
										<li><a href='komponente.php?id=4'>Hard Diskovi</a></li>
									</div>
								</div>
								
								<div class='linkovi'>
									<div class="link_naslov">
										<a href='#'>Računari</a>
									</div>
									<div class="link_ostalo">
										<li><a href='racunari.php?id=1'>Desktop Računari</a></li>
										<li><a href='racunari.php?id=2'>Notebook Računari</a></li>
									</div>
								</div>								
								
								
							
						</div>
						<div id='footer_autor'>
							<h1>website created by : <a href='index.php?id=2'>Marko Vukadinovic</a></h1>
						</div>
					</div>
				
			</div>
		</div>