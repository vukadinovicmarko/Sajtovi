<?php 
	include_once("header.php");
?>

		<div class="ocisti">
			</div>
		<div id="sajt_sredina">
			
			<div id="sajt_sredina_gore">
				<div class="deoSlika">
					<div id="zaglavlje_slika">
							<img src="slike/slideshow/slika01.jpg" width="1000px" height="300px" name="slika" id="slika" alt="" onMouseOver="zaustavi()" onMouseOut="prvo()" />
					</div>
				</div>
			</div>
			<div id='sajt_sredina_ostalo'>
				<div id="sajt_levo">
					<div id="anketa">
							
							<div id="pozicija_tabele">
								<form name="anketa">
									<table id="anketa-tabela">
										<tr>
											<th colspan="2" class="naslov">Molimo, ocenite nas sajt</th>
										</tr>
										<tr>
											<td class="leva_kolona">Ocena :</td>
											<td class="radioB">
												<input type="radio" name="rbOcena" id="rbLos" value="Los" class="radioB"/> LOS<br/><br/>
												<input type="radio" name="rbOcena" id="rbNijeLos" value="Nije los" class="radioB"/> NIJE LOS<br/><br/>
												<input type="radio" name="rbOcena" id="rbDobar" value="Dobar" class="radioB"/> DOBAR<br/><br/>
												<input type="radio" name="rbOcena" id="rbVrloDobar" value="Vrlo dobar" class="radioB"/> VRLO DOBAR<br/><br/>
												<input type="radio" name="rbOcena" id="rbOdlican" value="Odličan" class="radioB"/> ODLICAN<br/><br/>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="center" class="dugmici_anketa">
												<input type="button"  onClick="aanketa();" value="OCENI" class="dugme"/>
												<input type="reset" value="PONISTI" class="dugme"/>
											</td>
										</tr>
									</table>
								</form>
							</div>	
						</div>
					</div>
					<div id="sajt_desno">
						<?php 
						if(isset($_GET['id'])){
							include_once("sadrzajIndexa.php");
						}
						else{
							echo "<h2 class='sadrzaj_naslov'> DOBRODOŠLI!</h2>
									<p class='tekst'>e-Shop, jedna od najvećih prodavnica u Beogradu, otvorena 2015. godine. Ovde možete naći računarske komponente, kompletne računare, koji su spremni da rade u vašoj kući već od danas.</br></br>
									Nalazimo se u samom centru grada, a možete naš asortiman kupiti i od kuće.";
						}
						?>
						
						
						
					</div>
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
	
	
	