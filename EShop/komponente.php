<?php 
if(!isset($_GET['id']) && !isset($_GET['idKomp'])){
	header("Location: index.php");
}
	if(isset($_GET['limit'])){
		$limit = $_GET['limit'];
	}
	else{
		$limit=0;
	}
	if(!isset($_GET['idKomp'])){
	$idKomponente = $_GET['id'];
		$stranicenje = 5;
		include_once("konekcija.inc");
		switch($idKomponente){
			case "1" : $select = "SELECT * FROM procesori LIMIT $limit, $stranicenje"; 
				$selectTotal = "SELECT * FROM procesori"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_procesor";
				$nazivKomp = "naziv_procesora";
				$dodatakKomp1 = "frekvencija";
				$dodatakKomp2 = "broj_procesora";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			case "2" : $select = "SELECT * FROM graficke LIMIT $limit, $stranicenje"; 
				$selectTotal = "SELECT * FROM graficke"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_graficke";
				$nazivKomp = "naziv_graficke";
				$dodatakKomp1 = "memorija";
				$dodatakKomp2 = "";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			case "3" : $select = "SELECT * FROM memorije LIMIT $limit, $stranicenje"; 
				$selectTotal = "SELECT * FROM memorije"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_memorije";
				$nazivKomp = "naziv_memorije";
				$dodatakKomp1 = "kolicina";
				$dodatakKomp2 = "";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			case "4" : $select = "SELECT * FROM hard_diskovi LIMIT $limit, $stranicenje"; 
				$selectTotal = "SELECT * FROM hard_diskovi"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = 'id_hard_diska';
				$nazivKomp = "naziv_hard_diska";
				$dodatakKomp1 = "kolicina_memorije";
				$dodatakKomp2 = "";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			
		}
		$rezultat = mysql_query($select,$con);
	}
	else{
		$idTipa = $_GET['idTipa'];
		include_once("konekcija.inc");
		switch($idTipa){
			case "1" :
				$select = "SELECT * FROM procesori WHERE id_procesora = {$_GET['idKomp']}"; 
				$idKomp = "id_procesor";
				$nazivKomp = "naziv_procesora";
				$dodatakKomp1 = "frekvencija";
				$dodatakKomp2 = "broj_procesora";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			case "2" : 
				$select = "SELECT * FROM graficke WHERE id_graficke='{$_GET['idKomp']}'"; 
				$idKomp = "id_graficke";
				$nazivKomp = "naziv_graficke";
				$dodatakKomp1 = "memorija";
				$dodatakKomp2 = "";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			case "3" : $select = "SELECT * FROM memorije LIMIT $limit, $stranicenje"; 
				$selectTotal = "SELECT * FROM memorije"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_memorije";
				$nazivKomp = "naziv_memorije";
				$dodatakKomp1 = "kolicina";
				$dodatakKomp2 = "";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
			case "4" : $select = "SELECT * FROM hard_diskovi LIMIT $limit, $stranicenje"; 
				$selectTotal = "SELECT * FROM hard_diskovi"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = 'id_hard_diska';
				$nazivKomp = "naziv_hard_diska";
				$dodatakKomp1 = "kolicina_memorije";
				$dodatakKomp2 = "";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
			break;
		}
		$rezultat = mysql_query($select,$con);
	}
	include_once("header.php");
