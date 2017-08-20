<?php
	@session_start();
		if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta']!='1'){
			header("Location:index.php");
		}
		
		$id = $_GET['id'];
		$idDesktopa = $_GET['idDesktopa'];
		
		if(isset($_GET['izmeni']) && $_GET['izmeni']=='da'){
			include_once("konekcija.inc");
			switch($idDesktopa){
				case '1':
					$selectAll = "select * from desktop_racunari where id_racunara = $id";
					$resultAll = mysql_query($selectAll,$con);
					if(mysql_num_rows($resultAll) > 0){
						$desktopFecovano = mysql_fetch_assoc($resultAll);
						
						$selectGraficka = "SELECT naziv_graficke FROM graficke";
						$rezultatGraficke = mysql_query($selectGraficka,$con);
						$selectMemorije = "SELECT naziv_memorije FROM memorije";
						$rezultatMemorije = mysql_query($selectMemorije,$con);
						$selectHardDisk = "SELECT naziv_hard_diska FROM hard_diskovi";
						$rezultatHardDiskovi = mysql_query($selectHardDisk,$con);
						$selectProcesori = "SELECT naziv_procesora FROM procesori";
						$rezultatProcesori = mysql_query($selectProcesori,$con);
						$forma = "	<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'dekstop_racunari'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table id='tabela_za menjanje' class='tabela_gl_link_izmeni'>
												<tr>
													<th>Naziv Računara</th>
													<td><input type='text' size='40' name='desktopNaziv'/></td>
												</tr>
												<tr>
													<th>Grafička Kartica</th>
													<td></br>
													<select name='desktopGraficka' >";
													
													while($graficke = mysql_fetch_assoc($rezultatGraficke)){
														$forma .= "<option value='{$graficke['naziv_graficke']}'>{$graficke['naziv_graficke']} </option>";
													}
													
													$forma .= "</select> 
													<p class='fakeLink' onClick='izaberi_komponentu(2,666);'> Dodaj novu grafičku u bazu</p></br>  </td>
												</tr>
												<tr>
													<th>Hard Disk</th>
													<td></br>
													<select name='hardDisk' >";
													
													while($hardDiskovi = mysql_fetch_assoc($rezultatHardDiskovi)){
														$forma .= "<option value='{$hardDiskovi['naziv_hard_diska']}'>{$hardDiskovi['naziv_hard_diska']} </option>";
													}
													
													$forma .= "</select> 
													<p class='fakeLink' onClick='izaberi_komponentu(4,666);'> Dodaj nov Hard Disk u bazu</p></br>  </td>
												</tr>
												<tr>
													<th>Memorija</th>
													<td></br>
													<select name='desktopMemorije'>";
													
													while($memorije = mysql_fetch_assoc($rezultatMemorije)){
														$forma .= "<option value='{$memorije['naziv_memorije']}'>{$memorije['naziv_memorije']} </option>";
													}
													$forma .="</select>
													<p class='fakeLink' onClick='izaberi_komponentu(3,666);'> Dodaj novu memoriju u bazu</p></br>  </td>
												</tr>
												<tr>
													<th>Procesor</th>
													<td></br>
													<select name='desktopMemorije'>";
													
													while($procesori = mysql_fetch_assoc($rezultatProcesori)){
														$forma .= "<option value='{$procesori['naziv_procesora']}'>{$procesori['naziv_procesora']} </option>";
													}
													$forma .="</select>
													<p class='fakeLink' onClick='izaberi_komponentu(1,666);'> Dodaj nov procesor u bazu</p></br>  </td>
												</tr>
												<tr>
													<th>Slika Računara (1)</th>
													<td><input type='file' name='desktopslika1'/></td>
												</tr>
												<tr>
													<th>Slika Računara (2)</th>
													<td><input type='file' name='desktopslika2'/></td>
												</tr>
												<tr>
													<th>Slika Računara (3)</th>
													<td><input type='file' name='desktopslika3'/></td>
												</tr>
												<tr>
													<th>Cena Računara</th>
													<td><input type='text' size='5' name='desktopCena'/>&nbspEUR</td>
												</tr>
												<tr>
													<th>Opis Računara</th>
													<td><textarea cols='30' rows='5' name='desktopOpis'/></td>
												</tr>
												<tr>
													<td colspan='2'><input type='submit' value='Dodaj +1' name='sbmDodajDesktop'/></td>
												</tr>
												
										</table></form></fieldset>";
					}
					break;
					}
			
			echo $forma;
			
		}
			
		
?>
										