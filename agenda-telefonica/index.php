<?php

	session_start();

	define("BASE_URL","/madeira-madeira");
	define("BASE_PATH", "/htdocs/madeira-madeira");
	
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	error_reporting(0);
	
	require_once('./Action/Agenda.php');

	$agenda = new Agenda();

?>