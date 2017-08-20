		function prosiriPretraga(){
			var anketaDiv = document.getElementById("pretraga");
			
			
			anketaDiv.style.height="auto";
			anketaDiv.style.transition="0.9s ease-in";
		}
		
		function prosiriAnketa(){
			var anketaDiv = document.getElementById("anketa");
			
			anketaDiv.style.color="red";
			anketaDiv.style.width="230px";
			anketaDiv.style.height="330px";
			anketaDiv.style.transition="0.9s ease-in";
		}
		function sakrijAnketa(){
			var anketaDiv = document.getElementById("anketa");
			
			anketaDiv.style.color="black";
			anketaDiv.style.width="230px";
			anketaDiv.style.height="15px";
			anketaDiv.style.transition="0.5s ease-in";
		}
		
		function aanketa(){
					
					
					var los = document.getElementById("rbLos").checked;
					var nijeLos = document.getElementById("rbNijeLos").checked;
					var dobar = document.getElementById("rbDobar").checked;
					var vrloDobar =document.getElementById("rbVrloDobar").checked;
					var odlican = document.getElementById('rbOdlican').checked;
					
					var podaci = new Array();
					
					
					var ocenaIzbor = "";
					
					if(los){
						ocenaIzbor =  document.getElementById("rbLos").value;
					}
					if(nijeLos){
						ocenaIzbor =  document.getElementById("rbNijeLos").value;
					}
					if(dobar){
						ocenaIzbor =  document.getElementById("rbDobar").value;
					}
					if(vrloDobar){
						ocenaIzbor =  document.getElementById("rbVrloDobar").value;
					}
					if(odlican){
						ocenaIzbor =  document.getElementById("rbOdlican").value;
					}
					
					
					if(ocenaIzbor==""){
						alert("Da biste ocenili nas sajt, potrebno je da prethodno odaberete neku ocenu");
						return;
					}
					else{
						podaci.push(ocenaIzbor);
						
					}
					alert("Hvala Vam na ocenjivanju naseg sajta! Nas sajt ste ocenili sa : " + podaci);
				}
		
		var slike=new Array(11);
		slike[0]="slike/slideshow/slika01.jpg";
		slike[1]="slike/slideshow/slika02.jpg";
		slike[2]="slike/slideshow/slika03.jpg";
		slike[3]="slike/slideshow/slika04.jpg";
		slike[4]="slike/slideshow/slika05.jpg";
		slike[5]="slike/slideshow/slika06.jpg";
		slike[6]="slike/slideshow/slika07.jpg";
		slike[7]="slike/slideshow/slika08.jpg";
		slike[8]="slike/slideshow/slika09.jpg";
		slike[9]="slike/slideshow/slika10.jpg";
		slike[10]="slike/slideshow/slika11.jpg";
		
		
		
		var brojac=0;
				var t;
				
		function timer(){
			document.slika.src=slike[brojac];
			brojac=(brojac+1)%slike.length;//ovo je bolje resiti sa moduo
			t=setTimeout("timer()",5000);
		}
		function zaustavi(){
			if(brojac!=0){
			brojac=brojac-1;}
			clearTimeout(t);
		}
		function prijavise(){
			var korisnickoIme = document.getElementById("tKorisnickoIme");
			var sifra = document.getElementById("tSifra");
			
			if(korisnickoIme.value==""||sifra.value==""){
				alert("Molimo, unesite vase podatke");
			}
			else{
				alert("Trenutno nam ne radi baza podataka");
				
			}
			
		}
		datum = new Date();
		godina = datum.getFullYear();
		
		function year() {      
				var opcijaGodina;   
				var i;   
				var brojGodina = 1;
				
				
				for(i=godina;i>=1900;i--,brojGodina ++){   
					opcijaGodina = new Option(i,i);         
					document.registracija.godina.options[brojGodina]  = opcijaGodina;
					
				}  
				
		} 
		
		
		function popuniListu(izabraniMesec){
			
			var brojDana=new Array(31,28,31,30,31,30,31,31,30,31,30,31);
			var opcijaDan = document.registracija.dan.options;
			var mesec = izabraniMesec.options[izabraniMesec.selectedIndex].value;
			
			
			
			var i=0
			var selektovanaGodina = document.getElementById("godina").value;
			
			var mesecTemp = parseInt(mesec);
			if(mesec !=""){
				
				opcijaDan.length = 0;
				for(i;i<brojDana[mesecTemp];i++){
					opcijaDan[i] = new Option(i+1);
				}
				
			}
			
			if(mesecTemp==1){
				
				if(selektovanaGodina%4==0){
					for(var j=0;j<29;j++){
							opcijaDan[j]=new Option(j+1);
						}
					}
				}
			}
			
			function provera(){
				var ime = document.getElementById("rgIme").value;
				var prezime = document.getElementById("rgPrezime").value;
				var email = document.getElementById("rgEmail").value;
				var sifra = document.getElementById("rgSifra").value;
				var potvrdaSifre = document.getElementById("rgPotvrdaSifre").value;
				
				var regIme = /^[A-Z][a-z]{1,}$/;
				var regPrezime = /^[A-Z][a-z]{2,}$/;
				var regEmail = /^([a-z0-9]{1,}[\.]?[a-z0-9]{1,})@\w+[a-z][0-9]*(\.\w{2,3})+$/;
				var regSifra = /^(([0-9]{1,}[A-z]{1,}[0-9A-z]{3,10})|([A-z]{1,}[0-9]{1,}[0-9A-z]{3,10})|([0-9]{2,}[A-z]{1,}[0-9A-z]{2,10})|([0-9]{3,}[A-z]{1,}[0-9A-z]{1,10})|([A-z]{2,}[0-9]{1,}[0-9A-z]{2,10})|([A-z]{3,}[0-9]{1,}[0-9A-z]{1,10})|([0-9]{1,}[A-z]{4,})|([A-z]{4,}[0-9]{1,})|([0-9]{4,}[A-z]{1,}))$/;
				var regPotvrdaSifre = sifra;
				
				var podaci= new Array();
				var greske= new Array();
				
				
				if(!regIme.test(ime)){
					document.getElementById("rgIme").style.border="1px solid red";
					document.getElementById("rgLevoIme").style.borderRightWidth="2px";
					document.getElementById("rgLevoIme").style.borderColor="red";
					greske.push("- Ime mora imati prvo veliko slovo, i bar jos jedno malo slovo");
				}
				else{
					podaci.push(ime);
					
				} 
				if(!regPrezime.test(prezime)){
					greske.push("- Prezime mora imati prvo veliko slovo, i bar jos dva mala slova");
					document.getElementById("rgPrezime").style.border="1px solid red";
					document.getElementById("rgLevoPrezime").style.borderRightWidth="2px";
					document.getElementById("rgLevoPrezime").style.borderColor="red";
				}
				else{
					podaci.push(prezime);
					
				} 
				if(!regEmail.test(email)){
					greske.push("- E-mail mora imati pravi format mail adrese");
					document.getElementById("rgEmail").style.border="1px solid red";
					document.getElementById("rgLevoEmail").style.borderRightWidth="2px";
					document.getElementById("rgLevoEmail").style.borderColor="red";
					
				}
				else{
					podaci.push(email);
					
				} 
				if(!regSifra.test(sifra)){
					greske.push("- Lozinka mora imati minimum 5, maksimum 12 karaktera, kombinacijom slova i brojeva ");
					document.getElementById("rgSifra").style.border="1px solid red";
					document.getElementById("rgLevoSifra").style.borderRightWidth="2px";
					document.getElementById("rgLevoSifra").style.borderColor="red";
				}
				else{
					podaci.push(sifra);
				} 
				if(regPotvrdaSifre != potvrdaSifre){
					greske.push("- Polje 'potvrda lozinke' mora biti isto kao u polju 'Lozinka'");
					document.getElementById("rgPotvrdaSifre").style.border="1px solid red";
					document.getElementById("rgLevoPotvrdaSifre").style.borderRightWidth="2px";
					document.getElementById("rgLevoPotvrdaSifre").style.borderColor="red";
					
				}
				else{
					if(potvrdaSifre==""){
					greske.push("- Polje 'potvrda lozinke' ne sme biti prazno");
					document.getElementById("rgPotvrdaSifre").style.border="1px solid red";
					document.getElementById("rgLevoPotvrdaSifre").style.borderRightWidth="2px";
					document.getElementById("rgLevoPotvrdaSifre").style.borderColor="red";
				}
				}
					
				
				var divRezultat = document.getElementById("greske");
				var rezulutat = "";
				
				rezultat="<p>";
				if(greske.length!=0){
						for (var i=0;i<greske.length;i++){
								rezultat += greske[i]+"</br>";
							
						}
				
				rezultat+="</p>";
				divRezultat.innerHTML = rezultat;
				}
				else{
					if(podaci.length!=0){
						alert("Hvala na registraciji! Vaši podaci : " +podaci+ " će se upravo poslati na naš mail.");
						location = "mailto:m4r3ja@live.com?subject=Registracija za hotel Marko&body=Ime: " +ime+ "%0APrezime: " +prezime+"%0AE-mail: " +email+ "%0ASifra : " +sifra+"";
						return;
					}
				}
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
			
			function proveraPrezime(){
				var prezime = document.getElementById("rgPrezime").value;
				var regPrezime = /^[A-Z][a-z]{2,}$/;
				
				if(!regPrezime.test(prezime)){
					document.getElementById("rgPrezime").style.border="1px solid red";
					document.getElementById("rgLevoPrezime").style.borderRightWidth="2px";
					document.getElementById("rgLevoPrezime").style.borderColor="red";
				}
				else{
					document.getElementById("rgPrezime").style.border="1px solid green";
					document.getElementById("rgLevoPrezime").style.borderRightWidth="2px";
					document.getElementById("rgLevoPrezime").style.borderColor="green";
					
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
			
			function uvecaj(){
				var autor = document.getElementById("autor");
				autor.style.transform="scale(1,2)"
				
			}
			  
			function prikazi(){
				var podmeni = document.getElementById("podmeni");
				podmeni.style.display="block";
				
			}
			
			function sakrij(){
				var podmeni = document.getElementById("podmeni");
				podmeni.style.display="none";
			}

		
		
				
				
				
				
				