<?php
	@session_start();
	if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta'] != "1"){
		header("Location:index.php");
	}
	$formaaab ="";
	$select ="";
	include_once("konekcija.inc");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		switch($id){
			case "1":
			
				$selectAll = "SELECT * FROM glavni_meni ORDER BY poz_linka";
				$result = mysql_query($selectAll,$con);
				if(mysql_num_rows($result) > 0 ){
					$select = "<fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Glavni Meni</legend></br>
								<table border='0' class='glavna_tabela_select'>
									<tr>
										<th>#</th>
										<th>Naziv linka</th>
										<th>Putanja linka</th>
										<th>Pozicija linka</th>
										<th>Izmeni</th>
										<th>Izbriši</th>
									</tr>";
								while( $glLink = mysql_fetch_assoc($result)){
								$select .= "<tr>
												<td>{$glLink['id_linka']}</td>
												<td>{$glLink['naziv_linka']}</td>
												<td>{$glLink['putanja_linka']}</td>
												<td>{$glLink['poz_linka']}</td>
												<td><a href='#' onClick='izmeni({$glLink['id_linka']})'>Izmeni </a></td>
												<td><a href='#' onClick='izbrisi({$glLink['id_linka']})'>Izbriši </a></td>
											</tr>";
								}
					$select .= "</table></fieldset></br>";
					$selectAll1 = "SELECT * FROM glavni_meni";
					$result1 = mysql_query($selectAll1,$con);
					$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'glavni_meni'</legend>
									<form action='admin.php' method='POST'>
									<table  class='tabela_gl_link_dodaj'>
									
									<tr>
										<th>Naziv Linka</th>
										<td><input type='text' size='35' name='nazivLinka'/></td>
									</tr>
									<tr>
										<th>Putanja Linka</th>
										<td><input type='text' size='35' name='putanja'/></td>
									</tr>
									<tr>
										<th>Pozicija Linka</th>
										<td><input type='text' size='5' name='pozcijaLinka' value='".(mysql_num_rows($result) + 1)."' readonly /></td>
									</tr>
									</br>
									<tr>
										<td colspan='2'><input type='submit'  value='Dodaj +1' name='dodajGlavniLink'/></td>
									</tr>	
									</table>
								</form></fieldset>";
				}
			break;
			case "2":		
				$selectAll = "SELECT * FROM podmeni order by poz_linka";
				$result = mysql_query($selectAll,$con);
				if(mysql_num_rows($result) > 0 ){
					
					$select = "<fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Podmeni</legend></br>
									<table class='glavna_tabela_select'>
									<tr>
										<th>#</th>
										<th>Naziv linka</th>
										<th>Slika</th>
										<th>Kategorija</th>
										<th>Pozicija linka</th>
										<th>Putanja linka</th>
										<th>Izmeni</th>
										<th>Izbriši</th>
									</tr>";
									
									while( $glLink = mysql_fetch_assoc($result)){
										$select .= "<tr>
														<td>{$glLink['id_linka']}</td>
														<td>{$glLink['naziv_linka']}</td>
														<td>{$glLink['slika']}</td>";
														$selectGlMeniPodmeni = "SELECT g.naziv_linka AS naziv_linka from glavni_meni g join gl_meni_podmeni gp on g.id_linka = gp.id_gl_linka join podmeni p on gp.id_pod_linka = p.id_linka WHERE p.id_linka = {$glLink['id_linka']} group by g.naziv_linka";
														$rezGlMeniPodmeni = mysql_query($selectGlMeniPodmeni,$con);
														while( $GlMeniPodmeni = mysql_fetch_assoc($rezGlMeniPodmeni)){
															$select.="<td>{$GlMeniPodmeni['naziv_linka']}</td>";
														}
											$select.="	<td>{$glLink['poz_linka']}</td>
														<td>{$glLink['putanja_linka']}</td>
														<td><a href='#' onClick='izmeni({$glLink['id_linka']})'>Izmeni </a></td>
														<td><a href='#' onClick='izbrisi({$glLink['id_linka']})'>Izbriši </a></td>
													</tr>";
									}
					$select .= "</table></fieldset></br>";	
					$selectAll1 = "SELECT * FROM podmeni";
					$result1 = mysql_query($selectAll1,$con);		
					$formaaab = "	<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'podmeni'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data' class='nekaForma'>
											<table class='tabela_gl_link_dodaj'>
												<tr>
													<th>Naziv Linka</th>
													<td><input type='text' size='40' name='nazivLinka'/></td>
												</tr>
												<tr>
													<th>Slika Linka</th>
													<td><input type='file' name='slikaLinka'/></td>
												</tr>
												<tr>
													<th>Kategorija</th>";
													$formaaab.= "<td><select name='kategorija'>";
													$selectAllGlavniMeni = "SELECT * FROM glavni_meni";
													$resultAllGlavniMeni = mysql_query($selectAllGlavniMeni,$con);		
													while($glMeni = mysql_fetch_assoc($resultAllGlavniMeni)){
														$formaaab .= "<option value='{$glMeni['id_linka']}'> {$glMeni['naziv_linka']} </option>";
													}
													$formaaab .= "  </select></td>";
												$formaaab .= "</tr>
												<tr>
													<th>Pozicija Linka</th>
													<td><input type='text' size='5' name='pozcijaLinka' value='".(mysql_num_rows($result1) + 1)."' readonly /></td>
												</tr>
												<tr>
													<th>Putanja Linka</th>
													<td><input type='text' size='40' name='putanja'/></td>
												</tr>
												<tr>
													<td colspan='2'><input type='submit' value='Dodaj +1' name='dodajPodlink'/></td>
												</tr>
											</table>
										</form></fieldset>";			
				}		
			break;
			case "3":
				$formaaab = "<select name='tipaRacunara' id='select_racunar' class='selectOnly' onchange='izaberi_tip(this.value);'><option value=''>Izaberite </option>";
				$selectAllTipRacunara = "select * from tip_racunara";
				$resultAllTipRacunara = mysql_query($selectAllTipRacunara,$con);
				while($tipRacunara = mysql_fetch_assoc($resultAllTipRacunara)){
					$formaaab.="<option value='{$tipRacunara['id_tipa']}'>{$tipRacunara['naziv_tipa']}</option>";
					
				}
				$formaaab.="</select>";
				
			break;
			case "4":
				$formaaab = "<select name='tipKomponente' id='select_komponente' class='selectOnly' onchange='izaberi_komponentu(this.value,\"\");'><option value=''>Izaberite komponentu... </option>";
				$selectAllTipRacunara = "select * from komponente";
				$resultAllTipRacunara = mysql_query($selectAllTipRacunara,$con);
				while($tipKomponente = mysql_fetch_assoc($resultAllTipRacunara)){
					$formaaab.="<option value='{$tipKomponente['id_komponente']}'>{$tipKomponente['naziv_komponente']}</option>";
					
				}
				$formaaab.="</select>";
		}
	}
	if(isset($_GET["value"])){
		$id_tipaRacunara = $_GET['value'];
			switch($id_tipaRacunara){
				case "1":
				
						$selectAll = "select * from desktop_racunari";
						$result = mysql_query($selectAll,$con);
						if(mysql_num_rows($result) > 0){
							$select = "	<fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Desktop Racunari</legend></br>
											
												<table border='0' class='glavna_tabela_select'>
													<tr>
														<th>#</th>
														<th>Naziv Racunara</th>
														<th>Graficka Kartica</th>
														<th>Hard Disk</th>
														<th>Memorija</th>
														<th>Procesor</th>
														<th>Slika 1</th>
														<th>Slika 2</th>
														<th>Slika 3</th>
														<th>Cena Racunara</th>
														<th>Datum Objave</th>
														<th>Opis</th>
														<th>Izmeni</th>
														<th>Izbriši</th>
													</tr>";
													while( $desktopLink = mysql_fetch_assoc($result)){
											$select .= "<tr>
															<td>{$desktopLink['id_racunara']}</td>
															<td>{$desktopLink['naziv_racunara']}</td>
															<td>{$desktopLink['graficka']}</td>
															<td>{$desktopLink['hard']}</td>
															<td>{$desktopLink['memorija']}</td>
															<td>{$desktopLink['procesor']}</td>
															<td>{$desktopLink['slika1']}</td>
															<td>{$desktopLink['slika2']}</td>
															<td>{$desktopLink['slika3']}</td>
															<td>{$desktopLink['cena']}</td>
															<td>{$desktopLink['datum']}</td>
															<td>{$desktopLink['opis']}</td>
															<td><a href='#' onClick='izmeniDesktop({$desktopLink['id_racunara']})'>Izmeni </a></td>
															<td><a href='#' onClick='izbrisiRacunar({$desktopLink['id_racunara']})'>Izbriši </a></td>
														</tr>";
								
													}
													$select .= "</table></fieldset></br>";
												$selectAll1 = "SELECT * FROM desktop_racunari";
												$result1 = mysql_query($selectAll1,$con);
												
												$selectGraficka = "SELECT naziv_graficke FROM graficke";
												$rezultatGraficke = mysql_query($selectGraficka,$con);
												$selectMemorije = "SELECT naziv_memorije FROM memorije";
												$rezultatMemorije = mysql_query($selectMemorije,$con);
												$selectHardDisk = "SELECT naziv_hard_diska FROM hard_diskovi";
												$rezultatHardDiskovi = mysql_query($selectHardDisk,$con);
												$selectProcesori = "SELECT naziv_procesora FROM procesori";
												$rezultatProcesori = mysql_query($selectProcesori,$con);
												$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'desktop_racunari'</legend></br>
																<form action='admin.php' method='POST' enctype='multipart/form-data'>
																	<table  class='tabela_gl_link_dodaj'>
																		<tr>
																			<th>Naziv Računara</th>
																			<td><input type='text' size='40' name='desktopNaziv'/></td>
																		</tr>
																		<tr>
																			<th>Grafička Kartica</th>
																			<td></br>
																			<select name='desktopGraficka' >";
																			
																			while($graficke = mysql_fetch_assoc($rezultatGraficke)){
																				$formaaab .= "<option value='{$graficke['naziv_graficke']}'>{$graficke['naziv_graficke']} </option>";
																			}
																			
																			$formaaab .= "</select> 
																			<p class='fakeLink' onClick='izaberi_komponentu(2,666);'> Dodaj novu grafičku u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Hard Disk</th>
																			<td></br>
																			<select name='desktopHardDisk' >";
																			
																			while($hardDiskovi = mysql_fetch_assoc($rezultatHardDiskovi)){
																				$formaaab .= "<option value='{$hardDiskovi['naziv_hard_diska']}'>{$hardDiskovi['naziv_hard_diska']} </option>";
																			}
																			
																			$formaaab .= "</select> 
																			<p class='fakeLink' onClick='izaberi_komponentu(4,666);'> Dodaj nov Hard Disk u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Memorija</th>
																			<td></br>
																			<select name='desktopMemorije'>";
																			
																			while($memorije = mysql_fetch_assoc($rezultatMemorije)){
																				$formaaab .= "<option value='{$memorije['naziv_memorije']}'>{$memorije['naziv_memorije']} </option>";
																			}
																			$formaaab .="</select>
																			<p class='fakeLink' onClick='izaberi_komponentu(3,666);'> Dodaj novu memoriju u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Procesor</th>
																			<td></br>
																			<select name='desktopProcesor'>";
																			
																			while($procesori = mysql_fetch_assoc($rezultatProcesori)){
																				$formaaab .= "<option value='{$procesori['naziv_procesora']}'>{$procesori['naziv_procesora']} </option>";
																			}
																			$formaaab .="</select>
																			<p class='fakeLink' onClick='izaberi_komponentu(1,666);'> Dodaj nov procesor u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Slika Računara (1)</th>
																			<td><input type='file' name='desktopSlika1'/></td>
																		</tr>
																		<tr>
																			<th>Slika Računara (2)</th>
																			<td><input type='file' name='desktopSlika2'/></td>
																		</tr>
																		<tr>
																			<th>Slika Računara (3)</th>
																			<td><input type='file' name='desktopSlika3'/></td>
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
						case "2":
				
						$selectAll = "select * from notebook_racunari";
						$result = mysql_query($selectAll,$con);
						if(mysql_num_rows($result) > 0){
							$select = "	<fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Notebook Racunari</legend></br>
											
												<table border='0' class='glavna_tabela_select'>
													<tr>
														<th>#</th>
														<th>Naziv Racunara</th>
														<th>Graficka Kartica</th>
														<th>Hard Disk</th>
														<th>Memorija</th>
														<th>Procesor</th>
														<th>Slika 1</th>
														<th>Slika 2</th>
														<th>Slika 3</th>
														<th>Cena Racunara</th>
														<th>Datum Objave</th>
														<th>Opis</th>
														<th>Izmeni</th>
														<th>Izbriši</th>
													</tr>";
													while( $notebookLink = mysql_fetch_assoc($result)){
											$select .= "<tr>
															<td>{$notebookLink['id_racunara']}</td>
															<td>{$notebookLink['naziv_racunara']}</td>
															<td>{$notebookLink['graficka']}</td>
															<td>{$notebookLink['hard']}</td>
															<td>{$notebookLink['memorija']}</td>
															<td>{$notebookLink['procesor']}</td>
															<td>{$notebookLink['slika1']}</td>
															<td>{$notebookLink['slika2']}</td>
															<td>{$notebookLink['slika3']}</td>
															<td>{$notebookLink['cena']}</td>
															<td>{$notebookLink['datum']}</td>
															<td>{$notebookLink['opis']}</td>
															<td><a href='#' onClick='izmeni({$notebookLink['id_racunara']})'>Izmeni </a></td>
															<td><a href='#' onClick='izbrisiRacunar({$notebookLink['id_racunara']})'>Izbriši </a></td>
														</tr>";
								
													}
													$select .= "</table></fieldset></br>";
												$selectAll1 = "SELECT * FROM notebook_racunari";
												$result1 = mysql_query($selectAll1,$con);
												$selectGraficka = "SELECT naziv_graficke FROM graficke";
												$rezultatGraficke = mysql_query($selectGraficka,$con);
												$selectMemorije = "SELECT naziv_memorije FROM memorije";
												$rezultatMemorije = mysql_query($selectMemorije,$con);
												$selectHardDisk = "SELECT naziv_hard_diska FROM hard_diskovi";
												$rezultatHardDiskovi = mysql_query($selectHardDisk,$con);
												$selectProcesori = "SELECT naziv_procesora FROM procesori";
												$rezultatProcesori = mysql_query($selectProcesori,$con);
												$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'notebook_racunari'</legend></br>
																<form action='admin.php' method='POST' enctype='multipart/form-data'>
																	<table  class='tabela_gl_link_dodaj'>
																		<tr>
																			<th>Naziv Računara</th>
																			<td><input type='text' size='40' name='notebookNaziv'/></td>
																		</tr>
																		<tr>
																			<th>Grafička Kartica</th>
																			<td></br>
																			<select name='notebookGraficka' >";
																			
																			while($graficke = mysql_fetch_assoc($rezultatGraficke)){
																				$formaaab .= "<option value='{$graficke['naziv_graficke']}'>{$graficke['naziv_graficke']} </option>";
																			}
																			
																			$formaaab .= "</select> 
																			<p class='fakeLink' onClick='izaberi_komponentu(2,666);'> Dodaj novu grafičku u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Hard Disk</th>
																			<td></br>
																			<select name='notebookHardDisk' >";
																			
																			while($hardDiskovi = mysql_fetch_assoc($rezultatHardDiskovi)){
																				$formaaab .= "<option value='{$hardDiskovi['naziv_hard_diska']}'>{$hardDiskovi['naziv_hard_diska']} </option>";
																			}
																			
																			$formaaab .= "</select> 
																			<p class='fakeLink' onClick='izaberi_komponentu(4,666);'> Dodaj nov Hard Disk u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Memorija</th>
																			<td></br>
																			<select name='notebookMemorije'>";
																			
																			while($memorije = mysql_fetch_assoc($rezultatMemorije)){
																				$formaaab .= "<option value='{$memorije['naziv_memorije']}'>{$memorije['naziv_memorije']} </option>";
																			}
																			$formaaab .="</select>
																			<p class='fakeLink' onClick='izaberi_komponentu(3,666);'> Dodaj novu memoriju u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Procesor</th>
																			<td></br>
																			<select name='notebookProcesor'>";
																			
																			while($procesori = mysql_fetch_assoc($rezultatProcesori)){
																				$formaaab .= "<option value='{$procesori['naziv_procesora']}'>{$procesori['naziv_procesora']} </option>";
																			}
																			$formaaab .="</select>
																			<p class='fakeLink' onClick='izaberi_komponentu(1,666);'> Dodaj nov procesor u bazu</p></br>  </td>
																		</tr>
																		<tr>
																			<th>Slika Računara (1)</th>
																			<td><input type='file' name='notebookSlika1'/></td>
																		</tr>
																		<tr>
																			<th>Slika Računara (2)</th>
																			<td><input type='file' name='notebookSlika2'/></td>
																		</tr>
																		<tr>
																			<th>Slika Računara (3)</th>
																			<td><input type='file' name='notebookSlika3'/></td>
																		</tr>
																		<tr>
																			<th>Cena Računara</th>
																			<td><input type='text' size='5' name='notebookCena'/>&nbspEUR</td>
																		</tr>
																		<tr>
																			<th>Opis Računara</th>
																			<td><textarea cols='30' rows='5' name='notebookOpis'/></td>
																		</tr>
																		<tr>
																			<td colspan='2'><input type='submit' value='Dodaj +1' name='sbmDodajNotebook'/></td>
																		</tr>
																		
																</table></form></fieldset>";
																
							
								
						}
						break;
				
		}
	}
	if(isset($_GET['komponenta'])){
		$id_komponente = $_GET['komponenta'];
		
		switch($id_komponente){
			case "1":
				$selectAll = "SELECT * FROM procesori ";
				$resultAll = mysql_query($selectAll,$con);
				if(mysql_num_rows($resultAll) > 0){
					$select = " <fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Procesori</legend></br>
									<table border='0' class='glavna_tabela_select'>
										<tr>
											<th>#</th>
											<th>Naziv procesora</th>
											<th>Frekvencija</th>
											<th>Broj procesora</th>
											<th>Slika 1</th>
											<th>Slika 2</th>
											<th>Slika 3</th>
											<th>Opis</th>
											<th>Cena</th>
											<th>Datum objave</th>
											<th>Izmeni</th>
											<th>Izbriši</th>
										</tr>";
										while($procesori = mysql_fetch_assoc($resultAll)){
											$select .= " <tr>
															<td>".$procesori['id_procesora']."</td>
															<td>{$procesori['naziv_procesora']}</td>
															<td>{$procesori['frekvencija']}</td>
															<td>{$procesori['broj_procesora']}</td>
															<td>{$procesori['slika1']}</td>
															<td>{$procesori['slika2']}</td>
															<td>{$procesori['slika3']}</td>
															<td>{$procesori['opis']}</td>
															<td>{$procesori['cena']}</td>
															<td>{$procesori['datum']}</td>
															<td><a href='#' onClick='izmeniKomponentu({$procesori['id_procesora']});'>Izmeni</a></td>
															<td><a href='#' onClick='izbrisiKomponentu({$procesori['id_procesora']});'>Izbriši</a></td>
														</tr>";
										}
						$select.="	</table></fieldset></br>";
						$selectAll1 = "SELECT * FROM procesori";
						$result1 = mysql_query($selectAll1,$con);
						$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'procesori'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table  class='tabela_gl_link_dodaj'>
												<tr>
													<th>Naziv Procesora</th>
													<td><input type='text' size='35' name='nazivProcesora'/></td>
												</tr>
												<tr>
													<th>Frekvencija Procesora</th>
													<td><input type='text' size='10' name='frekvencijaProcesora'/></td>
												</tr>
												<tr>
													<th>Broj Procesora</th>
													<td><input type='text' size='5' name='brojProcesora'/></td>
												</tr>
												<tr>
													<th>Slika Procesora (1)</th>
													<td><input type='file' name='slikaProcesora1'/></td>
												</tr>
												<tr>
													<th>Slika Procesora (2)</th>
													<td><input type='file' name='slikaProcesora2'/></td>
												</tr>
												<tr>
													<th>Slika Procesora (3)</th>
													<td><input type='file' name='slikaProcesora3'/></td>
												</tr>
												<tr>
													<th>Opis Procesora</th>
													<td><textarea cols='30' rows='5' name='opisProcesora'/></td>
												</tr>
												<tr>
													<th>Cena Procesora</th>
													<td><input type='text' size='10' name='cenaProcesora'/>&nbspEUR</td>
												</tr>
												<tr>
													<td colspan='2'><input type='submit' value='Dodaj +1' name='sbmDodajProcesor' /></td>
												</tr>
												
								</table></form></fieldset>";
				}
			break;
			case "2":
				$selectAll = "SELECT * FROM graficke ";
				$resultAll = mysql_query($selectAll,$con);
				if(mysql_num_rows($resultAll) > 0){
					$select = " <fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Grafičke Kartice</legend></br>
									<table border='0' class='glavna_tabela_select'>
										<tr>
											<th>#</th>
											<th>Naziv Grafičke kartice</th>
											<th>Memorija</th>
											<th>Slika 1</th>
											<th>Slika 2</th>
											<th>Slika 3</th>
											<th>Opis</th>
											<th>Cena (EUR)</th>
											<th>Datum objave</th>
											<th>Izmeni</th>
											<th>Izbriši</th>
										</tr>";
										while($graficke = mysql_fetch_assoc($resultAll)){
											$select .= " <tr>
															<td>".$graficke['id_graficke']."</td>
															<td>{$graficke['naziv_graficke']}</td>
															<td>{$graficke['memorija']}</td>
															<td>{$graficke['slika1']}</td>
															<td>{$graficke['slika2']}</td>
															<td>{$graficke['slika3']}</td>
															<td>{$graficke['opis']}</td>
															<td>{$graficke['cena']}</td>
															<td>{$graficke['datum']}</td>
															<td><a href='#' onClick='izmeniKomponentu({$graficke['id_graficke']});'>Izmeni</a></td>
															<td><a href='#' onClick='izbrisiKomponentu({$graficke['id_graficke']});'>Izbriši</a></td>
														</tr>";
										}
						$select.="	</table></fieldset></br>";
						$selectAll1 = "SELECT * FROM graficke";
						$result1 = mysql_query($selectAll1,$con);
						$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'graficke'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table  class='tabela_gl_link_dodaj'>
												<tr>
													<th>Naziv Grafičke Kartice</th>
													<td><input type='text' size='35' name='nazivGraficke'/></td>
												</tr>
												<tr>
													<th>Memorija (MB)</th>
													<td><input type='text' size='5' name='memorijaGraficke'/></td>
												</tr>
												<tr>
													<th>Slika Grafičke (1)</th>
													<td><input type='file' name='slikaGraficke1'/></td>
												</tr>
												<tr>
													<th>Slika Grafičke (2)</th>
													<td><input type='file' name='slikaGraficke2'/></td>
												</tr>
												<tr>
													<th>Slika Grafičke (3)</th>
													<td><input type='file' name='slikaGraficke3'/></td>
												</tr>
												<tr>
													<th>Opis Grafičke</th>
													<td><textarea cols='30' rows='5' name='opisGraficke'/></td>
												</tr>
												<tr>
													<th>Cena Grafičke (EUR)</th>
													<td><input type='text' size='10' name='cenaGraficke'/>&nbspEUR</td>
												</tr>
												<tr>
													<td colspan='2'><input type='submit' value='Dodaj +1' name='sbmDodajGraficku' /></td>
												</tr>
												
								</table></form></fieldset>";
				}
				
			break;
			case "3":
				$selectAll = "SELECT * FROM memorije ";
				$resultAll = mysql_query($selectAll,$con);
				if(mysql_num_rows($resultAll) > 0){
					$select = " <fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Memorije</legend></br>
									<table border='0' class='glavna_tabela_select'>
										<tr>
											<th>#</th>
											<th>Naziv Memorije</th>
											<th>Količina Memorije (GB)</th>
											<th>Slika 1</th>
											<th>Slika 2</th>
											<th>Slika 3</th>
											<th>Opis</th>
											<th>Cena (EUR)</th>
											<th>Datum objave</th>
											<th>Izmeni</th>
											<th>Izbriši</th>
										</tr>";
										while($memorije = mysql_fetch_assoc($resultAll)){
											$select .= " <tr>
															<td>".$memorije['id_memorije']."</td>
															<td>{$memorije['naziv_memorije']}</td>
															<td>{$memorije['kolicina']}</td>
															<td>{$memorije['slika1']}</td>
															<td>{$memorije['slika2']}</td>
															<td>{$memorije['slika3']}</td>
															<td>{$memorije['opis']}</td>
															<td>{$memorije['cena']}</td>
															<td>{$memorije['datum']}</td>
															<td><a href='#' onClick='izmeniKomponentu({$memorije['id_memorije']});'>Izmeni</a></td>
															<td><a href='#' onClick='izbrisiKomponentu({$memorije['id_memorije']});'>Izbriši</a></td>
														</tr>";
										}
						$select.="	</table></fieldset></br>";
						$selectAll1 = "SELECT * FROM memorije";
						$result1 = mysql_query($selectAll1,$con);
						$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'memorije'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table  class='tabela_gl_link_dodaj'>
												<tr>
													<th>Naziv Memorije</th>
													<td><input type='text' size='35' name='nazivMemorije'/></td>
												</tr>
												<tr>
													<th>Količina Memorije (GB)</th>
													<td><input type='text' size='5' name='kolicinaMemorije'/></td>
												</tr>
												<tr>
													<th>Slika Memorije (1)</th>
													<td><input type='file' name='slikaMemorije1'/></td>
												</tr>
												<tr>
													<th>Slika Memorije (2)</th>
													<td><input type='file' name='slikaMemorije2'/></td>
												</tr>
												<tr>
													<th>Slika Memorije (3)</th>
													<td><input type='file' name='slikaMemorije3'/></td>
												</tr>
												<tr>
													<th>Opis Memorije</th>
													<td><textarea cols='30' rows='5' name='opisMemorije'/></td>
												</tr>
												<tr>
													<th>Cena Memorije (EUR)</th>
													<td><input type='text' size='10' name='cenaMemorije'/>&nbspEUR</td>
												</tr>
												<tr>
													<td colspan='2'><input type='submit' value='Dodaj +1' name='sbmDodajMemoriju' /></td>
												</tr>
												
								</table></form></fieldset>";
				}
				
			break;
			case "4":
				$selectAll = "SELECT * FROM hard_diskovi ";
				$resultAll = mysql_query($selectAll,$con);
				if(mysql_num_rows($resultAll) > 0){
					$select = " <fieldset id='fildset_select'><legend class='legenda_tabela_select' align='center'>Hard Diskovi</legend></br>
									<table border='0' class='glavna_tabela_select'>
										<tr>
											<th>#</th>
											<th>Naziv Hard Diska</th>
											<th>Količina Memorije (GB)</th>
											<th>Slika 1</th>
											<th>Slika 2</th>
											<th>Slika 3</th>
											<th>Opis</th>
											<th>Cena (EUR)</th>
											<th>Datum objave</th>
											<th>Izmeni</th>
											<th>Izbriši</th>
										</tr>";
										while($hard = mysql_fetch_assoc($resultAll)){
											$select .= " <tr>
															<td>".$hard['id_hard_diska']."</td>
															<td>{$hard['naziv_hard_diska']}</td>
															<td>{$hard['kolicina_memorije']}</td>
															<td>{$hard['slika1']}</td>
															<td>{$hard['slika2']}</td>
															<td>{$hard['slika3']}</td>
															<td>{$hard['opis']}</td>
															<td>{$hard['cena']}</td>
															<td>{$hard['datum']}</td>
															<td><a href='#' onClick='izmeniKomponentu({$hard['id_hard_diska']});'>Izmeni</a></td>
															<td><a href='#' onClick='izbrisiKomponentu({$hard['id_hard_diska']});'>Izbriši</a></td>
														</tr>";
										}
						$select.="	</table></fieldset></br>";
						$selectAll1 = "SELECT * FROM hard_diskovi";
						$result1 = mysql_query($selectAll1,$con);
						$formaaab = "<fieldset id='fildset_dodaj'><legend class='legenda_tabela_dodaj' align='center'>Dodavanje u tabelu 'hard_diskovi'</legend></br>
										<form action='admin.php' method='POST' enctype='multipart/form-data'>
											<table  class='tabela_gl_link_dodaj'>
												<tr>
													<th>Naziv Hard Diska</th>
													<td><input type='text' size='35' name='nazivHardDiska'/></td>
												</tr>
												<tr>
													<th>Količina Memorije (GB)</th>
													<td><input type='text' size='5' name='memorijaHardDiska'/></td>
												</tr>
												<tr>
													<th>Slika (1)</th>
													<td><input type='file' name='slikaHardDiska1'/></td>
												</tr>
												<tr>
													<th>Slika (2)</th>
													<td><input type='file' name='slikaHardDiska2'/></td>
												</tr>
												<tr>
													<th>Slika (3)</th>
													<td><input type='file' name='slikaHardDiska3'/></td>
												</tr>
												<tr>
													<th>Opis Hard Diska</th>
													<td><textarea cols='30' rows='5' name='opisHardDiska'/></td>
												</tr>
												<tr>
													<th>Cena (EUR)</th>
													<td><input type='text' size='10' name='cenaHardDiska'/>&nbspEUR</td>
												</tr>
												<tr>
													<td colspan='2'><input type='submit' value='Dodaj +1' name='sbmDodajHardDisk' /></td>
												</tr>
												
								</table></form></fieldset>";
				}
				
			break;	
				
			
			
		}
	}
	
	
	echo $select."~".$formaaab;
?>