?>
<div class="ocisti"></div>
	<div id="sajt_sredina_komponente">
		<div id='levo'>
			<table class='tabela_levo'>
				<tr>
					<th>Sortiraj po:</th>
				</tr>
				<tr>
					<td><input type='radio' onClick='sortiranje(this);' name='sort' value='ime'/>Imenu</td>
				</tr>	
				<tr>
					<td><input type='radio' onClick='sortiranje(this);'  name='sort' value='ASC'/>Ceni (od najmanje ka najvećoj)</td> 
				</tr>
				<tr>
					<td><input type='radio' onClick='sortiranje(this);'  name='sort' value='DESC'/>Ceni (od najveće ka najmanjoj)</td> 
					
				</tr>
				
				
				<tr>
				
					<th >Filtriraj po:</th>
				</tr>
			<?php 
			
					$id = $_GET['id'];
					switch($id){
						case "1" :
							$select = "SELECT naziv_procesora FROM procesori";
							$rez = mysql_query($select,$con);
							
							while($filter = mysql_fetch_assoc($rez)){
								$testQuery = strstr($filter['naziv_procesora']," ",true);
								if( @strpos($outputFilter,$testQuery) === false  && $testQuery != "" ) {
									@$outputFilter .="<tr>
											<td><input type='radio' name='M' value='".strstr($filter['naziv_procesora']," ",true)."' onClick='filtriraj(this);' />".strstr($filter['naziv_procesora']," ",true)."</td>
										</tr>";
								}
							}
							@$outputFilter .="<tr><td><input type='button' value='Ponisti' onClick='ponisti();'/></td></tr>";
							echo $outputFilter;
						break;
						case "2" :
							$select = "SELECT naziv_graficke FROM graficke";
							$rez = mysql_query($select,$con);
							
							while($filter = mysql_fetch_assoc($rez)){
								$testQuery = strstr($filter['naziv_graficke']," ",true);
								if( @strpos($outputFilter,$testQuery) === false  && $testQuery != "" ) {
									@$outputFilter .="<tr>
											<td><input type='radio' name='M' value='".strstr($filter['naziv_graficke']," ",true)."'onClick='filtriraj(this);' value='M'/>".strstr($filter['naziv_graficke']," ",true)."</td>
										</tr>";
								}
							}
							@$outputFilter .="<tr><td><input type='button' value='Ponisti' onClick='ponisti();'/></td></tr>";
							echo $outputFilter;
						break;
						case "3" :
							$select = "SELECT naziv_memorije FROM memorije";
							$rez = mysql_query($select,$con);
							
							while($filter = mysql_fetch_assoc($rez)){
								$testQuery = strstr($filter['naziv_memorije']," ",true);
								if( @strpos($outputFilter,$testQuery) === false  && $testQuery != "" ) {
									@$outputFilter .="<tr>
											<td><input type='radio' name='M' value='".strstr($filter['naziv_memorije']," ",true)."'onClick='filtriraj(this);'/>".strstr($filter['naziv_memorije']," ",true)."</td>
										</tr>";
								}
							}
							@$outputFilter .="<tr><td><input type='button' value='Ponisti' onClick='ponisti();'/></td></tr>";
							echo $outputFilter;
						break;
						case "4" :
							$select = "SELECT * FROM hard_diskovi";
							$rez = mysql_query($select,$con);
							while($filter = mysql_fetch_assoc($rez)){
								$testQuery = strstr($filter['naziv_hard_diska']," ",true);
								if( @strpos($outputFilter,$testQuery) === false  && $testQuery != "" ) {
									@$outputFilter .="<tr>
											<td><input type='radio' name='M' value='".strstr($filter['naziv_hard_diska']," ",true)."'onClick='filtriraj(this);'/>".strstr($filter['naziv_hard_diska']," ",true)."</td>
										</tr>";
								}
							}
							@$outputFilter .="<tr><td><input type='button' value='Ponisti' onClick='ponisti();'/></td></tr>";
							echo $outputFilter;
						break;
					}
			
			?>
				
				
			</table>
		</div>
		<div id='desno'>
			<div id='blok'>
				<?php 
					
					while($komponente = mysql_fetch_assoc($rezultat)){	
						echo "
							<div class='komponenta'>
								<img src='{$komponente[$slika1]}' width='150' height='150'/>
								<table class='tabela_procesora'>
									<tr> 
										
										<td colspan='2'> {$komponente[$nazivKomp]} </td>
									</tr>
									
									<tr> 
										
										<td colspan='2'> 
											<p>"; if ( isset($dodatakKomp1) && $dodatakKomp1 != "")
												{ echo str_replace("_"," ",ucfirst($dodatakKomp1))." : ".@$komponente[$dodatakKomp1]; } echo"</p>
											<p>"; if ( isset($dodatakKomp2) && $dodatakKomp2 != "")
											{ echo str_replace("_"," ",ucfirst($dodatakKomp2))." : ".@$komponente[$dodatakKomp2]; } echo "</p>									
										</td>
									</tr>
									
									
									<tr> 
										<th> Cena : </th> 
										<td> {$komponente[$cena]}&nbspEUR </td>
									</tr>
									</table>
								
							</div>
						";
						
					}
					?>
				
			</div>	
				
				<?php
				
				
				
				if(!isset($_GET['idKomp'])){
					echo "<div id='stranicenje_brojevi'>";
					if($ukupno > $stranicenje ){
						for($i=0; $i <= $ukupno; $i++){
								if($i == 0){
									echo "<a ";
									if($limit != $i){						
											echo "href='/komponente.php?id={$_GET['id']}&limit=$i' ";
									}
									echo ">0</a>";
									$i++;
								}
								if($i % $stranicenje == 0){
									echo "<a ";
									if($limit != $i){
										echo "href='/komponente.php?id={$_GET['id']}&limit=$i' ";
									}
									echo ">".(int)$i/$stranicenje."</a>";
								}
						}
					}
					echo "</div>";
				}
			?>
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