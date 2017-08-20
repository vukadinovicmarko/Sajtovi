<?php 
// ANKETA 
	include_once('konekcija.inc');
	$ocena = $_GET['ocena'];
	$insert = "INSERT INTO `anketa`(`id_glasanja`, `ocena`) VALUES ('','$ocena')";
	$mysqlRez = mysql_query($insert,$con);
	if($mysqlRez){
		$select = "SELECT * FROM anketa";
		$res = mysql_query($select,$con);
		$los = 0;
		$nijeLos = 0;
		$dobar = 0;
		$vrloDobar = 0;
		$odlican = 0;
		while($anketa = mysql_fetch_assoc($res)){
			switch($anketa['ocena']){
				case "Los" : $los ++; break;
				case "Nije los" : $nijeLos ++; break;
				case "Dobar" : $dobar ++; break;
				case "Vrlo dobar" : $vrloDobar ++; break;
				case "Odličan" : $odlican ++; break;
			}
		}
		echo '<table id="anketa-tabela">
										<tr>
											<th colspan="2" class="naslov">Rezultati ankete su : </th>
										</tr>
										<tr>
											<td class="radioB">
												LOS '.$los.'<br/><br/>
												NIJE LOS  '.$nijeLos.'<br/><br/>
												DOBAR '.$dobar.'<br/><br/>
												VRLO DOBAR '.$vrloDobar.'<br/><br/>
												ODLICAN '.$odlican.'<br/><br/>
											</td>
										</tr>
									</table>';
	}
?>