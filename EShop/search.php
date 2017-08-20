<?php 
	$rec = $_GET['string'];
	if($rec != ""){
		include_once('konekcija.inc');
		$selectRacunare = "SELECT id_racunara,naziv_racunara FROM `desktop_racunari` WHERE naziv_racunara LIKE '$rec%'";
		$desktopRacunari = mysql_query($selectRacunare,$con);
			$response = "<ul> ";
		if(mysql_num_rows($desktopRacunari) > 0){
			while($racunar = mysql_fetch_assoc($desktopRacunari)){
			$response .= "<li onClick='popuni(\"{$racunar['naziv_racunara']}\");' > <a href='racunari.php?id={$racunar['id_racunara']}'>{$racunar['naziv_racunara']}</a></li>";
			}
		}
		// procesori
		$selectRacunare = "SELECT id_procesora,naziv_procesora FROM `procesori` WHERE naziv_procesora LIKE '$rec%'";
		$desktopRacunari = mysql_query($selectRacunare,$con);
			$response .= "<ul> ";
		if(mysql_num_rows($desktopRacunari) > 0){
			while($racunar = mysql_fetch_assoc($desktopRacunari)){
			$response .= "<li onClick='popuni(\"{$racunar['naziv_procesora']}\");' > <a href='komponente.php?idKomp={$racunar['id_procesora']}&idTipa=1'>{$racunar['naziv_procesora']}</a></li>";
			}
		}
		// graficke 
		$selectRacunare = "SELECT id_graficke,naziv_graficke FROM `graficke` WHERE naziv_graficke LIKE '$rec%'";
		$desktopRacunari = mysql_query($selectRacunare,$con);
			$response .= "<ul> ";
		if(mysql_num_rows($desktopRacunari) > 0){
			while($racunar = mysql_fetch_assoc($desktopRacunari)){
			$response .= "<li onClick='popuni(\"{$racunar['naziv_graficke']}\");' > <a href='komponente.php?idKomp={$racunar['id_graficke']}&idTipa=2'>{$racunar['naziv_graficke']}</a></li>";
			}
		}
			$response .= "</ul>";
		echo $response;
	}
?>