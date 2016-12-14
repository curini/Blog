<?php

function createXml(){ 
     $xml = '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0">';
     $xml .= '<channel>'; 
     $xml .= '<title>Dialog Box flux RSS</title>';
     $xml .= '<link>'.$_SERVER['SERVER_NAME'].'</link>';
     $xml .= '<description>Affichage des messages publies sur Dialog Box</description>';
     return $xml;
}

function fileXml($xml){
    $fp = fopen("../flux.xml", 'w+');
    fputs($fp, $xml);
    fclose($fp);
}

?>
			
