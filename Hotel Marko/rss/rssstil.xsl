<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
	<xsl:template match="/">
		<html>
			<body>
				<table border="1" align="center" style="">
				<thead style="background-color:lightblue;">
					<tr>
						<th>title</th>
						<th>Link</th>
						<th>Novosti</th>
						
						
					</tr>
				</thead>
				<tbody style="background-color:rgb(200,150,80); color:white">
					<xsl:for-each select="channel/item">
					<tr>
						<td><xsl:value-of select="title"/></td>
						<td><xsl:value-of select="link"/></td>
						<td><xsl:value-of select="description"/></td>
						
					</tr>
					</xsl:for-each>
				</tbody>
				</table>	
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>