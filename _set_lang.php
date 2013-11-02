<?
	session_start();
	
	include ('class/myLanguage.php'); 

	$language	= new myLanguage();

	isset($_GET['newlanguage']) ? $language->setLang($_GET['newlanguage']) :header("Location: \ ");