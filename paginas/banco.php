<?
	header("Content-Type: text/html; charset=utf-8");
		
	$conecta = db_connect($host, $usuario, $senha) or
			   die('N&atilde;o foi poss&iacute;vel conectar com o banco de dados! Verifique se os dados de conex&atilde;o est&atilde;o corretos em <b>paginas/config.php </b>');
	db_select_db($banco); 
	
	db_query("SET NAMES 'utf-8'");
	db_query("SET character_set_connection=utf8");
	db_query("SET character_set_client=utf8");
	db_query("SET character_set_results=utf8");

?>