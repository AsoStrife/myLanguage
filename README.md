myLanguage 
==========

PHP Class to create multi-language web sites!
Version 1.1.3

Changelog
-
- Bugfix and spelling correction
- Created the configuration file and implemented within the class
- Changed the name of the method print_line () in tr ()
- Simplified class initialization with another method

What is myLanguage Class
-
This is a simple PHP class to create multi-language site. It's very simple to use and to install.
You can translate your site into as many languages as you want without limitations.

Install And configuration
-
Download and unzip the .zip archive

Open /congif/lang.php file
- At line 9 you need to set your absolute base path with a language folder 
- At line 11 add your supported language in 2 characters like

	it => italian

	en => english

	de => german

	fr => french

	zh => chinese
 ecc..
 
- At line 15 set your default language
- At line 17 boolean value, if you want create a special url with GET parameter like: index.php?language=en set this value TRUE else FALSE


Now look the index.php file from line 1 to 10:


	session_start();
	
	include ('class/myLanguage.php'); 
	
	$thispage	= basename($_SERVER['PHP_SELF']);
	
	$language	= new myLanguage();
	
	$language->initializeLang();
	

This is very important for proper initialization of the class, you need to include that code in all your page.

To print a line use this command  <?=$language->tr('NAME_OF_VARIABLE');?> 

Language file
-
Language file need to be all in one main directory like "language" and the single language in a sub-directory like "language/en/"
Look the language folder.

Change language
-
_set_lang.php file deals to change your language site.
You need to create a link width a get parameters "newlanguage" like this: www.yoursite.com/_set_lang.php?newlanguage=en


