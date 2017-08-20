<?php
	include_once('konekcija.inc');
		$stranicenje = 5;
		$limit = $_GET['limit'];
echo "<div id='blok'>";
	if($_GET['sort'] == "filter"){
		$po = $_GET['po'];
		$tip = $_GET['idTipa'];
		switch($tip){
			case "1": 
				$select = "SELECT * FROM procesori WHERE naziv_procesora LIKE '$po%' LIMIT $limit, $stranicenje";
				$selectTotal = "SELECT * FROM procesori WHERE naziv_procesora LIKE '$po%' "; 
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
			case "2": 
				$select = "SELECT * FROM graficke WHERE naziv_graficke LIKE '$po%' LIMIT $limit, $stranicenje";
				$selectTotal = "SELECT * FROM graficke WHERE naziv_graficke LIKE '$po%' "; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_graficke";
				$nazivKomp = "naziv_graficke";
				$dodatakKomp1 = "memorija";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
				
			break;
			case "3": 
				$select = "SELECT * FROM memorije WHERE naziv_memorije LIKE '$po%' LIMIT $limit, $stranicenje";
				$selectTotal = "SELECT * FROM memorije WHERE naziv_memorije LIKE '$po%' "; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_memorije";
				$nazivKomp = "naziv_memorije";
				$dodatakKomp1 = "kolicina";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
				
			break;
			case "4": 
				$select = "SELECT * FROM hard_diskovi WHERE naziv_hard_diska LIKE '$po%' LIMIT $limit, $stranicenje";
				$selectTotal = "SELECT * FROM hard_diskovi WHERE naziv_hard_diska LIKE '$po%' "; 
				$resultTotal = mysql_query($selectTotal,$con);
				$ukupno = mysql_num_rows($resultTotal);
				$idKomp = "id_hard_diska";
				$nazivKomp = "naziv_hard_diska";
				$dodatakKomp1 = "kolicina_memorije";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
				
			break;
		}	
		$rezultat = mysql_query($select,$con);

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
	}
	else{
		$po = $_GET['po'];
		$tip = $_GET['idTipa'];
		switch($tip){
			case "1": 
				if($po == 'ime'){
					$select = "SELECT * FROM procesori";
					$selectUkupno = "SELECT * FROM procesori";
						if(isset($_GET['filter']) && $_GET['filter'] != ""){
							@$explodePoJedanko = explode("&",$_GET['filter']);
							if(count($explodePoJedanko) > 1){
								@$explodePo3DPrvi = explode("=",$explodePoJedanko[0]);
								@$prvi = $explodePo3DPrvi[0];
								@$explodePo3DDrugi = explode("=",$explodePoJedanko[1]);
								@$drugi = $explodePo3DDrugi[0];
							}
							else{
								@$explodePo3DPrvi = explode("=",$_GET['filter']);
								@$prvi = $explodePo3DPrvi[0];
								
							}
							if(isset($prvi) && $prvi != "" && !isset($drugi) ){
								$select .= " WHERE naziv_procesora LIKE '$prvi%'";								
							}
							else if(isset($drugi) && $drugi != "" && !isset($prvi)){	
								$select .= " WHERE naziv_procesora LIKE '$drugi%'";
							}
							else if(isset($prvi) && $prvi != "" && isset($drugi) && $drugi != "" ){
								$select .= " WHERE naziv_procesora LIKE '$prvi%'";	
								$select .= " OR naziv_procesora LIKE '$drugi%'";
							}
						}
						
					$select .=" ORDER BY naziv_procesora ASC";
					$select .=" LIMIT $limit, $stranicenje";
					$resultTotal = mysql_query($selectUkupno,$con);
					$ukupno = mysql_num_rows($resultTotal);
				}
				else{
					$select = "SELECT * FROM procesori";
					$selectUkupno = "SELECT * FROM procesori";
						if(isset($_GET['filter']) && $_GET['filter'] != ""){
							@$explodePoJedanko = explode("&",$_GET['filter']);
							if(count($explodePoJedanko) > 1){
								@$explodePo3DPrvi = explode("=",$explodePoJedanko[0]);
								@$prvi = $explodePo3DPrvi[0];
								@$explodePo3DDrugi = explode("=",$explodePoJedanko[1]);
								@$drugi = $explodePo3DDrugi[0];
							}
							else{
								@$explodePo3DPrvi = explode("=",$_GET['filter']);
								@$prvi = $explodePo3DPrvi[0];
								
							}
							if(isset($prvi) && $prvi != "" && !isset($drugi) ){
								$select .= " WHERE naziv_procesora LIKE '$prvi%'";								
							}
							else if(isset($drugi) && $drugi != "" && !isset($prvi)){	
								$select .= " WHERE naziv_procesora LIKE '$drugi%'";
							}
							else if(isset($prvi) && $prvi != "" && isset($drugi) && $drugi != "" ){
								$select .= " WHERE naziv_procesora LIKE '$prvi%'";	
								$select .= " OR naziv_procesora LIKE '$drugi%'";
							}
						}
						
					$select .=" ORDER BY cena $po";
					$select .=" LIMIT $limit, $stranicenje";
					$resultTotal = mysql_query($selectUkupno,$con);
					$ukupno = mysql_num_rows($resultTotal);
				}
				
				$idKomp = "id_procesor";
				$nazivKomp = "naziv_procesora";
				$dodatakKomp1 = "frekvencija";
				$dodatakKomp2 = "broj_procesora";
				$slika1 = "slika1";
				$opis = "opis";
				$cena = "cena";
				
			break;
			case '2' : 
			
			break;
		}	
		$rezultat = mysql_query($select,$con);
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
		
	}
echo "</div>"; // zatvaranje blok id-a
	echo "<div id='stranicenje_brojevi'>";
	if($ukupno > $stranicenje ){
	for($i=0; $i <= $ukupno; $i++){
			if($i == 0){
				echo "<a class='block' href='#'";
				if($limit != $i){			
						if($_GET['sort'] == "filter"){
							echo "onClick='filtriranje2($i)' ";
						}
						else{				 
							echo "onClick='sortiranje2($i)' ";
						}
			
				}
				echo ">0</a>";
				$i++;
			}
			if($i % $stranicenje == 0){
				echo "<a class='block' href='#'";
				if($limit != $i){
						if($_GET['sort'] == "filter"){
							echo "onClick='filtriranje2($i)' ";
						}
						else{				 
							echo "onClick='sortiranje2($i)' ";
						}
				}
				echo ">".(int)$i/$stranicenje."</a>";
			}
		}
	}
	echo "</div>";


?>