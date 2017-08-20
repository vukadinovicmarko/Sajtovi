<?php 
	
	
	
	include_once("header.php");
?>
<div class="ocisti"></div>
	
				
			</div>
			<div id='sajt_sredina_komponente'>
				<div id='naslov_slike'><p>Oceni sliku</p>
				</div>
				<div id='ocenjivanje_slika_sve'>
					<div id='rezultat_ocenjivanja'>
						<?php
						include_once("konekcija.inc");
						$selectAll = "SELECT * FROM `slike` ";
						$rezultatAll = mysql_query($selectAll,$con);
						$randomBroj = ceil(rand(0,(mysql_num_rows($rezultatAll)-1)));
						$randomBroj++;
					
						$select="SELECT * FROM `ocene_slike` WHERE `id_slike` = $randomBroj ";
						
						$rezultat=mysql_query($select,$con);
						
						if($rezultat){
						
							$ukupnoOcena = mysql_num_rows($rezultat);
							if($ukupnoOcena == 0){
								echo "Prosečna ocena za trenutnu sliku je : $ukupnoOcena ";
							}
							else{
							$zbirOcena = 0;
							while( $ocena = mysql_fetch_assoc($rezultat)){
							  $zbirOcena += $ocena['ocena_slike'];
							}
							$krajnjiRezultat = $zbirOcena/$ukupnoOcena;
							echo "Prosečna ocena za trenutnu sliku je : ". round($krajnjiRezultat,2);
							}
						}
						?>
					</div>
					<div id='ocenjivanje_slika_gore'>
						
						<div id='slika_za_ocenjivanje'>
						
						<?php
							
							
							$randomBroj--;
							$selectSlika = "SELECT * FROM `slike`  LIMIT 1 OFFSET $randomBroj";
							
							$rezultatSlika = mysql_query($selectSlika,$con);
							if($rezultatSlika){
								while($slikeFecovano = mysql_fetch_assoc($rezultatSlika)){
								
							echo "<img src='slike/seminarski/{$slikeFecovano['slika_putanja']}' width='600' height='338'/>";
							echo "	<input type='hidden' class='idSlike' value='{$slikeFecovano['id_slika']}'/>";
								}
								
							}
						
						?>
						<div id='ocenjivanje_slika_dole' >
						
							<table id='tabela_oceni'>
								<tr>
									<td id='tabela_oceni_levo'>
										<input type='radio' name='ocena' value='1'/>1
										<input type='radio' name='ocena' value='2'/>2
										<input type='radio' name='ocena' value='3'/>3
										<input type='radio' name='ocena' value='4'/>4
										<input type='radio' name='ocena' value='5'/>5
									</td>
									<td id='tabela_oceni_desno'><input type='button' name='sbmOceni' onClick='oceni_sliku();'  class='oceni' value='Oceni'/>
									<input type='button' name='sbmPreskoci' class='preskoci' onClick='window.location.reload();' value='Preskoči'/></td>
								</tr>
							</table>
					
					</div>
						</div>
						<div id='opis_slike'>
						<?php
							$selectSlika = "SELECT * FROM `slike`  LIMIT 1 OFFSET $randomBroj";
							
							$rezultatSlika = mysql_query($selectSlika,$con);
							if($rezultatSlika){
							while($slikeFecovano = mysql_fetch_assoc($rezultatSlika)){
						echo "	<p>{$slikeFecovano['slika_opis']}</p>";
							}
							}
						?>
						
						
						</div>
						
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
										<li><a href='index.php?id=1'>O nama</a></li>
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


	
