<?php 
@session_start();
	if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta'] != "1"){
		header("Location:index.php");
	}
		$id = $_GET['id'];
		$idTipLinka = $_GET['idTipaLinka'];
		if(isset($_GET['izmeni']) && $_GET['izmeni']== 'da' ){
			include_once("konekcija.inc");
			switch($idTipLinka){
				case "1" :
				$selectall = "select * from glavni_meni where id_linka = $id";
				$rezultat = mysql_query($selectall, $con);
				if(mysql_num_rows($rezultat) > 0){
					$link_fecovan = mysql_fetch_assoc($rezultat);
					$forma ="<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'glavni_meni'</legend></br>
								<form action='admin.php' id='bla' method='POST'>
									<table id='tabela_za menjanje' class='tabela_gl_link_izmeni'>
										
										<tr>
											<th>Naziv Glavnog Linka</th>
											<td colspan='2'><input type='text' size='37'  name='izmeniNazivLinka' value='{$link_fecovan['naziv_linka']}' /></td>
										</tr>
										<tr>
											<th>Putanja Glavnog Linka</th>
											<td><input type='text' size='20' name='izmeniPutanjuLinka' value='{$link_fecovan['putanja_linka']}' /></td>
										</tr>
										<tr>
											<th>Pozicija Glavnog Linka</th>
											<td><input type='text'size='18' name='izmeniPozicijuLinka' value='{$link_fecovan['poz_linka']}' /></td>
										</tr>
										<input type='hidden' name='sakrivenId' value='{$link_fecovan['id_linka']}'/>
										<tr>
											<td colspan = '2'><input type='submit'  value='ZAMENI' name='sbmIzmeniGlavniLink' /></td>
										</tr>
									</table>
								</form></fieldset>";
				}
				break;
				case "2":	
				
					$selectall = "select * from podmeni where id_linka = $id";
					$rezultat = mysql_query($selectall, $con);
					if(mysql_num_rows($rezultat) > 0){
						$link_fecovan = mysql_fetch_assoc($rezultat);
						$forma ="<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'podmeni'</legend></br>
									<form action='admin.php'  method='POST' enctype='multipart/form-data'>
										<table  class='tabela_gl_link_izmeni'>
											<tr>
												<th>Naziv Linka</th>
												<td><input type='text' name='izmeniNazivLinka' value='{$link_fecovan['naziv_linka']}'</td>
											</tr>
											<tr>
												<th>Slika Linka</th>
												<td><input type='file' name='izmeniSlikuLinka' value='{$link_fecovan['slika']}'</td>
											</tr>
											<tr>
												<th>Kategorije</th>";
												$forma.= "<td><select name='kategorija'>";
													$selectAllGlavniMeni = "SELECT * FROM glavni_meni";
													$resultAllGlavniMeni = mysql_query($selectAllGlavniMeni,$con);		
													while($glMeni = mysql_fetch_assoc($resultAllGlavniMeni)){
														$forma .= "<option value='{$glMeni['id_linka']}'> {$glMeni['naziv_linka']} </option>";
													}
													$forma .= "  </select></td>";
												$forma .= "</tr></tr>
											<tr>
												<th>Pozicija Linka</th>
												<td><input type='text' name='izmeniPozicijuLinka' value='{$link_fecovan['poz_linka']}'</td>
											</tr>
											<tr>
												<th>Putanja Linka</th>
												<td><input type='text' name='izmeniPutanjuLinka' value='{$link_fecovan['putanja_linka']}'</td>
											</tr>
											<input type='hidden' name='sakrivenId' value='{$link_fecovan['id_linka']}'/>
											<tr>
												<td colspan='2' align='center'><input type='submit' value='ZAMENI' name='sbmIzmeniPodlink'/> </td>
											</tr>
											
											<tr>
										</table>
									</form></fieldset>";
					}
				
				break;
				
			}
			echo $forma;
		}
?>