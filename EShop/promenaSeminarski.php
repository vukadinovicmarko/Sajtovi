<?php 
	
	
	if(isset($_GET['vrednost'])){
		
		
		$idSlike = $_GET['id'];
		$ocena = $_GET['vrednost'];
		
		include_once("konekcija.inc");
		$insert="INSERT INTO `ocene_slike`(`id_slike`, `ocena_slike`) VALUES ('$idSlike','$ocena')";
		
		$rezultat=mysql_query($insert,$con);
		if($rezultat){
			?>
							
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
				
					<?php
		}
		else{
			
		}
		
		
		
	}
	else{
		echo "ne valja";
	}
	
	
?>
