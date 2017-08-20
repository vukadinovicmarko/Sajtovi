<?php
	@session_start();
	if(!isset($_SESSION['id_klijenta']) || $_SESSION['id_klijenta'] != "1"){
		header("Location: index.php");
		
	}
?>
<html>
	<head>
<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stil.css"/>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="proba.js"></script>
		
		<script lang="javascript">
/* ---------------------------------------- A J A X preko JQuerija -------------------------------------------------------- */	
/* ------------------------------------------------------------------------------------------------------------------------ */	
		
			
/* -----------------------------SELECT, ukljucujuci i INSERT-------------------------------------------------------- */
			function sakrijNepotrebno(){
				$("#tabela_update").hide(600);
				
				$("#tabela_select").empty();
				$("#tabela_insert").empty();
				$("#tabela_update").empty();
				
			}
			function dodajResponse(id){
				sakrijNepotrebno();
				if(id!=0){
					$.ajax({
						url:"promena.php",
						data:"id=" + parseInt(id) 
					})
					.done(function(data){
						if(data.indexOf("class='selectOnly'") == "-1"){
							$("#dodatniDDL").fadeOut(1000);
							
							var podeljeno = data.split('~');
							var select = podeljeno[0];
							var form = podeljeno[1];
							
							$("#tabela_select").hide();
							$("#tabela_select").fadeIn(600);
							$("#tabela_insert").hide();
							$("#tabela_insert").fadeIn(600);
							
							$("#tabela_select").html(select);
							$("#tabela_insert").html(form);
							
							
						}
						else{
							$("#dodatniDDL").show();
							var podeljeno = data.split('~');
							var select = podeljeno[0];
							var form = podeljeno[1];
							
							$("#dodatniDDL").html(form);	
							
								
														
						}
						
					});
					
				}
				
				else{
					alert("molimo unesite vrednost!!");
					$("#tabela_select").empty();
					$("#tabela_insert").empty();
					$("#tabela_update").empty();
				}
				
			}
			

			function izaberi_tip(value){
				sakrijNepotrebno();
				if(value!=0){
					$.ajax({
						url:"promena.php",
						data:"value="+parseInt(value)
					})
					.done(function(data){
						if(data.indexOf("class='selectOnly'") == "-1"){
							var podeljeno = data.split('~');
							var select = podeljeno[0];
							var form = podeljeno[1];
							
							$("#tabela_select").hide();
							$("#tabela_select").fadeIn(600);
							$("#tabela_insert").hide();
							$("#tabela_insert").fadeIn(600);
							
							$("#tabela_select").html(select);
							$("#tabela_insert").html(form);	
								
						}
						else{
							var podeljeno = data.split('~');
							var select = podeljeno[0];
							var form = podeljeno[1];
							
							$("#dodatniDDL").html(form);	
							$("#sajt_sve_sredina_admin").html="";
							
							// $("#tabela_sajta").html(data);							
						}
						
					});
				}
				
			}
			

			function izaberi_komponentu(komponenta,brzo){
				if(komponenta!=0){
					
					$.ajax({
						url:"promena.php",
						data:"komponenta="+parseInt(komponenta)
					})
					.done(function(data){
							var podeljeno = data.split('~');
							var select = podeljeno[0];
							var form = podeljeno[1];
							if(brzo != undefined){
								sakrijNepotrebno();
								$("#tabela_select").hide();
								$("#tabela_select").fadeIn(600);
								$("#tabela_insert").hide();
								$("#tabela_insert").fadeIn(600);
								
								$("#tabela_select").html(select);
								$("#tabela_insert").html(form);
							}
							else{
								$("#tabela_update").hide();
								$("#tabela_update").fadeIn(600);
								
								$("#tabela_update").html(form);
								
							}
					});
				
				}
			}
			
			
			
			
			
/* ------------------------------------samo UPDATE-------------------------------------------------------- */


				
			function izmeni(id){
				
				
				$.ajax({
				  url: "izmene.php",
				  data : "idTipaLinka="+$("#izaberi_akciju_admin").val()+ "&id=" + parseInt(id) + '&izmeni=da'
				})
				.done(function( data ) {
					$("#tabela_update").hide();
					$("#tabela_update").fadeIn(500);
					$("#tabela_update").html(data);
				});
			
			}
			
			function izmeniDesktop(id){
				$.ajax({
				  url: "izmeneDesktop.php",
				  data : "idDesktopa="+$("#select_desktop").val()+ "&id=" + parseInt(id) + '&izmeni=da'
				})
				.done(function( data ) {
					//$("#tabela_sajta").find('form').remove();
					$("#tabela_update").hide();
					$("#tabela_update").fadeIn(500);
					$("#tabela_update").find('div').remove();
					$("#tabela_update").html(data);
					
				});
				
			}
			
			function izmeniKomponentu(id){
				
				$.ajax({
				  url: "izmeneKomponente.php",
				  data : "idKomponente="+$("#select_komponente").val()+ "&id=" + parseInt(id) + '&izmeni=da'
				})
				.done(function( data ) {
					//$("#tabela_sajta").find('form').remove();
					$("#tabela_update").hide();
					$("#tabela_update").fadeIn(500);
					$("#tabela_update").find('div').remove();
					$("#tabela_update").append("<div>"+data+"</div>");
					
				});
				
			}
			
			
			
					
					
/* ------------------------------------------------samo DELETE--------------------------------------------------------- */


			function izbrisi(id){
				
				
				$.ajax({
				  url: "izbrisi.php",
				  data : "idTipaLinka="+$("#izaberi_akciju_admin").val()+ "&id=" + parseInt(id)
				})
				.done(function( data ) {
					$('#izaberi_akciju_admin').val($("#izaberi_akciju_admin").val());
					dodajResponse($("#izaberi_akciju_admin").val());
					setTimeout(function(){
					$("#tabela_sajta").append("<p class='odgovor'>" + data +"</p>");
					$(".odgovor").fadeOut(3000);
					},200);
				});
				
			}
			
			function izbrisiRacunar(id){
				$.ajax({
				  url: "izbrisiRacunar.php",
				 data : "idTipaRacunara="+$("#select_racunar").val()+ "&id=" + parseInt(id)
				})
				.done(function( data ) {
					$('#select_racunar').val($("#select_racunar").val());
					izaberi_tip($("#select_racunar").val());
					setTimeout(function(){
					$("#tabela_sajta").append("<p class='odgovor'>" + data +"</p>");
					$(".odgovor").fadeOut(3000);
					},200);
				});
					
				
				
			}
			
				
/* ---------------------------------------- A J A X preko JQuerija -- K R A J ------------------------------------------------------ */	
/* --------------------------------------------------------------------------------------------------------------------------------- */					
			
			
		</script>
		
	</head>
	<body>
			<div id="sajt_gore_admin">
				<div id="heder_admin">
					
						<div id="menu_admin">
							
								<ul id="nivo0" >
									<li><a href="index.php" >Po&#269;etna stranica</a></li>
									<?php 
									
										if(isset($_SESSION['id_klijenta'])){
											echo '<li><a href="odjava.php">Odjavi se</a></li>';
										}
										else{
											echo '<li><a href="#" onClick="prikaziFormu();">Login</a></li>';
										}
									?>
								</ul>
							
						</div>
						
					<div id='forma_registracija'>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' id='frm_reg'>
							<label for="username">
								Username : 
							</label>
							<input type='text' name='username' />
							<label for="password">
								Password : 
							</label>
							<input type='password' name='password' />
							<input type='submit' name='prijavi' value='Prijavi se'/>
						</form>
						
					</div>
				</div>
				<div class="ocisti">
		</div>
			</div>