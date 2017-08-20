<?php
	@session_start();
		if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta']!='1'){
			header("Location:index.php");
		}
		
		$id = $_GET['id'];
		$idKomponente = $_GET['idKomponente'];
		
		if(isset($_GET['izmeni']) && $_GET['izmeni']=='da'){
			include_once("konekcija.inc");
			switch($idKomponente){
				case '1':
					$selectAll = "select * from procesori where id_procesora = $id";
					$resultAll = mysql_query($selectAll,$con);
					if(mysql_num_rows($resultAll) > 0){
						$procesoriFecovano = mysql_fetch_assoc($resultAll);
						$forma = "	<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'procesori'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table id='tabela_za menjanje' class='tabela_gl_link_izmeni'>
												<tr>
													<th>Naziv Procesora</th>
													<td><input type='text' name='izmeniNazivProcesora' size='35' value='{$procesoriFecovano['naziv_procesora']}'/></td>
												</tr>
												<tr>
													<th>Frekvencija Procesora</th>
													<td><input type='text' name='izmeniFrekvencijuProcesora' size='10' value='{$procesoriFecovano['frekvencija']}'/></td>
												</tr>
												<tr>
													<th>Broj Procesora</th>
													<td><input type='text' name='izmeniBrojProcesora' size='5' value='{$procesoriFecovano['broj_procesora']}'/></td>
												</tr>
												<tr>
													<th>Slika Procesora (1)</th>
													<td><input type='file' name='izmeniSlikuProcesora1' value='{$procesoriFecovano['slika1']}'/></td>
												</tr>
												<tr>
													<th>Slika Procesora (2)</th>
													<td><input type='file' name='izmeniSlikuProcesora2' value='{$procesoriFecovano['slika2']}'/></td>
												</tr>
												<tr>
													<th>Slika Procesora (3)</th>
													<td><input type='file' name='izmeniSlikuProcesora3' value='{$procesoriFecovano['slika3']}'/></td>
												</tr>
												<tr>
													<th>Opis Procesora</th>
													<td><textarea cols='30' rows = '5' name='izmeniOpisProcesora' value='{$procesoriFecovano['opis']}'/></td>
												</tr>
												<tr>
													<th>Cena Procesora</th>
													<td><input type='text' name='izmeniCenuProcesora' size='10' value='{$procesoriFecovano['cena']}'/>&nbspEUR</td>
												</tr>
												<input type='hidden' name='hiddenId' value='{$procesoriFecovano['id_procesora']}'/>
												<tr>
													<td colspan='2'><input type='submit' value='ZAMENI' name='sbmIzmeniProcesor'/></td>
												</tr>
											</table>
										</form>
									</fieldset>";
					}
					
					
					
				break;
				case '2':
					$selectAll = "select * from graficke where id_graficke = $id";
					$resultAll = mysql_query($selectAll,$con);
					if(mysql_num_rows($resultAll) > 0){
						$grafickeFecovano = mysql_fetch_assoc($resultAll);
						$forma = "	<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'grafičke'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table id='tabela_za menjanje' class='tabela_gl_link_izmeni'>
												<tr>
													<th>Naziv Grafičke Kartice</th>
													<td><input type='text' name='izmeniNazivGraficke' size='35' value='{$grafickeFecovano['naziv_graficke']}'/></td>
												</tr>
												<tr>
													<th>Memorija</th>
													<td><input type='text' name='izmeniMemorijuGraficke' size='5' value='{$grafickeFecovano['memorija']}'/></td>
												</tr>
												
												<tr>
													<th>Slika (1)</th>
													<td><input type='file' name='izmeniSlikuGraficke1' value='{$grafickeFecovano['slika1']}'/></td>
												</tr>
												<tr>
													<th>Slika (2)</th>
													<td><input type='file' name='izmeniSlikuGraficke2' value='{$grafickeFecovano['slika2']}'/></td>
												</tr>
												<tr>
													<th>Slika (3)</th>
													<td><input type='file' name='izmeniSlikuGraficke3' value='{$grafickeFecovano['slika3']}'/></td>
												</tr>
												<tr>
													<th>Opis </th>
													<td><textarea cols='30' rows = '5' name='izmeniOpisGraficke' value='{$grafickeFecovano['opis']}'/></td>
												</tr>
												<tr>
													<th>Cena</th>
													<td><input type='text' size='10' name='izmeniCenuGraficke' value='{$grafickeFecovano['cena']}'/>&nbspEUR</td>
												</tr>
												<input type='hidden' name='hiddenId' value='{$grafickeFecovano['id_graficke']}'/>
												<tr>
													<td colspan='2'><input type='submit' value='ZAMENI' name='sbmIzmeniGraficku'/></td>
												</tr>
											</table>
										</form>
									</fieldset>";
					}
					
					
					
				break;
				case '3':
					$selectAll = "select * from memorije where id_memorije = $id";
					$resultAll = mysql_query($selectAll,$con);
					if(mysql_num_rows($resultAll) > 0){
						$memorijeFecovano = mysql_fetch_assoc($resultAll);
						$forma = "	<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'memorije'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table id='tabela_za menjanje' class='tabela_gl_link_izmeni'>
												<tr>
													<th>Naziv Memorije</th>
													<td><input type='text' name='izmeniNazivMemorije' size='35' value='{$memorijeFecovano['naziv_memorije']}'/></td>
												</tr>
												<tr>
													<th>Količina Memorije</th>
													<td><input type='text' name='izmeniKolicinuMemorije' value='{$memorijeFecovano['kolicina']}'/></td>
												</tr>
												
												<tr>
													<th>Slika (1)</th>
													<td><input type='file' name='izmeniSlikuMemorije1' value='{$memorijeFecovano['slika1']}'/></td>
												</tr>
												<tr>
													<th>Slika (2)</th>
													<td><input type='file' name='izmeniSlikuMemorije2' value='{$memorijeFecovano['slika2']}'/></td>
												</tr>
												<tr>
													<th>Slika (3)</th>
													<td><input type='file' name='izmeniSlikuMemorije3' value='{$memorijeFecovano['slika3']}'/></td>
												</tr>
												<tr>
													<th>Opis </th>
													<td><textarea cols='30' rows = '5' name='izmeniOpisMemorije' value='{$memorijeFecovano['opis']}'/></td>
												</tr>
												<tr>
													<th>Cena (EUR)</th>
													<td><input type='text' name='izmeniCenuMemorije' value='{$memorijeFecovano['cena']}'/>&nbspEUR</td>
												</tr>
												<input type='hidden' name='hiddenId' value='{$memorijeFecovano['id_memorije']}'/>
												<tr>
													<td colspan='2'><input type='submit' value='ZAMENI' name='sbmIzmeniMemoriju'/></td>
												</tr>
											</table>
										</form>
									</fieldset>";
					}
					
					
					
				break;
				case '4':
					$selectAll = "select * from hard_diskovi where id_hard_diska = $id";
					$resultAll = mysql_query($selectAll,$con);
					if(mysql_num_rows($resultAll) > 0){
						$hardDiskoviFecovano = mysql_fetch_assoc($resultAll);
						$forma = "	<fieldset id='fildset_izmeni'><legend class='legenda_tabela_izmeni' align='center'>Izmena tabele 'hard_diskovi'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table id='tabela_za menjanje' class='tabela_gl_link_izmeni'>
												<tr>
													<th>Naziv Hard Diska</th>
													<td><input type='text' name='izmeniNazivHardDiska' size='35' value='{$hardDiskoviFecovano['naziv_hard_diska']}'/></td>
												</tr>
												<tr>
													<th>Količina Memorije</th>
													<td><input type='text' name='izmeniKolicinuMemorije' value='{$hardDiskoviFecovano['kolicina_memorije']}'/></td>
												</tr>
												
												<tr>
													<th>Slika (1)</th>
													<td><input type='file' name='izmeniSlikuHardDiska1' value='{$hardDiskoviFecovano['slika1']}'/></td>
												</tr>
												<tr>
													<th>Slika (2)</th>
													<td><input type='file' name='izmeniSlikuHardDiska2' value='{$hardDiskoviFecovano['slika2']}'/></td>
												</tr>
												<tr>
													<th>Slika (3)</th>
													<td><input type='file' name='izmeniSlikuHardDiska3' value='{$hardDiskoviFecovano['slika3']}'/></td>
												</tr>
												<tr>
													<th>Opis </th>
													<td><textarea cols='30' rows = '5' name='izmeniOpisHardDiska' value='{$hardDiskoviFecovano['opis']}'/></td>
												</tr>
												<tr>
													<th>Cena (EUR)</th>
													<td><input type='text' name='izmeniCenuHardDiska' value='{$hardDiskoviFecovano['cena']}'/>&nbspEUR</td>
												</tr>
												<input type='hidden' name='hiddenId' value='{$hardDiskoviFecovano['id_hard_diska']}'/>
												<tr>
													<td colspan='2'><input type='submit' value='ZAMENI' name='sbmIzmeniHardDisk'/></td>
												</tr>
											</table>
										</form>
									</fieldset>";
					}
					
					
					
				break;
			}
			
			echo $forma;
			
		}
			
		
?>