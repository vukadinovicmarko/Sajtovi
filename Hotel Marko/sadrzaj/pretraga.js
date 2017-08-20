
function pretragaa(){

 if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
 else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
 xmlhttp.open("GET","xmlHotel.xml",false);
 xmlhttp.send();
 xmlDoc=xmlhttp.responseXML;
 dohvatiPodatke3(xmlDoc);
}
function dohvatiPodatke3(xmlDoc){
 var tbPretraga=document.getElementById('pretragaText');
 var tekst='Morate odabrati vrstu smeštaja : dvokrevetna, junior, senior ';
  var sveSobe=xmlDoc.getElementsByTagName('Soba');
  for(var i=0;i<sveSobe.length;i++){
	  var ime=sveSobe[i].getElementsByTagName('tip')[0].childNodes[0].nodeValue;
	            var      pogled=     sveSobe[i].getElementsByTagName('pogled')[0].childNodes[0].nodeValue;
	 var opis=sveSobe[i].getElementsByTagName('WiFi')[0].childNodes[0].nodeValue;
	 var link=sveSobe[i].getElementsByTagName('url')[0].childNodes[0].nodeValue;
      if(tbPretraga.value.toLowerCase().trim()==ime.toLowerCase().trim()){
	  tekst="<span style='color:#718147; font-size:13px'><i><b>Tip: </b></i></span>"+ime+
	        "<br/><span style='color:#718147; font-size:13px'><i><b>Pogled na centar: </b></i></span>"+pogled+
			"<br/><span style='color:#718147; font-size:13px'><i><b>WiFi: </b></i></span>"+opis+
			"<br/><span style='color:#718147; font-size:13px'><i><b>URL: </b></i></span>"+link;}
  }
	document.getElementById("rezultatPretraga").innerHTML=tekst;


}









///////////////var noviProzor = window.open('', 'Prikaz obavljene pretrage', 'toolbar=no, status=no, width=500, height=500');
			
//var poruka ="<h1>rezultat pretrage je </h1>" +tekst + "<br />";

//noviProzor.document.write(poruka);

