<?php
	@session_start();
	
	if(isset($_SESSION['id_klijenta'])&& $_SESSION['id_klijenta']!= "1"){
		header ("Location:index.php");
	}
	
	$id=$_GET['id'];
	include_once('konekcija.inc');
		
		switch($id){
			case "2" :
				$selectAll = "SELECT * FROM podmeni";
				$result = mysql_query($selectAll,$con);
				$form = "<form action='admin.php' method='POST'  enctype='multipart/form-data'>
									
										<label for='nazivLinka'> Naziv linka </label>
										<input type='text' name='nazivLinka'/>
										<label for='slikaLinka'>slika linka </label>
										<input type='file' name='slikaLinka'/>
										<label for='pozcijaLinka'> Pozicija linka </label>
										<input type='text' name='pozcijaLinka' value='".(mysql_num_rows($result) + 1)."' readonly />
										<label for='putanja'> Putanja linka </label>
										<input type='text' name='putanja'/>
										<input type='submit' value='Dodaj' name='dodajPodlink'/>
									
					</form>";
					
					$selectAll = "SELECT * FROM podmeni ORDER BY poz_linka";
						$result = mysql_query($selectAll,$con);
						if(mysql_num_rows($result) > 0 ){
							$select = "<table border='1' style='background-color:gray; color:white;'>
											<tr>
												<th>#</th>
												<th>Naziv linkamare</th>
												<th>Slika</th>
												<th>Pozicija linka</th>
												<th>Putanja linka</th>
												<th>Izmeni</th>
											</tr>";
											
											while( $glLink = mysql_fetch_assoc($result)){
												$select .= "<tr>
																<td>{$glLink['id_linka']}</td>
																<td>{$glLink['naziv_linka']}</td>
																<td>{$glLink['slika']}</td>
																<td>{$glLink['poz_linka']}</td>
																<td>{$glLink['putanja_linka']}</td>
																<td><a href='#' onClick='izmeni({$glLink['id_linka']})'>Izmeni </a></td>
															</tr>";
											}
							$select .= "</table>";
						}
						
				
			
			break;
		}
		
	echo $form."~".$select;
	}
?>