<?php 

	include_once("header.php");
	$idKomponente = $_GET['id'];
	if(isset($_GET['limit'])){
		$limit = $_GET['limit'];
	}
	else{
		$limit=0;
	}
	$stranicenje = 5;
	include_once("konekcija.inc");
      $selectAll = "SELECT * FROM `desktop_racunari` dr JOIN racunari_tip_racunara rtr ON dr.id_racunara = rtr.id_racunara ORDER BY datum LIMIT $limit, $stranicenje";
      $rezultat = mysql_query($selectAll,$con);
 
				$selectTotal = "SELECT * FROM desktop_racunari"; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_racunara";
				$nazivKomp = "naziv_racunara";
				$dodatakKomp1 = "graficka";
				$dodatakKomp2 = "hard";
				$dodatakKomp3 = "memorija";
				$dodatakKomp4 = "procesor";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
?>

<div class="ocisti"></div>
	<div id="sajt_sredina_komponente">

<?php
				while($komponente = mysql_fetch_assoc($rezultat)){	
					echo "
						<div class='komponenta'>
							
							<img src='{$komponente[$slika1]}' width='150' height='150'/>
							<table class='tabela_procesora'>
								<tr> 
									<th> Naziv : </th>
									<td> {$komponente[$nazivKomp]} </td>
								</tr>
								
								<tr> 
									<th> Dodatne informacije : </th> 
									<td> 
										<p>"; if ( isset($dodatakKomp1) && $dodatakKomp1 != "") { echo str_replace("_"," ",ucfirst($dodatakKomp1))." : ".@$komponente[$dodatakKomp1]; } echo"</p>
										<p>"; if ( isset($dodatakKomp2) && $dodatakKomp2 != ""){ echo str_replace("_"," ",ucfirst($dodatakKomp1))." : ".@$komponente[$dodatakKomp2]; } echo "</p>		
										<p>"; if ( isset($dodatakKomp3) && $dodatakKomp3 != "") { echo str_replace("_"," ",ucfirst($dodatakKomp3))." : ".@$komponente[$dodatakKomp3]; } echo"</p>
										<p>"; if ( isset($dodatakKomp4) && $dodatakKomp4 != ""){ echo str_replace("_"," ",ucfirst($dodatakKomp4))." : ".@$komponente[$dodatakKomp4]; } echo "</p>									
									</td>
								</tr>
								
								<tr> 
									<th> Opis : </th> 
									<td> {$komponente[$opis]} </td>
								</tr>
								<tr> 
									<th> Cena : </th> 
									<td> {$komponente[$cena]}&nbspEUR </td>
								</tr>
								</table>
						</div>
					";
					
				}
				echo "<div id='stranicenje_brojevi'>";
					if($ukupno > $stranicenje ){
						for($i=0; $i <= $ukupno; $i++){
								if($i == 0){
									echo "<a ";
									if($limit != $i){
 $host = explode('?', $_SERVER['REQUIRE_URI'], 2);
										echo "href='".$host[0]."?limit=$i' ";
									}
									echo ">Po&#269;etna</a>";
									$i++;
								}
								if($i % $stranicenje == 0 && ($i+1) != $ukupno ){
									echo "<a ";
									if($limit != $i){
 $host = explode('?', $_SERVER['REQUIRE_URI'], 2);
										echo "href='".$host[0]."?limit=$i' ";
									}
									echo ">".(int)$i/$stranicenje."</a>";
								}
						}
					}
					echo "</div>";
?>
	</div>
	<div class="ocisti">
	</div>
	<div id="sajt_dole">
		<div id="footer">
			
			<div class="footer_ul">
				<li>Pocetna Strana</li>
				<li>o nama</li>
				<li>o autoru</li>
				<li>kontakt</li>
				
			</div>
			<h1>website created by : Marko Vukadinovic</h1>
		</div>
	</div>