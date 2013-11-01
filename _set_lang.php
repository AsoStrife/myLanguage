<?
	//This page set the new language
	session_start();
	
	include ('class/language.php'); 

	$language	= new Language();
	
	if(isset($_GET['newlanguage'])):
		
		$_SESSION['lang']	= $language->set_lang($_GET['newlanguage']);
		
		header("Location: index.php");
		
	else:
		header("Location: index.php");
	endif;
	
?>