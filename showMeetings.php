<?php
if(isset($_POST["view"]))
{
	


		$xml = new DOMDocument();

		$xml->load('dtd.xml');

		// Load XSL file
		$xsl = new DOMDocument();
		//$xsl->load('cdcatalog.xsl');
		//$xsl->load('cdcatalog_Choose.xsl');
		$xsl->load('view.xsl');

		// Configure the transformer
		$proc = new XSLTProcessor;

		// Attach athe xsl rules
		$proc->importStyleSheet($xsl);

		echo $proc->transformToXML($xml);
}
?>