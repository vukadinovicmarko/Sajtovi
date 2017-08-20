<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:sm="http://www.sitemaps.org/schemas/sitemap/0.9">
	<xsl:template match="/">
		<html>
			<body>
				<table border="1" align="center" style="">
				<thead style="background-color:lightblue;">
					<tr>
						<th>Link</th>
						<th>Datum poslednje promene</th>
						<th>Frekfencija promena</th>
						<th>Prioritet</th>
					</tr>
				</thead>
				<tbody style="background-color:rgb(200,150,80); color:white">
					<xsl:for-each select="sm:urlset/sm:url">
					<tr>
						<td><xsl:value-of select="sm:loc"/></td>
						<td><xsl:value-of select="sm:lastmod"/></td>
						<td><xsl:value-of select="sm:changefreq"/></td>
						<td><xsl:value-of select="sm:priority"/></td>
					</tr>
					</xsl:for-each>
				</tbody>
				</table>	
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>