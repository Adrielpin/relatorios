<?php
	$para = 'adriel.pinheiro@sclinks.com.br';
	$assunto = 'Google Crawler no site!';
	$msg = 'Google acessou o seguinte site para indexar: '.$_SERVER['REQUEST_URI'];
	$cabecalhos = 'From:'.$para;
	if(stristr($_SERVER['HTTP_USER_AGENT'], 'googlebot')) {
    	mail($para, $assunto, $msg, $cabecalhos);
	}
?>