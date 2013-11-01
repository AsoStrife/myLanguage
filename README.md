myLanguage 
==========

PHP Class to create multi-language web sites!
Version 1.0.0

What is it myLanguage Class
=
This is a simple PHP class to create multi-language site. It's very simple to use and to install.
You can translate your site into as many languages as you want without limitations.

Install And configuration
=
Download and unzip the .zip archive

Open /class/myLanguage.php file
- At line 14 you need to set your base path with a language folder 
- At line 17 add your supported language in 2 characters like

	it => italian

	en => english

	de => german

	fr => french

	zh => chinese
 ecc..
 
- At line 23 set your default language


Now look the index.php file from line 1 to 22:

<?
	session_start();
	
	include ('class/myLanguage.php'); 

	$thispage	= basename($_SERVER['PHP_SELF']);
	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang'] = get_language();	
	}
	
	// Optional to generate a dynamic URL like : htttp://yoursite.com?language=en
	// If you delete this IF all script work!
	if(!isset($_GET['language']))
	{
		header("Location: $thispage?language=".$_SESSION['lang']);
	}
	
	$language	= new Language();
?>

This is very important for proper initialization of the class.


