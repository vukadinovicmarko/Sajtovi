<html>
	<head>
	</head>
	<body>
		<form action="pretraga.php" method="post">
			<tr>
				<td>Pretrai po godini staza: </td>
				<td><input type="text" name="tbGod">
			</tr>
			<tr>
				<td>
					<input type="submit" name="pretrazi" value="Trazi">
				</td>
			</tr>
		</form>
		<?php
			include_once("konekcija_sa_bazom.inc");
			if(isset($_POST['pretrazi']))
			{
				$tbGod=$_POST['tbGod'];
				$upit="SELECT * FROM baza_01.ANKETE WHERE ukupni_staz='$tbGod'";
				$rezultat_select_upita=mysql_query($upit, $con) or die ("Nije dobar 'select' upit!".mysql_error());
				
				echo "<table border='1'>";
				while($zapis=mysql_fetch_array($rezultat_select_upita))
				{
				echo "<tr><td>{$zapis['ime']}</td>
							  <td>".$zapis['prezime']."</td>
							  <td>{$zapis['posedovanje_telefona']}</td>
							  <td>{$zapis['broj_telefona']}</td>
							  <td>{$zapis['status_staza']}</td>
							  <td>{$zapis['slika']}</td>
							  <td>{$zapis['ukupni_staz']}</td></tr>";
				}
				echo "</table>";
			}
			mysql_close($con);
		?>
	<body>
</html>