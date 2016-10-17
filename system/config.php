<?php
	
	// Banco de Dados
	define('HOSTNAME', '127.0.0.1');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'painel');
	
	// URL'S
	define('URL_BASE', 'http://127.0.0.1/painel/');
	define('URL_REGISTER', URL_BASE.'paginas/register.php');
	define('URL_PAINEL', URL_BASE.'paginas/painel.php');

	// DIR'S
	define('DIR_BASE', $_SERVER['DOCUMENT_ROOT'].'/painel/');
	define('DIR_SYSTEM', DIR_BASE.'system/');
	
	//FILE'S
	define('FILE_CONFIG', DIR_SYSTEM.'config.php');
	define('FILE_HELPERS', DIR_SYSTEM.'helpers.php');
	define('FILE_DATABASE', DIR_SYSTEM.'database.php');
?>