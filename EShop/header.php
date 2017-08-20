<?php
	@session_start();
?>

<!-- ------------------------------------- PRIJAVLJIVANJE ----START--------------------------------------------- -->
		
<?php 
	if(isset($_POST['prijavi'])){
		include_once("konekcija.inc");
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM klijenti WHERE kor_ime ='$username' AND lozinka ='".md5($password)."'";
		$result = mysql_query($query,$con);
		
		// ---------------PROVERA DA LI JE ADMIN----START---------------------------

		if(mysql_num_rows($result) == 1){
			$korisnikPodaci = mysql_fetch_assoc($result);
			$_SESSION['id_klijenta'] = $korisnikPodaci['id_klijenta'];
			if($_SESSION['id_klijenta'] == '1' ){
			header("Location:admin.php");
			}
			else{
				header("Location:index.php");
			}
		}
		else{
			echo "<p class='error_reg'> Doslo je do greske </p>";
		}
		
		// ----------------PROVERA DA LI JE ADMIN----END---------------------------

	}
?>

<!-- ---------------------------------- PRIJAVLJIVANJE ------END----------------------------------------- -->

<html>
	<head>

<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="stil.css"/>
		<script type="text/javascript" src="jquery.js"></script>
		
		<script type="text/javascript" src="proba.js"></script> 
		 
		
		<script lang="javascript">
		$(document).ready(function(){
			
			
			
			$("div[class*='nivo']").css("display","none");
			
			
			
		});
		
		
				
		var slike=new Array(5);
		
		slike[0]="slike/slideshow/slika01.jpg";
		slike[1]="slike/slideshow/slika02.jpg";
		slike[2]="slike/slideshow/slika03.jpg";
		slike[3]="slike/slideshow/slika04.jpg";
		slike[4]="slike/slideshow/slika05.jpg";
		
		
		
		
		var brojac=0;
				var t;
		
			function prvo(){
			
		
		
				
			document.slika.src=slike[brojac];
			brojac=(brojac+1)%slike.length;//ovo je bolje resiti sa moduo
			t=setTimeout("prvo()",5000);
	
			var w = window.outerWidth;
			var h = window.outerHeight;
			
			
					
				}  
			
			
			
			
			function zaustavi(){
			if(brojac!=0){
			brojac=brojac-1;}
			clearTimeout(t);
			}
			
			function pokazi(id){
				if(id == 1){
					$("#nivo"+id+'.nivoDiv').css("display","block");
					$("#nivo"+id+' .nivo2-box').css("display","block");
				}
				else{
					$("#nivo"+id+'.nivoDiv').css("display","block");
					$("#nivo"+id+' .nivo1-box').css("display","block");
				}
					
					
			}
			function sakrij(id){
				if(id == 1){
						$("#nivo"+id+' .nivo2-box').css("display","none");
				}
				else{
						$("#nivo"+id+' .nivo1-box').css("display","none");
				}
					
			}
				
			function prikaziFormu(){
				$("#forma_registracija").slideToggle();
				
			}	
				
			$(document).ready(function(){
				$(".error_reg").slideToggle(3000);
				
			});
			function searchAll(string){
				$.ajax({
				  url: "search.php",
				  data : "string="+string
				})
				.done(function( data ) {
					$("#searchResult").html(data);
				});
			}
			function popuni(text){
				$("#search").val(text);
				$("#searchResult").html("");
			}
			function aanketa(){
				ocena = $("#anketa-tabela input[name=rbOcena]:checked").val();
				$.ajax({
				  url: "anketa.php",
				  data : "ocena="+ocena
				})
				.done(function( data ) {
					$("#pozicija_tabele").html(data);
				});
			}
			
			
		
		
		
		
		
			
			
			
			function nastavak(){
				var ime = document.getElementById("rgIme").value;
				var email = document.getElementById("rgEmail").value;
				var sifra = document.getElementById("rgSifra").value;
				var potvrdaSifre = document.getElementById("rgPotvrdaSifre").value;
				$.ajax({
					url:"registracijaInsert.php",
					data:"kor_ime="+ime+"&email="+email+"&lozinka="+sifra+"&lozinkaPonovo="+potvrdaSifre
				})
				.done(function(data){
					$("#greske").html(data);
				});
				
				
				
			}
			
			function proveraIme(){
				var ime = document.getElementById("rgIme").value;
				
				var regIme = /^[A-Z][a-z]{1,}$/;
				
				if(!regIme.test(ime)){
					document.getElementById("rgIme").style.border="1px solid red";
					document.getElementById("rgLevoIme").style.borderRightWidth="2px";
					document.getElementById("rgLevoIme").style.borderColor="red";
				}
				else{
					document.getElementById("rgIme").style.border="1px solid green";
					document.getElementById("rgLevoIme").style.borderRightWidth="2px";
					document.getElementById("rgLevoIme").style.borderColor="green";
					
				}
				
				
			}
			
			
			
			function proveraEmail(){
				var email = document.getElementById("rgEmail").value;
				var regEmail = /^([a-z0-9]{1,}[\.]?[a-z0-9]{1,})@\w+[a-z][0-9]*(\.\w{2,3})+$/;
				
				if(!regEmail.test(email)){
					document.getElementById("rgEmail").style.border="1px solid red";
					document.getElementById("rgLevoEmail").style.borderRightWidth="2px";
					document.getElementById("rgLevoEmail").style.borderColor="red";
					
				}
				else{
					document.getElementById("rgEmail").style.border="1px solid green";
					document.getElementById("rgLevoEmail").style.borderRightWidth="2px";
					document.getElementById("rgLevoEmail").style.borderColor="green";
					
				}
			}
			
			function proveraSifra(){
				var sifra = document.getElementById("rgSifra").value;
				var regSifra = /^(([0-9]{1,}[A-z]{1,}[0-9A-z]{3,10})|([A-z]{1,}[0-9]{1,}[0-9A-z]{3,10})|([0-9]{2,}[A-z]{1,}[0-9A-z]{2,10})|([0-9]{3,}[A-z]{1,}[0-9A-z]{1,10})|([A-z]{2,}[0-9]{1,}[0-9A-z]{2,10})|([A-z]{3,}[0-9]{1,}[0-9A-z]{1,10})|([0-9]{1,}[A-z]{4,})|([A-z]{4,}[0-9]{1,})|([0-9]{4,}[A-z]{1,}))$/;
				
				if(!regSifra.test(sifra)){
					document.getElementById("rgSifra").style.border="1px solid red";
					document.getElementById("rgLevoSifra").style.borderRightWidth="2px";
					document.getElementById("rgLevoSifra").style.borderColor="red";
					
				}
				else{
					document.getElementById("rgSifra").style.border="1px solid green";
					document.getElementById("rgLevoSifra").style.borderRightWidth="2px";
					document.getElementById("rgLevoSifra").style.borderColor="green";
				}
			}
			
			function proveraPotvrdaSifre(){
				var sifra = document.getElementById("rgSifra").value;
				var potvrdaSifre = document.getElementById("rgPotvrdaSifre").value;
				var regPotvrdaSifre = sifra;
				
				
				
				if(regPotvrdaSifre != potvrdaSifre){
					document.getElementById("rgPotvrdaSifre").style.border="1px solid red";
					document.getElementById("rgLevoPotvrdaSifre").style.borderRightWidth="2px";
					document.getElementById("rgLevoPotvrdaSifre").style.borderColor="red";
					
				}
				else{
					if(potvrdaSifre==""){
					document.getElementById("rgPotvrdaSifre").style.border="1px solid red";
					document.getElementById("rgLevoPotvrdaSifre").style.borderRightWidth="2px";
					document.getElementById("rgLevoPotvrdaSifre").style.borderColor="red";
				}
				else{
					document.getElementById("rgPotvrdaSifre").style.border="1px solid green";
					document.getElementById("rgLevoPotvrdaSifre").style.borderRightWidth="2px";
					document.getElementById("rgLevoPotvrdaSifre").style.borderColor="green";
				}
			}
		
			}

			
			$(document).ready(function(){
				startNoFilters = $("#desno").html();
			});
			
			function ponisti(){
				$("#blok").html(startNoFilters);
				$(".tabela_levo input:checked").each(function(){
							
									$(this).attr("checked",false);	
						})
			}
			
			function filtriraj(obj){
				
				
				
				var oldestHtml = $("#desno").html();
				if(obj.checked == true || $(".tabela_levo input:checked").length > 0){
					
					
					
					$.ajax({
					  url: "filtracija.php",
					  data : "po=" + obj.value + "&sort=filter" + "&idTipa="+window.location.search.substring(4) + "&limit=0"
					})
					.done(function( data ) {
						$(".tabela_levo input[name=sort]:checked").each(function(){
							
									$(this).attr("checked",false);	
						})
						
						
						
						if(obj.checked == true && $(".tabela_levo input:checked").length > 0){
								var prvi = $("#desno").html();
								$("#desno").html(data);
						}		
						
						else{
							$("#desno").html(startNoFilters);
						}
					});
				}
				else{
					$("#desno").html(startNoFilters);
				}
			}
			function filtriranje2(limit){
				
				
				startNoFilters = $("#desno").html();
				var oldestHtml = $("#desno").html();
				obj = $(".tabela_levo input:checked")[0];
				if(obj.checked == true || $(".tabela_levo input:checked").length > 0){
					
					
					
					$.ajax({
					  url: "filtracija.php",
					  data : "po=" + obj.value + "&sort=filter" + "&idTipa="+window.location.search.substring(4) + "&limit="+limit
					})
					.done(function( data ) {
						$(".tabela_levo input[name=sort]:checked").each(function(){
							
									$(this).attr("checked",false);	
						})
						
						
						
						if(obj.checked == true && $(".tabela_levo input:checked").length > 0){
								var prvi = $("#desno").html();
								$("#desno").html(data);
						}		
						
						else{
							$("#desno").html(startNoFilters);
						}
					});
				}
				else{
					$("#desno").html(startNoFilters);
				}
			}
			
			
			function sortiranje(obj){
				startNoFilters = $("#desno").html();
				var oldestHtml = $("#desno").html();
				if(obj.checked == true || $(".tabela_levo input:checked").length > 0){
					$.ajax({
					  url: "filtracija.php",
					  data : "po=" + obj.value + "&sort=sort" + "&idTipa="+window.location.search.substring(4)+"&filter=" + encodeURIComponent($(".tabela_levo input[type='checkbox']").serialize())+"&limit=0"
					})
					.done(function( data ) {
						$(".tabela_levo input[name=M]:checked").each(function(){
							
									$(this).attr("checked",false);	
						})
						$("#desno").html("");
						if( $(".tabela_levo input:checked").length > 1){
							var oldHtml = $("#blok").html();
							$("#desno").html(oldHtml + data);
						}
						else{
							$("#desno").html(data);
						}
						
					});
				}
				else{
					$("#desno").html(startNoFilters);
				}
				
			}
			
			function sortiranje2(limit){
				startNoFilters = $("#desno").html();
				var oldestHtml = $("#desno").html();
				obj = $(".tabela_levo input:checked")[0];
				if(obj.checked == true || $(".tabela_levo input:checked").length > 0){
					$.ajax({
					  url: "filtracija.php",
					  data : "po=" + obj.value + "&sort=sort" + "&idTipa="+window.location.search.substring(4)+"&filter=" + encodeURIComponent($(".tabela_levo input[type='checkbox']").serialize())+"&limit="+limit
					})
					.done(function( data ) {
						$(".tabela_levo input[name=M]:checked").each(function(){
							
									$(this).attr("checked",false);	
						})
						$("#blok").html("");
						if( $(".tabela_levo input:checked").length > 1){
							var oldHtml = $("#desno").html();
							$("#desno").html(oldHtml + data);
						}
						else{
							$("#desno").html(data);
						}
						
					});
				}
				else{
					$("#desno").html(startNoFilters);
				}
				
			}
			
			function oceni_sliku(){
				var vrednost = $("#tabela_oceni_levo input:checked").val();
				
				if(vrednost>0 && vrednost <6){
				$.ajax({
					url:"promenaSeminarski.php",
					data:"id="+$(".idSlike").val()+"&vrednost="+vrednost
				})
				.done(function(data){
					$("#sajt_sredina_komponente").html(data);
					
				})
				}
				else{
					alert("ne valja");
				}
			}
			
			function kontakt(){
				var imeKorisnika = document.getElementById("kor_ime").value;
				var mailKorisnika = document.getElementById("kor_email").value;
				var naslovPoruke= document.getElementById("kor_naslov_poruke").value;
				var poruka = document.getElementById("kor_poruka").value;
				$.ajax({
					url:"kontaktInsert.php",
					data:"imeKorisnika="+imeKorisnika+"&mailKorisnika="+mailKorisnika+"&naslovPoruke="+naslovPoruke+"&poruka="+poruka
				})
				.done(function(data){
					$("#status").html(data);
					
				})
				
				
			}
			
			
			
		</script>
		
	</head>
	<body onload="prvo();">
		
		<div id="sajt_gore">
				<div id="heder">
					
					<div id="menu">
						
							<ul id="nivo0" >
							<?php 
								include_once("konekcija.inc");
								$selectLinksQuery = "SELECT * FROM glavni_meni ORDER BY poz_linka ASC";
								$result = mysql_query($selectLinksQuery,$con);
								if(mysql_num_rows($result) > 0){
									while($links = mysql_fetch_assoc($result)){
										echo '<li';
									
										$selectIzVezivneTabele = "SELECT id_pod_linka FROM gl_meni_podmeni WHERE id_gl_linka = ".$links['id_linka'];
										$resultVezivna = mysql_query($selectIzVezivneTabele,$con);
										if(mysql_num_rows($resultVezivna) > 0){
											echo ' onMouseOver="pokazi('.$links['id_linka'].');"  onMouseOut="sakrij('.$links['id_linka'].');"><a href="'.$links['putanja_linka'].'">'.$links['naziv_linka'].'</a></li>';
											echo '<div id="nivo'.$links['id_linka'].'" class="nivoDiv" onMouseOver="pokazi('.$links['id_linka'].');"  onMouseOut="sakrij('.$links['id_linka'].');">';
											while($podlinks = mysql_fetch_assoc($resultVezivna)){
												$selectPodlinkove = "SELECT * FROM podmeni WHERE id_linka=".$podlinks['id_pod_linka'];
												$resultPodlinkovi = mysql_query($selectPodlinkove,$con);
												while($podLink = mysql_fetch_assoc($resultPodlinkovi)){
													if($links['id_linka'] > 1){
													echo '
														<div class="nivo1-box">
														<a href="'.$podLink['putanja_linka'].'">
															<li>'.$podLink['naziv_linka'].'<div class="slika">
																
																
																<img src="'.$podLink['slika'].'" height="125" width="125" />
																
															</div></li></a>
														</div>';
													}
													else{
														echo '
														<div class="nivo2-box">
														<a href="'.$podLink['putanja_linka'].'">
															<li>'.$podLink['naziv_linka'].'</li></a>
														</div>';
													}
												}
											}
											echo '</div>';
										}
										else{
											echo '><a href="'.$links['putanja_linka'].'">'.$links['naziv_linka'].'</a></li>';
										}
									}
										
								}
								if(isset($_SESSION['id_klijenta']) && $_SESSION['id_klijenta'] == "1"){
									echo '<li ><a href="admin.php">Administracija</a></li>';
								} 
								if(isset($_SESSION['id_klijenta'])){
									echo '<li><a href="odjava.php">Odjavi se</a></li>';
								}
								else{
									echo '<li ><a href="#" onClick="prikaziFormu();">Login</a></li>';
								}
							?>
							</ul>
							<input type='text' onKeyUp="searchAll(this.value);" id="search" />
							<div id='searchResult'></div>
						
					</div>
					<div id="heder_sadrzaj">
						<div id="logo_slika">
							<a href="index.php">
								<img src="slike/logo4.png" width="170"/>
							</a>
						</div>
						<div id="heder_sadrzaj_tekst">
							
								<div class='linkovi'>
									<div class="link_naslov">
										<a href='index.php'>e-Shop</a>
									</div>
									<div class="link_ostalo">
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
						<div id='forma_registracija'>
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' id='frm_reg'>
									<table id="login_tabela" border='0'>
										<tr>
											<th class="label">
												Username : 
											</th>
										</tr>
										<tr>
											<td class='text_input'><input type='text' size='20' name='username' /></td>
										</tr>
										<tr>
											<th class="label">
												Password : 
											</th>
										</tr>
										<tr>
											<td class='text_input'><input type='password' size='20' name='password' /></td>
										</tr>
										<tr>
											<td><input type='submit' name='prijavi' value='Prijavi se'/></td>
										</tr>
										<tr>
											<td>Niste registrovani? Registrujte se <a class='login_a' href='registracija.php'>ovde</a></td>
										</tr>
									</table>
								</form>
							</div>
					</div>
					
					
					
				</div>
				<div class="ocisti">
			</div>
		</div>